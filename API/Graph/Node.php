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
   * Example getImage returns a url to a DisplayImage Service
   * This stops getImage from being a blocking operation. 
   */
  public function getImage()
  {
    // Return URL
  }
  
  /**
   * Returns the actual image data
   */
  public function getImageData()
  {
    
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
