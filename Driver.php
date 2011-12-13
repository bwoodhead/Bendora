<?php

require_once './API/DI/AbstractModule.php';
require_once './API/DI/DependencyInjector.php';

require_once './API/Graph/Graph.php';
require_once './API/Graph/Node.php';

require_once './TestModule.php';

// Get the injector and use Test Module for the configuration
//$injector = \API\DI\DependencyInjector::createInjector( new TestModule() );
$injector = new \API\DI\DependencyInjector( new TestModule() );

// Get an instance of the graph class
$graph = $injector->getInstance("API\Graph\Graph");

// Get the repositories root object
$root = $graph->getRootNode();

// Create a new node 
$newNode = $injector->getInstance(API\Graph\Node);

// Add it to the root node
$root->add($newNode);

// Get an array of all the children
$list = $root->getChildren();

// Save the whole tree
$root->save();

?>
