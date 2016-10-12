<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2016 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace CmsAdmin\Plugin;

/**
 * Grid kategorii
 */
class CategoryGrid extends \CmsAdmin\Grid\Grid {

	public function init() {

		//query
		$this->setQuery(new \Cms\Orm\CmsCategoryQuery);

		//nazwa
		$this->addColumnText('name')
			->setLabel('nazwa');

		//uri
		$this->addColumnSelect('uri')
			->setMultioptions((new \Cms\Orm\CmsCategoryQuery)->orderAscUri()->findPairs('uri', 'uri'))
			->setFilterMethodLike()
			->setLabel('okruszki');

		//uri
		$this->addColumnText('customUri')
			->setLabel('inny adres strony');
		
		//title
		$this->addColumnText('title')
			->setLabel('meta tytuł');
		
		//follow
		$this->addColumnCheckbox('follow')
			->setLabel('w wyszukiwarkach');
		
		//aktywności
		$this->addColumnCheckbox('active')
			->setLabel('włączona');
		
		//operacje
		$this->addColumnOperation();
	}

}