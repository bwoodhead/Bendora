<?php

namespace Utils;

class Cache 
{
  private $mCache;
  
  public function __constructor( Cache\Interfaces\iCache &$cache )
  {
    $this->mCache = $cache;
  }
  
}

?>
