<?php

namespace Application;

use Zend\Mvc\Controller\ActionController,
    Zend\Controller\Plugin\ErrorHandler;

class ErrorController extends ActionController
{

    public function errorAction()
    {
        $errors = $this->getEvent()->getParam('error_handler');
        
        switch ($errors->type) {
            case ErrorHandler::EXCEPTION_NO_ROUTE:
            case ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case ErrorHandler::EXCEPTION_NO_ACTION:
        
                // 404 error -- controller or action not found
                $this->getResponse()->setStatusCode(404);
                $message = 'Page not found';
                break;
            default:
                // application error
                $this->getResponse()->setStatusCode(500);
                $message = 'Application error';
                break;
        }

        /**
         * FIXME Bootstrap injection
        // Log exception, if logger available
        if ($log = $this->getLog()) {
            $log->crit($message, $errors->exception);
        }*/

        /**
         * FIXME Get config param without ugly hack
        // conditionally display exceptions
        if ($this->getInvokeArg('displayExceptions') == true) {
            $this->view->vars()->exception = $errors->exception;
        }*/

        return array(
            'message' => $message,
            'request' => $errors->request
        );
    }

    public function getLog()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        if (!$bootstrap->getBroker()->hasPlugin('Log')) {
            return false;
        }
        $log = $bootstrap->getResource('Log');
        return $log;
    }


}

