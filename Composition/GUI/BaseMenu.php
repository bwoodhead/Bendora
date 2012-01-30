<?php

class BaseMenu 
{
  private $mComponents;
  
  public function __constructor()
  {
    $this->mComponents = array();
  }
  
  public function addMenuItem($item)
  {
    $this->mComponents[$item] = $item;
  }
  
  public function getMenuItem()
  {
    return $item;
  }

}

?>
