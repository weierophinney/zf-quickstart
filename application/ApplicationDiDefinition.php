<?php

/** @namespace */
namespace Application;

class DiDefinition extends \Zend\Di\Definition\ArrayDefinition
{

    public function __construct()
    {
        parent::__construct(array (
          'Application\\DiDefinition' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
            ),
          ),
          'QuickStart\\Controller\\GuestbookController' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setMapper' => 
              array (
                'mapper' => 
                array (
                  0 => 'QuickStart\\Model\\GuestbookMapper',
                  1 => true,
                  2 => true,
                ),
              ),
              'setRouter' => 
              array (
                'router' => 
                array (
                  0 => 'Zf2\\Mvc\\RouteStack',
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'QuickStart\\Model\\GuestbookMapper' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setDbTable' => 
              array (
                'dbTable' => 
                array (
                  0 => 'Zend\\Db\\Table\\AbstractTable',
                  1 => true,
                  2 => false,
                ),
              ),
            ),
          ),
          'QuickStart\\Model\\DbTable\\Guestbook' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Table\\AbstractTable',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setOptions' => 
              array (
                'options' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefinition' => 
              array (
                'definition' => 
                array (
                  0 => 'Zend\\Db\\Table\\Definition',
                  1 => true,
                  2 => true,
                ),
              ),
              'setDefinitionConfigName' => 
              array (
                'definitionConfigName' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRowClass' => 
              array (
                'classname' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRowsetClass' => 
              array (
                'classname' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setReferences' => 
              array (
                'referenceMap' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDependentTables' => 
              array (
                'dependentTables' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultSource' => 
              array (
                'defaultSource' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultValues' => 
              array (
                'defaultValues' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultAdapter' => 
              array (
                'db' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultMetadataCache' => 
              array (
                'metadataCache' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setMetadataCacheInClass' => 
              array (
                'flag' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'QuickStart\\Model\\Guestbook' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'options' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setOptions' => 
              array (
                'options' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setComment' => 
              array (
                'text' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setEmail' => 
              array (
                'email' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setCreated' => 
              array (
                'ts' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setId' => 
              array (
                'id' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'QuickStart\\Form\\Guestbook' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'View' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setRenderer' => 
              array (
                'renderer' => 
                array (
                  0 => 'Zend\\View\\Renderer',
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRouter' => 
              array (
                'router' => 
                array (
                  0 => 'Zf2\\Mvc\\RouteStack',
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Bootstrap' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => 'Zend\\Config\\Config',
                  1 => false,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Application\\View\\Helper\\Url' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
              'setRouter' => 
              array (
                'router' => 
                array (
                  0 => 'Zf2\\Mvc\\RouteStack',
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Application\\Controller\\IndexController' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Application\\Controller\\ErrorController' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zend\\Db\\Adapter\\AbstractAdapter' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\AbstractPdoAdapter' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Pdo\\Mssql' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractPdoAdapter',
              1 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Pdo\\Pgsql' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractPdoAdapter',
              1 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Pdo\\Sqlite' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractPdoAdapter',
              1 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Pdo\\Ibm\\Ids' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Pdo\\Ibm\\Db2' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Pdo\\Ibm\\Ibm' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractPdoAdapter',
              1 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Pdo\\Oci' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractPdoAdapter',
              1 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Db2' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Mysqli' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Sqlsrv' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setTransactionIsolationLevel' => 
              array (
                'level' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\Oracle' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setLobAsString' => 
              array (
                'lobAsString' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Adapter\\PdoMysql' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Adapter\\AbstractPdoAdapter',
              1 => 'Zend\\Db\\Adapter\\AbstractAdapter',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setProfiler' => 
              array (
                'profiler' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setStatementClass' => 
              array (
                'class' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\Table' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Table\\AbstractTable',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
                'definition' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setOptions' => 
              array (
                'options' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefinition' => 
              array (
                'definition' => 
                array (
                  0 => 'Zend\\Db\\Table\\Definition',
                  1 => true,
                  2 => true,
                ),
              ),
              'setDefinitionConfigName' => 
              array (
                'definitionConfigName' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRowClass' => 
              array (
                'classname' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRowsetClass' => 
              array (
                'classname' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setReferences' => 
              array (
                'referenceMap' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDependentTables' => 
              array (
                'dependentTables' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultSource' => 
              array (
                'defaultSource' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultValues' => 
              array (
                'defaultValues' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultAdapter' => 
              array (
                'db' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultMetadataCache' => 
              array (
                'metadataCache' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setMetadataCacheInClass' => 
              array (
                'flag' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\AbstractTable' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setOptions' => 
              array (
                'options' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefinition' => 
              array (
                'definition' => 
                array (
                  0 => 'Zend\\Db\\Table\\Definition',
                  1 => true,
                  2 => true,
                ),
              ),
              'setDefinitionConfigName' => 
              array (
                'definitionConfigName' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRowClass' => 
              array (
                'classname' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setRowsetClass' => 
              array (
                'classname' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setReferences' => 
              array (
                'referenceMap' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDependentTables' => 
              array (
                'dependentTables' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultSource' => 
              array (
                'defaultSource' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultValues' => 
              array (
                'defaultValues' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultAdapter' => 
              array (
                'db' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setDefaultMetadataCache' => 
              array (
                'metadataCache' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setMetadataCacheInClass' => 
              array (
                'flag' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\Row' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Table\\AbstractRow',
              1 => 'ArrayAccess',
              2 => 'IteratorAggregate',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setTable' => 
              array (
                'table' => 
                array (
                  0 => 'Zend\\Db\\Table\\AbstractTable',
                  1 => true,
                  2 => false,
                ),
              ),
              'setReadOnly' => 
              array (
                'flag' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFromArray' => 
              array (
                'data' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\AbstractRow' => 
          array (
            'superTypes' => 
            array (
              0 => 'ArrayAccess',
              1 => 'IteratorAggregate',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setTable' => 
              array (
                'table' => 
                array (
                  0 => 'Zend\\Db\\Table\\AbstractTable',
                  1 => true,
                  2 => false,
                ),
              ),
              'setReadOnly' => 
              array (
                'flag' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFromArray' => 
              array (
                'data' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\Definition' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'options' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setConfig' => 
              array (
                'config' => 
                array (
                  0 => 'Zend\\Config\\Config',
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setOptions' => 
              array (
                'options' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\Rowset' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Table\\AbstractRowset',
              1 => 'SeekableIterator',
              2 => 'Countable',
              3 => 'ArrayAccess',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setTable' => 
              array (
                'table' => 
                array (
                  0 => 'Zend\\Db\\Table\\AbstractTable',
                  1 => true,
                  2 => false,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\Select' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Select',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'table' => 
                array (
                  0 => 'Zend\\Db\\Table\\AbstractTable',
                  1 => false,
                  2 => false,
                ),
              ),
              'setTable' => 
              array (
                'table' => 
                array (
                  0 => 'Zend\\Db\\Table\\AbstractTable',
                  1 => true,
                  2 => false,
                ),
              ),
              'setIntegrityCheck' => 
              array (
                'flag' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Table\\AbstractRowset' => 
          array (
            'superTypes' => 
            array (
              0 => 'SeekableIterator',
              1 => 'Countable',
              2 => 'ArrayAccess',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'config' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setTable' => 
              array (
                'table' => 
                array (
                  0 => 'Zend\\Db\\Table\\AbstractTable',
                  1 => true,
                  2 => false,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Expr' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'expression' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\Pdo' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement\\AbstractStatement',
              1 => 'IteratorAggregate',
              2 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\AbstractStatement' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\Pdo\\Ibm' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement\\Pdo',
              1 => 'Zend\\Db\\Statement\\AbstractStatement',
              2 => 'IteratorAggregate',
              3 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\Pdo\\Oci' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement\\Pdo',
              1 => 'Zend\\Db\\Statement\\AbstractStatement',
              2 => 'IteratorAggregate',
              3 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\Db2' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement\\AbstractStatement',
              1 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\Mysqli' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement\\AbstractStatement',
              1 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\Sqlsrv' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement\\AbstractStatement',
              1 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement\\Oracle' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Statement\\AbstractStatement',
              1 => 'Zend\\Db\\Statement',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'sql' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
              'setLobAsString' => 
              array (
                'lob_as_string' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFetchMode' => 
              array (
                'mode' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Profiler\\Firebug' => 
          array (
            'superTypes' => 
            array (
              0 => 'Zend\\Db\\Profiler',
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'label' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setEnabled' => 
              array (
                'enable' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFilterElapsedSecs' => 
              array (
                'minimumSeconds' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFilterQueryType' => 
              array (
                'queryTypes' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Profiler\\Query' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'query' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
                'queryType' => 
                array (
                  0 => NULL,
                  1 => false,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Db' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zend\\Db\\Profiler' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'enabled' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setEnabled' => 
              array (
                'enable' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFilterElapsedSecs' => 
              array (
                'minimumSeconds' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
              'setFilterQueryType' => 
              array (
                'queryTypes' => 
                array (
                  0 => NULL,
                  1 => true,
                  2 => NULL,
                ),
              ),
            ),
          ),
          'Zend\\Db\\Statement' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => NULL,
            'injectionMethods' => 
            array (
            ),
          ),
          'Zend\\Db\\Select' => 
          array (
            'superTypes' => 
            array (
            ),
            'instantiator' => '__construct',
            'injectionMethods' => 
            array (
              '__construct' => 
              array (
                'adapter' => 
                array (
                  0 => 'Zend\\Db\\Adapter\\AbstractAdapter',
                  1 => false,
                  2 => false,
                ),
              ),
            ),
          ),
        ));
    }


}

