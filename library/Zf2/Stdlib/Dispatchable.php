<?php
namespace Zf2\Stdlib;

interface Dispatchable
{
    public function dispatch(Request $request, Response $response = null);
}
