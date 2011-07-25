<?php

/** @namespace */
namespace Zf2;

class DiDefinition extends \Zend\Di\Definition\ArrayDefinition
{

    public function __construct()
    {
        parent::__construct(array (
          'Zf2\\Http\\HttpResponse' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\ResponseDescription',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'content' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
                'status' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
                'headers' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\HttpHeaders' => 
          array (
            'superTypes' => 
            array (
              0 => 'Iterator',
              1 => 'ArrayAccess',
              2 => 'Countable',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Http\\HttpRequestHeaders' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Http\\HttpHeaders',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Http\\ResponseHeaders' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Http\\Headers',
              1 => 'Zf2\\Http\\HttpResponseHeaders',
              2 => 'Zf2\\Http\\HttpHeaders',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setClientTtl' => 
              array (
                'seconds' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setExpires' => 
              array (
                'date' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setLastModified' => 
              array (
                'date' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setMaxAge' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setPrivate' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setSharedMaxAge' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setTtl' => 
              array (
                'seconds' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProtocolVersion' => 
              array (
                'version' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\Header' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Http\\HttpHeader',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'header' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
                'replace' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setType' => 
              array (
                'type' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\HttpRequest' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\RequestDescription',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setQuery' => 
              array (
                'query' => 
                array (
                  0 => 'Zf2\\Stdlib\\Parameters',
                  1 => true,
                  2 => false,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\HttpHeader' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'header' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
                'replace' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\Headers' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Http\\HttpHeaders',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setProtocolVersion' => 
              array (
                'version' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\Request' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\Request',
              1 => 'Zf2\\Stdlib\\Message',
              2 => 'Zf2\\Http\\HttpRequest',
              3 => 'Zf2\\Stdlib\\RequestDescription',
              4 => 'Zf2\\Stdlib\\MessageDescription',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setQuery' => 
              array (
                'query' => 
                array (
                  0 => 'Zf2\\Stdlib\\Parameters',
                  1 => true,
                  2 => false,
                ),
              ),
              'setPost' => 
              array (
                'post' => 
                array (
                  0 => 'Zf2\\Stdlib\\Parameters',
                  1 => true,
                  2 => false,
                ),
              ),
              'setCookies' => 
              array (
                'cookies' => 
                array (
                  0 => 'Zf2\\Stdlib\\Parameters',
                  1 => true,
                  2 => false,
                ),
              ),
              'setFiles' => 
              array (
                'files' => 
                array (
                  0 => 'Zf2\\Stdlib\\Parameters',
                  1 => true,
                  2 => false,
                ),
              ),
              'setServer' => 
              array (
                'server' => 
                array (
                  0 => 'Zf2\\Stdlib\\Parameters',
                  1 => true,
                  2 => false,
                ),
              ),
              'setEnv' => 
              array (
                'env' => 
                array (
                  0 => 'Zf2\\Stdlib\\Parameters',
                  1 => true,
                  2 => false,
                ),
              ),
              'setHeaders' => 
              array (
                'headers' => 
                array (
                  0 => 'Zf2\\Http\\HttpRequestHeaders',
                  1 => true,
                  2 => false,
                ),
              ),
              'setRawBody' => 
              array (
                'string' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setMethod' => 
              array (
                'method' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setContent' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\Response' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\Response',
              1 => 'Zf2\\Stdlib\\Message',
              2 => 'Zf2\\Http\\HttpResponse',
              3 => 'Zf2\\Stdlib\\ResponseDescription',
              4 => 'Zf2\\Stdlib\\MessageDescription',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'content' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
                'status' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
                'headers' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setHeaders' => 
              array (
                'headers' => 
                array (
                  0 => 'Zf2\\Http\\HttpResponseHeaders',
                  1 => true,
                  2 => false,
                ),
              ),
              'setContent' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\RequestHeaders' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Http\\Headers',
              1 => 'Zf2\\Http\\HttpRequestHeaders',
              2 => 'Zf2\\Http\\HttpHeaders',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setMethod' => 
              array (
                'method' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setUri' => 
              array (
                'uri' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProtocolVersion' => 
              array (
                'version' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\Parameters' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\Parameters',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'values' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Http\\HttpResponseHeaders' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Http\\HttpHeaders',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Stdlib\\Message' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\MessageDescription',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setContent' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Stdlib\\Request' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\Message',
              1 => 'Zf2\\Stdlib\\RequestDescription',
              2 => 'Zf2\\Stdlib\\MessageDescription',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setContent' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Stdlib\\Response' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\Message',
              1 => 'Zf2\\Stdlib\\ResponseDescription',
              2 => 'Zf2\\Stdlib\\MessageDescription',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setContent' => 
              array (
                'value' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Stdlib\\MessageDescription' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Stdlib\\Dispatchable' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Stdlib\\RequestDescription' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\MessageDescription',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Stdlib\\ResponseDescription' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\MessageDescription',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Stdlib\\Parameters' => 
          array (
            'superTypes' => 
            array (
              0 => 'ArrayAccess',
              1 => 'Countable',
              2 => 'Serializable',
              3 => 'Traversable',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'values' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Mvc\\RouteStack' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Mvc\\Route',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zf2\\Mvc\\FrontController' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\Dispatchable',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'services' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setNotFoundHandler' => 
              array (
                'callback' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zf2\\Mvc\\Route' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setRequest' => 
              array (
                'request' => 
                array (
                  0 => 'Zf2\\Stdlib\\Request',
                  1 => true,
                  2 => true,
                ),
              ),
            ),
          ),
          'Zf2\\Mvc\\Router' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Mvc\\RouteStack',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              'setRequest' => 
              array (
                'request' => 
                array (
                  0 => 'Zf2\\Stdlib\\Request',
                  1 => true,
                  2 => true,
                ),
              ),
            ),
          ),
          'Zf2\\Mvc\\Route\\StaticRoute' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Mvc\\Route',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'path' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'params' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRequest' => 
              array (
                'request' => 
                array (
                  0 => 'Zf2\\Stdlib\\Request',
                  1 => true,
                  2 => true,
                ),
              ),
            ),
          ),
          'Zf2\\Mvc\\Route\\RegexRoute' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Mvc\\Route',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'regex' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'spec' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRequest' => 
              array (
                'request' => 
                array (
                  0 => 'Zf2\\Stdlib\\Request',
                  1 => true,
                  2 => true,
                ),
              ),
            ),
          ),
          'Zf2\\Mvc\\ActionController' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zf2\\Stdlib\\Dispatchable',
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
        ));
    }


}

