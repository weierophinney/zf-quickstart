<?php
namespace Zf2\Mvc;

use Zf2\Http\Response as HttpResponse,
    Zf2\Stdlib\Dispatchable,
    Zf2\Stdlib\Request,
    Zf2\Stdlib\Response;

class ActionController implements Dispatchable
{
    protected $request;
    protected $response;

    public function index()
    {
        return (object) array('content' => 'Placeholder page');
    }

    public function notFound()
    {
        $this->response->getHeaders()->setStatusCode(404);
        return (object) array('content' => 'Page not found');
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponse()
    {
        if (null === $this->response) {
            $this->response = new HttpResponse();
        }
        return $this->response;
    }

    public function dispatch(Request $request, Response $response = null)
    {
        $this->request = $request;
        if (null === $response) {
            $response = $this->getResponse();
        } else {
            $this->response = $response;
        }

        $action = $request->getMetadata('action', 'index');
        if (!method_exists($this, $action)) {
            $action = 'notFound';
        }
        return $this->$action();
    }
}
