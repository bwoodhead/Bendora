<?php

/**
 * Single level that uses magic functions
 * Not really useful for production.
 */
class MetaData 
{
  private $data = array();
  
  public function __set($name, $value)
  {
    $this->data[$name] = $value;
  }
  
  public function __get($name)
  {
    if (array_key_exists($name, $this->data))
    {
      return $this->data[$name];
    }
    return null;
  }
}

?>
