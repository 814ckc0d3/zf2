<?php
namespace Contact\Form;

use Zend\Form\Form;

class ContactForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('contact');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Name',
            ),
        ));
        $this->add(array(
            'name' => 'surname',
            'type' => 'Text',
            'options' => array(
                'label' => 'Last name',
            ),
        ));
        $this->add(array(
        		'name' => 'mail',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'E-mail',
        		),
        ));
        $this->add(array(
        		'name' => 'social',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'Social',
        		),
        ));
        $this->add(array(
        		'name' => 'residence',
        		'type' => 'Text',
        		'options' => array(
        				'label' => 'Residence',
        		),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}