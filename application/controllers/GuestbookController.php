<?php

use Zend\Controller\Action as ActionController,
    Application\Form\Guestbook as GuestbookForm,
    Application\Model\Guestbook,
    Application\Model\GuestbookMapper;

class GuestbookController extends ActionController
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $guestbook = new GuestbookMapper();
        $this->view->vars()->entries = $guestbook->fetchAll();
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new GuestbookForm();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Guestbook($form->getValues());
                $mapper  = new GuestbookMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->vars()->form = $form;
    }


}



