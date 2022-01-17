<?php

namespace Post\Form;

use Zend\Form\Form;

class PostForm extends Form
{


    public function __construct($name = null)
    {


        parent::__construct('post');
        $this->setAttribute('method', 'POST');

        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);

        $this->add([
            'name' => 'title',
            'type' => 'text',
            'attributes'=>[
                'class'=>'form-control',
            ],
            'options' => [
                'label' => 'Title (Please enter unique post title)',

            ]
        ]);

        $this->add([
            'name' => 'description',
            'type' => 'text',
            'attributes'=>[
                'class'=>'form-control',
            ],
            'options' => [
                'label' => 'Description'
            ]
        ]);

        $this->add([
            'name' => 'category',
            'type' => 'text',
            'attributes'=>[
                'class'=>'form-control',
            ],
            'options' => [
                'label' => 'Category'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'class'=>'btn btn-primary',
                'value' => 'Save',
                'id' => 'btnSave'
            ]
        ]);
    }


   
}