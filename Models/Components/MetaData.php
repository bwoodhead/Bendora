<?php

class Metadata 
{
  private $data = array();

  /**
   * Magic get function allows access to data as properties
   * @param type $name
   * @return type 
   */
  public function __get($name) 
  {
    return $this->data[$name];
  }
  
  /**
   * Magic set function allows access to data as properties
   * @param type $name
   * @param type $value 
   */
  public function __set($name, $value) 
  {
    $this->data[$name] = $value;
  }
}

?>
