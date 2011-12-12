<?php

namespace \API\DI;

class DependencyInjector
{
  private $mSingletons = array();
  private $mModule;
  
  /**
   * 
   */
  private function __constructor() 
  {
    $this->mModule = $module;
  }
  
  /**
   * Create an injector
   * @param \API\DI\AbstractModule $module
   * @return DependencyInjector 
   */
  public static function createInjector( \API\DI\AbstractModule $module )
  {
    return new DependencyInjector( $module );
  }
  
  /**
   * Get a class instance
   * @param type $className
   * @return className 
   */
  public function getInstance($className, $args = null) 
  {
    // should check to see how many args were passed in.
    // $numArgs = func_num_args();
    
    // Get the class reflection
    $class = new ReflectionClass($className);

    // Check to see if the class is suppost to be a singleton
    $singleton = isSingleton($class->getDocComment());
    
    // Is it a singleton 
    if ( $singleton )
    {
      // Have we already created the singleton
      if ( isset($this->mSingletons[$className]))
      {
        // Return the previously created singleton
        return $this->mSingletons[$className];
      }
    }

    // Get the constructor
    $constructor = $class->getConstructor();

    // Check to see if its flagged for injection
    if ( ! isRequiringInject($constructor->getDocComment()) )
    {
      if ($singleton) 
      {
        // Return a new class with the passed in params and store it in the singletons array
        return $this->mSingletons[$className] = $class->newInstanceArgs($args);    
        
      } else {

        // Return a new class with the passed in params
        return $class->newInstanceArgs($args);
      }
    }

    $parameters = $constructor->getParameters();
    var_export($parameters);

    foreach($parameters as $param)
    {
      echo ($param->name);
      echo ($param->allowsNull());
      echo ($param->isDefaultValueAvailable()) ? $param->getDefaultValue() : "None";
      echo ($param->isArray()) ? "Yes" : "No";
      echo ($param->isOptional()) ? "Yes" : "No";
    }
  } 
  
  private function isSingleton( &$document )
  {
    return false;
  }

  private function isRequiringInject( &$document ) 
  {
    return true;
  }
  
  private function createParameters( &$args )
  {
    $temp = array();
    foreach( $args as $value )
    {
      $temp = $this->getInstance($value);
    }
    return $temp;    
  }
}

?>
