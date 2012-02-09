<?php

$example = new SimpleXMLElement(<<<EOXML
<?xml version="1.0" encoding="UTF-8"?>
<root>
  <indent name=test>
    <models>
      <model name=asdf1></model>
      <model name=asdf2></model>
      <model name=asdf3></model>
      <model name=asdf4></model>
    </models>
  </indent>
</root>
EOXML
);

$json = json_encode($example);
$array = json_decode($json,TRUE);
print_r( $array );


interface iReader
{
  public function getKey();
  public function getValue();
  public function getAttributes();
  public function getChildren();
}

class XMLReader implements iReader
{
  private $mXML;
  
  public function __constructor(String $xml)
  {
    $this->mXML = new SimpleXMLIterator($xmlstring);
    $this->mXML->rewind();
  }
    
  public function getKey()
  {
    return $this->mXML->key();
  }
  
  public function getValue() 
  { 
    return $this->mXML->value();
  }
  
  public function getAttributes()
  {
    return $this->mXML->attributes();
  }
  
  public function getChildren()
  { 
  }
}

?>
