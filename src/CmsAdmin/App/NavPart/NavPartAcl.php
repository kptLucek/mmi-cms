<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2015 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace CmsAdmin\App\NavPart;

class NavPartAcl extends \Mmi\Navigation\NavigationConfig {

	public static function getMenu() {
		return self::newElement()
				->setLabel('Uprawnienia')
				->setModule('cmsAdmin')
				->setController('acl');
	}

}