<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2016 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace Cms\App;

/**
 * Plugin front kontrolera (hooki)
 */
class CmsFrontControllerPlugin extends \Mmi\App\FrontControllerPluginAbstract
{

    /**
     * Przed uruchomieniem dispatchera
     * @param \Mmi\Http\Request $request
     * @return \Mmi\Http\Request|void
     * @throws \Mmi\Mvc\MvcNotFoundException
     */
    public function preDispatch(\Mmi\Http\Request $request)
    {
        //init translation
        $this->_initTranslation($request);
        //konfiguracja autoryzacji
        $auth = new \Mmi\Security\Auth;
        $auth->setSalt(\App\Registry::$config->salt)
            ->setModelName(\App\Registry::$config->session->authModel ? \App\Registry::$config->session->authModel : '\Cms\Model\Auth');
        \App\Registry::$auth = $auth;
        \Mmi\Mvc\ActionHelper::getInstance()->setAuth($auth);
        \Mmi\Mvc\ViewHelper\Navigation::setAuth($auth);
        \CmsAdmin\Mvc\ViewHelper\AdminNavigation::setAuth($auth);

        //funkcja pamiętaj mnie realizowana poprzez cookie
        $cookie = new \Mmi\Http\Cookie;
        $remember = \App\Registry::$config->session->authRemember ? \App\Registry::$config->session->authRemember : 0;
        if ($remember > 0 && !$auth->hasIdentity() && $cookie->match('remember')) {
            $params = [];
            parse_str($cookie->getValue(), $params);
            if (isset($params['id']) && isset($params['key']) && $params['key'] == md5(\App\Registry::$config->salt . $params['id'])) {
                $auth->setIdentity($params['id']);
                $auth->idAuthenticate();
                //regeneracja ID sesji po autoryzacji
                \Mmi\Session\Session::regenerateId();
            }
        }
        //autoryzacja do widoku
        if ($auth->hasIdentity()) {
            \Mmi\App\FrontController::getInstance()->getView()->auth = $auth;
        }

        //ustawienie acl
        if (null === ($acl = \App\Registry::$cache->load('mmi-cms-acl'))) {
            $acl = \Cms\Model\Acl::setupAcl();
            \App\Registry::$cache->save($acl, 'mmi-cms-acl', 0);
        }
        \Mmi\App\FrontController::getInstance()->getView()->acl = \App\Registry::$acl = $acl;
        \Mmi\Mvc\ActionHelper::getInstance()->setAcl($acl);
        \Mmi\Mvc\ViewHelper\Navigation::setAcl($acl);
        \CmsAdmin\Mvc\ViewHelper\AdminNavigation::setAcl($acl);

        //ustawienie nawigatora
        if (null === ($navigation = \App\Registry::$cache->load('mmi-cms-navigation-' . $request->__get('lang')))) {
            (new \Cms\Model\Navigation)->decorateConfiguration(\App\Registry::$config->navigation);
            $navigation = new \Mmi\Navigation\Navigation(\App\Registry::$config->navigation);
            //zapis do cache
            \App\Registry::$cache->save($navigation, 'mmi-cms-navigation-' . $request->__get('lang'), 0);
        }
        $navigation->setup($request);
        //przypinanie nawigatora do helpera widoku nawigacji
        \Mmi\Mvc\ViewHelper\Navigation::setNavigation(\App\Registry::$navigation = $navigation);
        \CmsAdmin\Mvc\ViewHelper\AdminNavigation::setNavigation(\App\Registry::$navigation = $navigation);

        //zablokowane na ACL
        if ($acl->isAllowed($auth->getRoles(), $actionLabel = strtolower($request->getModuleName() . ':' . $request->getControllerName() . ':' . $request->getActionName()))) {
            return;
        }
        $moduleStructure = \Mmi\App\FrontController::getInstance()->getStructure('module');
        //brak w strukturze
        if (!isset($moduleStructure[$request->getModuleName()][$request->getControllerName()][$request->getActionName()])) {
            throw new \Mmi\Mvc\MvcNotFoundException('Component not found: ' . $actionLabel);
        }
        //brak autoryzacji i kontroler admina - przekierowanie na logowanie
        if (!$auth->hasIdentity()) {
            //logowanie admina
            return $this->_setLoginRequest($request, strpos($request->getModuleName(), 'Admin'));
        }
        \App\Registry::$auth->clearIdentity();
        //zalogowany na nieuprawnioną rolę
        throw new \Mmi\Mvc\MvcNotFoundException('Unauthorized access');
    }

    /**
     * Wykonywana po dispatcherze
     * @param \Mmi\Http\Request $request
     */
    public function postDispatch(\Mmi\Http\Request $request)
    {
        //ustawienie widoku
        $view = \Mmi\App\FrontController::getInstance()->getView();
        $base = $view->baseUrl;
        $view->domain = \App\Registry::$config->host;
        $view->languages = \App\Registry::$config->languages;
        $jsRequest = $request->toArray();
        $jsRequest['baseUrl'] = $base;
        $jsRequest['locale'] = \App\Registry::$translate->getLocale();
        unset($jsRequest['controller']);
        unset($jsRequest['action']);
        //umieszczenie tablicy w headScript()
        $view->headScript()->prependScript('var request = ' . json_encode($jsRequest));
    }

    /**
     * Wykonywana przed wysłaniem treści
     * @param \Mmi\Http\Request $request
     */
    public function beforeSend(\Mmi\Http\Request $request)
    {
        //pobranie odpowiedzi
        $response = \Mmi\App\FrontController::getInstance()->getResponse();
        //zmiana contentu
        $response->setContent((new \Cms\Model\ContentFilter($response->getContent()))->getFilteredContent());
    }

    /**
     * Ustawia request na logowanie admina
     * @param \Mmi\Http\Request $request
     * @return \Mmi\Http\Request
     */
    protected function _setLoginRequest(\Mmi\Http\Request $request, $preferAdmin)
    {
        //logowanie bez preferencji admina, tylko gdy uprawniony
        if (false === $preferAdmin && \App\Registry::$acl->isRoleAllowed('guest', 'cms:user:login')) {
            return $request->setModuleName('cms')
                ->setControllerName('user')
                ->setActionName('login');
        }
        //logowanie admina
        return $request->setModuleName('cmsAdmin')
            ->setControllerName('index')
            ->setActionName('login');
    }

    /**
     * Inicjalizacja tłumaczeń
     */
    protected function _initTranslation(\Mmi\Http\Request $request)
    {
        //języki nie zdefiniowane
        if (empty(\App\Registry::$config->languages)) {
            return;
        }
        //niepoprawny język
        if ($request->__get('lang') && !in_array($request->__get('lang'), \App\Registry::$config->languages)) {
            throw new \Mmi\Mvc\MvcNotFoundException('Language not found');
        }
        //ustawianie języka z requesta
        if ($request->__get('lang')) {
            return \App\Registry::$translate->setLocale($request->__get('lang'));
        }
        //ustawienie języka edycji
        $session = new \Mmi\Session\SessionSpace('cms-language');
        $lang = in_array($session->lang, \App\Registry::$config->languages) ? $session->lang : null;
        //brak zdefiniowanego języka, przy czym istnieje język domyślny
        if (null === $lang && isset(\App\Registry::$config->languages[0])) {
            $lang = \App\Registry::$config->languages[0];
        }
        \App\Registry::$translate->setLocale($lang);
    }

}
