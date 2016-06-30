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
 * Klasa konfiguracji routera
 */
class CmsRouterConfig extends \Mmi\Mvc\RouterConfig {

	public function __construct() {

		//routa do stron cms i kategorii
		$this->setRoute('cms-category', '/^strona\/([a-zA-Z\/\-]+)$/', ['module' => 'cms', 'controller' => 'article', 'action' => 'display', 'path' => '$1']);

		//moduł + kontroler index + akcja index np. /news
		$this->setRoute('cms-module', '/^([a-zA-Z]+)$/', ['module' => '$1'], ['controller' => 'index', 'action' => 'index']);

		//moduł + kontroler + akcja index np. /cms/article
		$this->setRoute('cms-module-controller', '/^([a-zA-Z]+)\/([a-zA-Z\-]+)$/', ['module' => '$1', 'controller' => '$2'], ['action' => 'index']);

		//moduł + kontroler + akcja np. /cms/article/display
		$this->setRoute('cms-module-controller-action', '/^([a-zA-Z]+)\/([a-zA-Z\-]+)\/([a-zA-Z]+)$/', ['module' => '$1', 'controller' => '$2', 'action' => '$3']);
	}

}
