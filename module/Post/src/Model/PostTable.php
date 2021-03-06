<?php

namespace Post\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class PostTable
{

    protected $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;

    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }


    public function saveData($post)
    {
        $data = [
            'title' => $post->getTitle(),
            'description' => $post->getDescription(),
            'category' => $post->getCategory()
        ];

        return $this->tableGateway->insert($data);
    }

}