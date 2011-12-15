<?php

class Parser 
{
  private $mParser;
  
  public function __constructor(\Parser\Interfaces\iParser $parser)
  {
    $this->mParser = $parser;
  }
  
}

?>
