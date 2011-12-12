<?php

namespace API\Graph;

class Graph 
{
  private $mGraph;
  
  public function __constructor(\API\Graph\Interfaces\iGraph &$graph)
  {
    $this->mGraph = $graph;
  }
  
}

?>
