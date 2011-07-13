<?php

namespace QuickStart\Controller;

use QuickStart\Form\Guestbook as GuestbookForm,
    QuickStart\Model\Guestbook,
    QuickStart\Model\GuestbookMapper,
    Zf2\Mvc\ActionController,
    Zf2\Mvc\RouteStack;

class GuestbookController extends ActionController
{
    public $mapper;

    public function index()
    {
        return array('entries' => $this->mapper->fetchAll());
    }

    public function sign()
    {
        $request = $this->getRequest();
        $form    = new GuestbookForm();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->post()->toArray())) {
                $comment = new Guestbook($form->getValues());
                $this->mapper->save($comment);

                $redirect = $this->router->assemble(
                    array('controller' => 'guestbook', 'action' => 'index'), 
                    array('name' => 'default')
                );

                $this->response->getHeaders()
                               ->setStatusCode(302)
                               ->addHeader('Location', $redirect);
                return $this->response;
            }
        }

        return array('form' => $form);
    }

    public function setMapper(GuestbookMapper $mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }

    public function setRouter(RouteStack $router)
    {
        $this->router = $router;
        return $this;
    }
}
