<?php

namespace \API\DI;

abstract class AbstractModule 
{
  private $mBindList = array();
  
  /**
   * Override the configuration to define what gets mapped to what.
   */
  public function configure();
  
  /**
   *
   * @param type $from
   * @param type $to 
   */
  protected function bind($from, $to)
  {
    // Store the mapping
    $this->mBindList[$from] = $to;
  }
  
  /**
   *
   * @param type $from
   * @return type 
   */
  public function getBinding($from)
  {
    // Do we have a binding for the class
    if ( isset($this->mBindList[$from])) 
    {
      // Return the mapped class
      return $this->mBindList[$from];
    }
    
    // Return the original class
    return $from;
  }
}

?>
