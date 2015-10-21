<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2015 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace CmsAdmin\Grid\Column;

/**
 * Abstrakcyjna klasa Columnu
 * 
 * @method self setName($name) ustawia nazwę pola
 * @method string getName() pobiera nazwę pola
 * @method self setLabel($label) ustawia labelkę
 * @method string getLabel() pobiera labelkę
 */
abstract class ColumnAbstract extends \Mmi\OptionObject {

	/**
	 * Obiekt grida
	 * @var \CmsAdmin\Grid\Grid
	 */
	protected $_grid;

	/**
	 * Konstruktor ustawia nazwę
	 * @param string $name
	 */
	public function __construct($name) {
		$this->setName($name);
	}

	/**
	 * Zwraca nazwę dla Columnu formularza
	 * @return string
	 */
	public function getFormColumnName() {
		return $this->_grid->getClass() . '[' . $this->getName() . ']';
	}

	/**
	 * Ustawia grida macieżystego
	 * @param \CmsAdmin\Grid\Grid $grid
	 * @return ColumnAbstract
	 */
	public function setGrid(\CmsAdmin\Grid\Grid $grid) {
		$this->_grid = $grid;
		return $this;
	}

	/**
	 * Renderuje labelkę kolumny
	 * @return string
	 */
	public function renderLabel() {
		//brak property
		if (!$this->_fieldInRecord()) {
			return $this->getLabel() ? $this->getLabel() : $this->getName();
		}
		$html = '<a class="order" href="#' . $this->getFormColumnName() . '" data-method="' . $this->_getOrderMethod() . '">' . ($this->getLabel() ? $this->getLabel() : $this->getName()) . '</a>';
		//brak sortowania
		if (!$this->_getOrderMethod()) {
			return $html;
		}
		//ikona w dół
		if ($this->_getOrderMethod() == 'orderDesc') {
			return $html . ' <i class="icon-download"></i>';
		}
		//ikona w górę
		return $html . ' <i class="icon-upload"></i>';
	}

	/**
	 * Renderuje filtrację pola
	 * @return string
	 */
	public function renderFilter() {
		//brak property
		if (!$this->_fieldInRecord()) {
			return;
		}
		//zwrot filtra
		return (new \Mmi\Form\Element\Text($this->getFormColumnName()))
				->setValue($this->_getFilterValue());
	}

	/**
	 * Renderuje komórkę pola dla danego rekordu
	 * @param \Mmi\Orm\RecordRo $record
	 * @return string
	 */
	abstract public function renderCell(\Mmi\Orm\RecordRo $record);

	/**
	 * Zwraca filtr dla pola
	 * @return string
	 */
	protected function _getFilterValue() {
		//iteracja po filtrache w gridzie
		foreach ($this->_grid->getState()->getFilters() as $filter) {
			//znaleziony filtr dla tego pola
			if ($filter->getField() == $this->getName() || $filter->getTableName() . '.' . $filter->getField() == $this->getName()) {
				//zwrot wartości filtra
				return $filter->getValue();
			}
		}
	}

	/**
	 * Sprawdza istnienie pola w rekordzie
	 * @return boolean
	 */
	protected function _fieldInRecord() {
		//zażądany join
		if (strpos($this->getName(), '.')) {
			return true;
		}
		//sorawdzenie w rekordzie
		return property_exists($this->_grid->getQuery()->getRecordName(), $this->getName());
	}
	
	/**
	 * Wybiera wartość z rekordu
	 * @param \Mmi\Orm\RecordRo $record
	 * @return string
	 */
	protected function _getValueFromRecord(\Mmi\Orm\RecordRo $record) {
		if (!$this->_fieldInRecord()) {
			return '?';
		}
		if (strpos($this->getName(), '.')) {
			$table = explode('.', $this->getName());
			return $record->getJoined($table[0])->{$table[1]};
		}
		return $record->{$this->getName()};
	}

	/**
	 * Zwraca sortowanie dla pola
	 * @return string
	 */
	protected function _getOrderMethod() {
		//iteracja po sortowaniach w gridzie
		foreach ($this->_grid->getState()->getOrder() as $order) {
			//znalezione sortowanie tego pola
			if ($order->getField() == $this->getName() || $order->getTableName() . '.' . $order->getField() == $this->getName()) {
				//zwrot metody sortowania
				return $order->getMethod();
			}
		}
	}

}