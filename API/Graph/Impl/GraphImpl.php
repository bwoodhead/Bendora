<?php

namespace \API\Graph\Impl;

/**
 * Repository class
 * @Singleton
 */
class GraphImpl implements iGraph
{
  private $mRoot;
  private $mRepository;
  private $mSearch;
  private $mCache;
  
  /**
   * Constructor
   * @Inject
   */
  public function __constructor(\API\Repository\iRepository &$repo, \API\Repository\iSearch &$search, \API\Utils\iCache &$cache)
  {
    $this->mRepository = $repo;
    $this->mSearch = $search;
    $this->mCache = $cache;
  }
  
  /**
   * 
   */
  public function getRootNode()
  {
    if ( $mRoot == NULL )
    {
      $mRoot = $this->$mImplementation->getRootNode();
    }
    
    return $mRoot;
  }
  
  public function save( Node $node )
  {
    // Save the node data ( should only be saved if its been updated )
    $node->getData();
    
    // Loop through all the children
    foreach( $node->getChildren() as $childNode )
    {
      // Save the children
      //this->save( $childNode );
    }
  }
  
  public function findWithId(&$id)
  {
    // Find the node in the rep
    // Add the node to the graph
    // Return the node
    return null;
  }
}

?>
