<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 *
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2016 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace CmsAdmin\App\NavPart;

/**
 * Konfiguracja nawigatora tekstów stałych
 */
class NavPartSystem extends \Mmi\Navigation\NavigationConfig
{

    /**
     * Zwraca menu
     * @return \Mmi\Navigation\NavigationConfigElement
     */
    public static function getMenu()
    {
        return (new \Mmi\Navigation\NavigationConfigElement)
            ->setLabel('menu.system.container')
            ->setIcon('fa-cogs')
            ->setUri('#')
            ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                ->setLabel('menu.attribute.container')
                ->setIcon('fa-book')
                ->setUri('#')
                ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.attribute.index')
                    ->setIcon('fa-table')
                    ->setModule('cmsAdmin')
                    ->setController('attribute'))
                ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.attribute.edit')
                    ->setIcon('fa-plus')
                    ->setModule('cmsAdmin')
                    ->setController('attribute')
                    ->setAction('edit')))
            //szablony
            ->addChild(
                (new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.categoryType.container')
                    ->setIcon('fa-clone')
                    ->setUri('#')
                    ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                        ->setLabel('menu.categoryType.index')
                        ->setIcon('fa-table')
                        ->setModule('cmsAdmin')
                        ->setController('categoryType'))
                    ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                        ->setLabel('menu.categoryType.edit')
                        ->setIcon('fa-plus')
                        ->setModule('cmsAdmin')
                        ->setController('categoryType')
                        ->setAction('edit'))
            )
            //widgety
            ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                ->setLabel('menu.categoryWidget.container')
                ->setIcon('fa-bars')
                ->setUri('#')
                ->addChild(
                    (new \Mmi\Navigation\NavigationConfigElement)
                        ->setLabel('menu.categoryWidget.index')
                        ->setIcon('fa-table')
                        ->setModule('cmsAdmin')
                        ->setController('categoryWidget')
                )
                ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.categoryWidget.edit')
                    ->setIcon('fa-plus')
                    ->setModule('cmsAdmin')
                    ->setController('categoryWidget')
                    ->setAction('edit')))
            ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                ->setLabel('menu.tag.container')
                ->setIcon('fa-tags')
                ->setUri('#')
                ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.tag.index')
                    ->setIcon('fa-table')
                    ->setModule('cmsAdmin')
                    ->setController('tag'))
                ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.tagRelation.index')
                    ->setIcon('fa-tag')
                    ->setModule('cmsAdmin')
                    ->setController('tagRelation'))
                ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.tagRelation.edit')
                    ->setIcon('fa-plus')
                    ->setModule('cmsAdmin')
                    ->setController('tag')
                    ->setAction('edit')))
            ->addChild(
                (new \Mmi\Navigation\NavigationConfigElement)
                    ->setLabel('menu.cron.container')
                    ->setIcon('fa-calendar')
                    ->setUri('#')
                    ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                        ->setLabel('menu.cron.index')
                        ->setIcon('fa-table')
                        ->setModule('cmsAdmin')
                        ->setController('cron'))
                    ->addChild(
                        (new \Mmi\Navigation\NavigationConfigElement)
                            ->setLabel('menu.cron.edit')
                            ->setIcon('fa-plus')
                            ->setModule('cmsAdmin')
                            ->setController('cron')
                            ->setAction('edit')
                    )
            )
            ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                ->setLabel('menu.file.index')
                ->setIcon('fa-file')
                ->setModule('cmsAdmin')
                ->setController('file'))
            ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                ->setLabel('menu.connector.index')
                ->setIcon('fa-cloud-download')
                ->setModule('cmsAdmin')
                ->setController('connector')
                ->addChild(
                    (new \Mmi\Navigation\NavigationConfigElement)
                        ->setLabel('menu.connector.files')
                        ->setModule('cmsAdmin')
                        ->setController('connector')
                        ->setAction('files')
                        ->setDisabled()
                ))
            ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                ->setLabel('menu.config')
                ->setIcon('fa-list')
                ->setModule('cmsAdmin')
                ->setController('config'))
            ->addChild((new \Mmi\Navigation\NavigationConfigElement)
                ->setLabel('menu.cache')
                ->setModule('cmsAdmin')
                ->setIcon('fa-trash')
                ->setController('cache'));
    }
}
