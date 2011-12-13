<?php

namespace API\Utils\Interfaces;

interface iCache 
{
   /**
   * Register node for searching
   * @param type $id
   * @param type $node 
   */
  public function addNode(&$id, &$node);
  
  /**
   * Find a node using the id
   * @param type $id
   * @return type 
   */
  public function getNode(&$id);
  
}

?>
