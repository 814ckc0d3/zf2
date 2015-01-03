<?php
namespace Timeline\Form;

use Zend\Form\Form;

class TimelineForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('timeline');

        $this->add(array(
            'name' => 'id_timeline',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'start_date',
            'type' => 'Date',
            'options' => array(
                'label' => 'Start date',
            ),
        ));
        $this->add(array(
            'name' => 'end_date',
            'type' => 'Date',
            'options' => array(
                'label' => 'End date',
            ),
        ));
        $this->add(array(
            'name' => 'headline',
            'type' => 'Text',
            'options' => array(
                'label' => 'Headline',
            ),
        ));
        $this->add(array(
            'name' => 'text',
            'type' => 'Text',
            'options' => array(
                'label' => 'Text',
            ),
        ));
        $this->add(array(
            'name' => 'media',
            'type' => 'Url',
            'options' => array(
                'label' => 'Media',
            ),
        ));
        $this->add(array(
            'name' => 'media_credit',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Credit',
            ),
        ));
        $this->add(array(
            'name' => 'media_caption',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Caption',
            ),
        ));
        $this->add(array(
            'name' => 'media_thumbnail',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Thumbnail',
            ),
        ));
        $this->add(array(
            'name' => 'type',
            'type' => 'Text',
            'options' => array(
                'label' => 'Type',
            ),
        ));
        $this->add(array(
            'name' => 'tag_id_tag',
            'type' => 'Text',
            'options' => array(
                'label' => 'Tag ID',
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