<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Post\Controller;

use Post\Form\PostForm;
use Post\Model\Post;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {

        return new ViewModel();
    }

    public function addAction()
    {

        $form = new PostForm();

        $request = $this->getRequest();

        if (!$request->isPost()) {
            return new ViewModel([
                'form' => $form
            ]);
        }

        $post = new Post();
        $form->setInputFilter($post->getInputFilter());
        $form->setData($request->getPost());

        if ($form->isValid()) {
            $post->exchangeArray($form->getData());
            $this->table->saveData($post);
            $this->flashMessenger()->addSuccessMessage('Record has been added successfully (Title : '.$post->getTitle().')');

            return $this->redirect()->toRoute('post', [
                'controller' => 'index',
                'action' => 'add'

            ]);
        }

        return new ViewModel([
            'form' => $form
        ]);


    }


}
