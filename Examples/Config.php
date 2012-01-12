<?php

/**
 * Base Configuration class.
 * The model uses magic __get and __set 
 * to store data.
 */
abstract class Configuration2
{
  private $data = array();
  
  public function Save();
  public function Load();
  
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

/**
 * File stored configuration example
 */
class FileConfigure extends Configuration2
{
  private $mFileName;
  public function __constructor($fileName)
  {
    $this->mFileName = $fileName;
  }
  
  public function Save()
  {
    //fopen($fileName, "r+w");
    while (list($key, $value) = each($this->data)) 
    {
      // write to a files
    }
  }
  
  public function Load() 
  {
    //fopen($fileName, "r");
  }
}

/**
 * Example of using the configuration
 */
public IslandoraAPI
{
  private $mConfig;
  /**
   *
   * @param Configuration2 $config 
   */
  public function __constructor( Configuration2 $config )
  {
    $this->mConfig = $config;
  }
  
  /**
   * Load the config
   */
  public function LoadConfig()
  {
    $this->mConfig->Load();
  }
  
  /**
   * Save the config
   */
  public function SaveConfig()
  {
    $this->mConfig->Save();
  }
  
  /** 
   * Return the config
   * @return type 
   */
  public function GetConfig()
  {
    return $this->mConfig;
  }
}

/*********************/
$islandora = new IslandoraAPI( new FileConfigure("config.txt") );
$islandora->LoadConfig();

?>
