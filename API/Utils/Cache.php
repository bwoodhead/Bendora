<?php

namespace \API\Utils;

class Cache 
{
  private $mCache;
  
  public function __constructor(\API\Cache\Interfaces\iCache &$cache)
  {
    $this->mCache = $cache;
  }
  
}

?>
