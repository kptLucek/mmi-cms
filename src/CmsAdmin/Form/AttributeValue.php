<?php

/**
 * Mmi Framework (https://github.com/milejko/mmi.git)
 * 
 * @link       https://github.com/milejko/mmi.git
 * @copyright  Copyright (c) 2010-2016 Mariusz Miłejko (http://milejko.com)
 * @license    http://milejko.com/new-bsd.txt New BSD License
 */

namespace CmsAdmin\Form;

use Cms\Form\Element,
    Mmi\Validator,
    Mmi\Filter;

/**
 * Formularz wartości atrybutu
 */
class AttributeValue extends \Cms\Form\Form
{

    public function init()
    {

        //wartość
        $this->addElement((new Element\Text('value'))
            ->setLabel('form.attributeValue.value.label')
            ->setRequired()
            ->addFilter(new Filter\StringTrim)
            ->addValidator(new Validator\StringLength([1, 1024])));

        //labelka
        $this->addElement((new Element\Text('label'))
            ->setLabel('form.attributeValue.label.label')
            ->addFilter(new Filter\StringTrim)
            ->addFilter(new Filter\EmptyToNull)
            ->addValidator(new Validator\StringLength([1, 64])));
        
        //kolejność
        $this->addElement((new Element\Text('order'))
                ->setRequired()
                ->setLabel('form.attributeValue.order.label')
                ->addValidator(new Validator\NumberBetween([0, 10000000]))
                ->setValue(0));

        //zapis
        $this->addElement((new Element\Submit('submit'))
            ->setLabel('form.attributeValue.submit.label'));
    }

    /**
     * Przed zapisem
     * @return boolean
     */
    public function beforeSave()
    {
        //labelka jest podana - nic do zrobienia
        if ($this->getElement('label')->getValue()) {
            return true;
        }
        //podstawianie wartości za labelkę
        $this->getRecord()->label = mb_substr($this->getElement('value')->getValue(), 0, 64);
        return true;
    }

}
