<?php

namespace Graph;

class Node 
{
  private $mNode;
  
  public function __contructor( Graph\Interfaces\iNode &$node)
  {
    $this->mNode = $node;
  }
  
  /**
   * Commit the changes
   */
  public function commit()
  {
    
  }
  
  /**
   * Rollback the changes
   */
  public function rollback()
  {
    
  }
}

?>
