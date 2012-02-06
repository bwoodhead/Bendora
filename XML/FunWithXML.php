<?php
// Show all errors
error_reporting(E_ALL);

class FunWithXML 
{
  public function __invoke() {
    echo("invoke");
  }
  
  public function __set($name, $value) {
    echo("set" . $value);
  }
  
  public function attribute()
  {
    return array();
  }
}

$asdf = new FunWithXML();
$asdf->name = "asdf";
$asdf->attribute['name'] = test;
?>
