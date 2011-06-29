<?php
namespace Zf2\Mvc;

use Zf2\Stdlib\Request;

interface Route
{
    public function setRequest(Request $request); 
    public function match(Request $request); 
    public function assemble(array $params = array(), array $options = array());
}
