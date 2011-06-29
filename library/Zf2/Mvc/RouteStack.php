<?php
namespace Zf2\Mvc;

interface RouteStack extends Route
{
    public function addRoute(Route $route, $name = null); 
    public function addRoutes($routes); 
    public function getCurrentRoute();
}
