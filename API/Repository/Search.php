<?php

class Search 
{
  private $mSearch;
  
  public function __contructor( Graph\Interfaces\iSearch &$search )
  {
    $this->mSearch = $search;
  }
  
}

?>
