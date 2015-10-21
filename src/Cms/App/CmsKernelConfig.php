<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2015 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace Cms\App;

/**
 * Klasa konfiguracji aplikacji CMS
 */
abstract class CmsKernelConfig extends \Mmi\App\KernelConfig {

	/**
	 * Konfiguracja autoryzacji CMS (LDAP)
	 * @var \Cms\App\LdapConfig
	 */
	public $ldap;

	/**
	 * Konfiguracja nawigatora
	 * @var \Mmi\Navigation\NavigationConfig
	 */
	public $navigation;

}