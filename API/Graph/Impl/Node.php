<?php

namespace \API\Graph\Impl;

class Node implements iNode
{
  private $mRepository;
  private $mParentNode;
  private $mChildNodes = array();
  private $mData;
  
  /**
   * Get the parent object
   * @return type 
   */
  public function getParent()
  {
    return $this->mParentNode;
  }
  
  /**
   * Get the child node
   * @return type 
   */
  public function getChildren()
  {
    return $this->mChildNodes;
  }
  
  /**
   * Add parent node
   * @param type $parent 
   */
  public function addParentNode(&$parent)
  {
    $this->mParentNode = $parent;
  }
    
  /**
   * Add child node (for internal use)
   * @param type $node 
   */
  public function addChildNode(&$node)
  { 
    $this->mChildNodes[$node] = $node;
  }
    
  /**
   * Remove a child node
   * @param type $node 
   */
  public function remoteChildNode(&$node)
  {
    unset( $this->mChildNodes[$node] );
  }
  
  /**
   * Get the checksum of the object
   * @return String sha1 checksum
   */
  public function getChecksum()
  {
    return sha1( serialize($mData) );
  }
  
  /**
   * Return the dataobject
   * @return type 
   */
  public function getData() 
  {
    // Data should really be a component
    return mData;
  }
   
} // End Node

?>
