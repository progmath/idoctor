<?php
//Rules -  how to create a route

use PM_Engine\Router;

Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);
Router::add('^cart/view/?$', ['controller' => 'Cart', 'action' => 'draw']);
Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);
Router::add('^recently/all/?$', ['controller' => 'Recently', 'action' => 'index']);


//default routes admin side || '^admin$' - admin string === progmath.am/admin
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

//default routes user side || '^$' - empty string === progmath.am
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


?>