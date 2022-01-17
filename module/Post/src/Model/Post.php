<?php

namespace Post\Model;

use Exception;

use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\ServiceManager\ServiceManager;

class Post implements InputFilterAwareInterface
{

    protected $id;
    protected $title;
    protected $description;
    protected $category;
    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new Exception("Not used");
    }

    public function getInputFilter()
    {


        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $inputFilter->add([
                'name' => 'title',
                'required' => true,
                'validators' => [

                    [
                        'name' => 'Zend\Validator\Db\NoRecordExists',
                        'options' => [
                            'table' => 'post',
                            'field' => 'title',
                            'adapter' => GlobalAdapterFeature::getStaticAdapter()
                        ]
                    ]
                ]
            ]);


            $inputFilter->add([
                'name' => 'description',
                'required' => true,


            ]);

            $inputFilter->add([
                'name' => 'category',
                'required' => true,


            ]);

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    public function exchangeArray(array $data)
    {


        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->category = $data['category'];

    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }


}