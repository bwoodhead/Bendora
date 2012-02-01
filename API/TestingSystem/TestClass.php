<?php

class TestClass 
{
  private $object;
  private $className;
  
  public function __constructor($object)
  {
    $this->object = $object;
    $this->className = strtolower(get_class($class));
    if ( ! is_dir($this->className) ) {
      mkdir($this->className);
    }
  }
  
  public function runTest()
  {
    // Get the objects details
    $reflection = new ReflectionObject($this->object);
    
    // Get the list of methods
    $methods = $reflection->getMethods();
    
    // Loop through all the methods
    foreach($methods as $method)
    {
      callTest($method);
    }
  }
  
  private function callTest($method)
  {
    // Lower case to keep it consistent
    $method = strtolower($method);
    
    // Create a relative filepath
    $fileName = $this->className .  DIRECTORY_SEPARATOR . $filename .".php";
    
    // Check for a test (file_exists())
    if ( ! is_file($fileName) )
    {
      // Open the file for write
      $fileHandler = fopen($fileName, 'w');
      
      // Create a fake tet
      fwrite($fileHandler, getExampleTest($method));
    
      // Close the file
      fclose($fileHandler);
    }
    
    // Inlcude the file
    include_once($fileName);

    // Call the function
    return call_user_func("test\\".$this->className."::".$method);
  }
  
  private function getExampleTest($method)
  {
    $string = "namespace test\\". $this->className .";\n";
    $string .= "function " . $method . "()\n";
    $string .= "{\n";
    $string .= "  return false;\n";
    $string .= "}\n";
    return $string;
  }
  
  private function printResults($string, $result)
  {
    echo($string . ": " . $result);
  }
}

?>
