<?php

class BaseMenu 
{
  private $mComponents = array();
    
  public function addSubMenu($name, $menu)
  {
    $this->mComponents[$name] = $menu;
  }
  
  public function getMenuItem($name)
  {
    return $this->mComponents[$name];
  }
}

?>
