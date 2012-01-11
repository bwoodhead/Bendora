<?php

namespace Graph;
 
class Graph 
{
  private $mGraph;
  
  public function __constructor( Graph\Interfaces\iGraph &$graph )
  {
    $this->mGraph = $graph;
  }
  
}

?>
