<?php

namespace API\Graph;

class Node 
{
  private $mNode;
  
  public function __contructor(\API\Graph\Interfaces\iNode &$node)
  {
    $this->mNode = $node;
  }
  
}

?>
