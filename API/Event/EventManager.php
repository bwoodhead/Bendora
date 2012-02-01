<?php

class EventManager 
{
  private $mInstance = null;
  private $mListeners = array();
  
  /**
   * A private constructor
   */
  private function __constructor() {
    
    // Has the singleton already been created
    if ( $this->mInstance != NULL ) {
      // Already created so throw an error
      throw new Exception('Singleton already created!');
    }
  }
  
  /**
   * A singleton accessor
   */
  public static function Instance()
  {
    if ( $this->mInstance == NULL ) 
    {
      $this->mInstance = new EventManager();
    }
    
    return $this->mInstance;
  }

  /**
   * Register a listener
   * @param type $eventType The type of event
   * @param type $listener The object to catch the event
   * @param type $method The method to call on the object
   */
  public function RegisterListner(Event $eventType, $listener, $method)
  {
    if ( $eventType == NULL || $listener == NULL )
    {
      throw new Exception('Unable to register a listener!');
    }
    
    $this->mListeners[$eventType->getClass()][$listener] = $method;
  }
  
  /**
   * Unregister a listener
   * @param type $eventType The type of event
   * @param type $listener The object to catch the event
   */
  public function UnregisterListener(Event $eventType, $listener)
  {
    if ( $eventType == NULL || $listener == NULL )
    {
      throw new Exception('Unable to unregister a listener!');
    }

    $this->mListeners[$eventType->getClass()][$listener] = null;
  }
  
  
  public function FireEvent(Event $eventType)
  {
    $listeners = $this->mInstances[$eventType->getClass()];
    if ( ! $listeners )
    {
      // No listeners
      return;
    }
    
    // Loop through all the listeners and get the call method
    foreach($listeners as $listener=>$method)
    {
      // Call the method on the listener and pass in the event itself
      call_user_method($method, $listener, $event);
    }
  }
  
}

?>
