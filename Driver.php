<?php

// Get the injector and use Test Module for the configuration
$injector = \API\DI\DependencyInjector::createInjector( new TestModule() );

// Get an instance of the graph class
$graph = $injector.getInstance(Graph);

// Get the repositories root object
$root = $graph->getRootNode();

// Create a new node 
$newNode = $injector.getInstance(Node);

// Add it to the root node
$root->add($newNode);

// Get an array of all the children
$list = $root->getChildren();

// Save the whole tree
$root->save();

?>
