<?php

/**
 * Mmi CMS (https://github.com/milejko/mmi-cms.git)
 *
 * @link       https://github.com/milejko/mmi-cms.git
 * @copyright  Copyright (c) 2010-2017 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://en.wikipedia.org/wiki/BSD_licenses New BSD License
 */

namespace CmsAdmin\Test;

use CmsAdmin\TextController;
use Mmi\Http\Request;
use Mmi\Mvc\View;

/**
 * Test klasy obsługi dysku
 */
class FileSystemTest extends \PHPUnit\Framework\TestCase
{

    public function testIndexAction()
    {
        $c = new TextController($request = new Request(), $view = new View());
        $c->indexAction();
        $this->assertInstanceof('ble', $view->grid);
    }

}