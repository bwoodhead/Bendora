<?php

namespace \API\Utils\Impl;

/**
 * Local memory caching
 * No perm cache
 */
class HashtableCache implements iCache
{
  // Hashtable caching
  private $mNodeList = array();
  
  /**
   * Register node for searching
   * @param type $id
   * @param type $node 
   */
  public function addNode(&$id, &$node)
  {
    $this->mNodeList[$id] = $node;
  }
  
  /**
   * Find a node using the id
   * @param type $id
   * @return type 
   */
  public function getNode(&$id)
  {
    return $this->mNodeList[$id];
  }
}

?>
