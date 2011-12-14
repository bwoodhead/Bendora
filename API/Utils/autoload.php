<?php

function __autoload($class_name) 
{
  echo($class_name . '.php');
  include $class_name . '.php';
}

?>
