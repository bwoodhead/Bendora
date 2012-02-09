<?php

class alan 
{
  private $pid;
  
  /**
   * Book pid
   * @param type $pid 
   */
  public function __construct($pid) 
  {
    $this->mPid = $pid;
  }
  
  /**
   * Load the page data
   * @param type $pageId
   * @return type 
   */
  public function loadPage($pageId)
  {
    $results = $this->getEdittedOCRStream($pageId);
    
    if ($results == NULL)
    {
      $results = $this->getOCRStream($pageId);
    }
    
    return $results;
  }
  
  /**
   * Save the page data
   * @param type $pageId
   * @param type $page 
   */
  public function savePage($pageId, $page)
  {
    $this->setEdittedOCRStream($pageId, $page);
  }
  

  /**
   * Get the default ocr stream
   * @param type $pageId
   * @return type 
   */
  private function getOCRStream($pageId)
  {
    // Getstream
    return $this->decode($results);
  }
  
  /**
   * Get the user edited stream
   * @param type $pageId
   * @return type 
   */
  private function getEdittedOCRStream($pageId)
  {
    // Getstream
    return $this->decode($results);
  }
  
  /**
   * Set the OCR Stream
   * @param type $pageId
   * @param type $page 
   */
  private function setEdditedOCRStream($pageId, $page)
  {
    // Encode the page
    $page = $this->encode($page);

    // Save the datastream
  }

  /**
   * Encode the page
   * @param type $page
   * @return type 
   */
  private function encode($page)
  { 
    return $page;
  }
  
  /**
   * Decode the page
   * @param type $page
   * @return type 
   */
  private function decode($page)
  { 
    return $page;
  }

}

?>
