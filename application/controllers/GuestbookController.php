<?php

namespace Application;

use Zend\Mvc\Controller\ActionController,
    Application\Form\Guestbook as GuestbookForm,
    Application\Model\Guestbook,
    Application\Model\GuestbookMapper;

class GuestbookController extends ActionController
{
    public function indexAction()
    {
        $guestbook = new GuestbookMapper();
        return array('entries' => $guestbook->fetchAll());
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new GuestbookForm();

        if ($request->isPost()) {
            if ($form->isValid($request->post()->toArray())) {
                $comment = new Guestbook($form->getValues());
                $mapper  = new GuestbookMapper();
                $mapper->save($comment);
                $response = $this->getResponse();
                $response->headers()->addHeaderLine('Location', '/guestbook');
                $response->setStatusCode(301);
                return $response;
            }
        }

        return array('form' => $form);
    }
}
