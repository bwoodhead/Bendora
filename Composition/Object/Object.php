<?php

/**
 * Repository Composition Object
 * Add Metadata and Datastreams to the object.
 */
class Object 
{
  private $mMetadata;
  private $mDatastream = array();
  private $nextId = 0;
  
  /**
   * Add meta data object
   * @param type $metadata 
   */
  public function setMetaData($metadata) 
  {
    $this->mMetadata = $metadata;
  }
  
  /**
   * Get the meta data object
   * @return type 
   */
  public function getMetaData() 
  {
    return $this->mMetadata;
  }
  
  /**
   * Add a datastream
   * @param type $data
   * @param type $id 
   */
  public function addDatastream($data)
  {
    $this->mDatastream[getNextId()] = $data;
  }
  
  /**
   * Get a datastream
   * @param type $id
   * @return type 
   */
  public function getDatastream($id)
  {
    return $this->mDatastream[$id];
  }
  
  private function getNextId()
  {
    // Increment after returning the current value
    return $this->nextId++;
  }
}

?>
