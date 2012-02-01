<?php

class Repository 
{
  private $mRepository;
  
  public function __contructor( Graph\Interfaces\iRepository &$repo )
  {
    $this->mRepository = $repo;
  }
  
}

?>
