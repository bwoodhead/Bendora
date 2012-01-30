<?php

class BaseMenuItem 
{
  define("AWAKE", 0);
  public static const $AWAKE = 0;
  public static const $SLEEP = 1;
  
  private $status;
  
  public function __construct() 
  {
    $status=0;
  }
  
  public function Awake();
  
  public function Sleep();
}

?>
