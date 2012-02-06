<?php

class Object 
{
  private $mMetadata = null;
  private $mDatastreams = array();
  private $mRelationships = array();
  
  /**
   * The default constructor
   */
  public function __construct() 
  {
  }
  
  /**
   * Set the metadata object
   * @param Metadata $data 
   */
  public function setMetadata( Metadata &$data )
  {
    $this->mMetadata = data;
  }
  
  /**
   * Get the metadata object
   * @return type 
   */
  public function getMetadata()
  { 
    return $this->mMetadata;
  }
  
  /**
   * Add a datastream
   * @param type $id
   * @param Datastream $data 
   */
  public function addDatastream( &$id, Datastream &$data )
  { 
    $this->mDatastreams[$id] = $data;
  }
  
  /**
   * Get the datastream
   * @param type $id 
   */
  public function getDatastream(&$id)
  { 
    return $this->mDatastreams[$id];
  }
  
  /**
   * Delete a datastream
   * @param type $id 
   */
  public function deleteDatastream(&$id)
  {
    $this->mDatastreams[$id] = null;
  }
  
  /*
   * INTERNAL: Add a relationship to the object
   * @param type $relationship 
   */
  public function addRelationship(&$relationship)
  {
    $this->mRelationships[$relationship] = $relationship;
  }
  
  /**
   * INTERNAL: Delete a relationship from the object
   * @param type $relationship 
   */
  public function deleteRelationship(&$relationship)
  {
    $this->mRelationships[$relationship];
  }
}

?>
