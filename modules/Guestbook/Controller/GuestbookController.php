<?php

namespace Guestbook\Controller;

use Guestbook\Form\Guestbook as GuestbookForm,
    Guestbook\Model\Guestbook,
    Guestbook\Model\GuestbookMapper,
    Zend\Mvc\Controller\ActionController,
    Zend\Mvc\Router\RouteStack;

class GuestbookController extends ActionController
{
    public $mapper;

    public function indexAction()
    {
        return array('entries' => $this->mapper->fetchAll());
    }

    public function signAction()
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

                $this->response->setStatusCode(302);
                $this->response->headers()->addHeaderLine('Location', $redirect);
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
