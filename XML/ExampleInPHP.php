<?php

class xmlElement
{
  private $mName;
  private $mAttributes = array();
  private $mChildren = array();

  /**
   *
   * @param type $name 
   */
  public function __construct($name) 
  {
    $this->mName = $name;
  }
  
  /**
   *
   * @param type $name
   * @return type 
   */
  public function __get($name) 
  {
    if ($name == "attribute") 
    {
      return $this->mAttributes[$name];
    }
    
    if ( ! array_key_exists($name, $this->mChildren) ) 
    {
      $this->mChildren[$name] = new xmlElement($name);
    }
    
    return $this->mChildren[$name];
  }
  
  /**
   *
   * @param type $name
   * @param type $value 
   */
  public function __set($name, $value) 
  {
    if ($name == "attribute") 
    {
      $this->mAttributes[$mAttributes] = $value;
    }
  }
  
  /**
   * 
   * @return type 
   */
  public function __invoke() 
  {
    return $this->mChildren;
  }
  
  /**
   *
   * @return string 
   */
  public function __toString() 
  {
    // Create the opening tag
    $string = "<" . $this->mName;
    foreach($this->mAttributes as $key => $value)
    {
      $string .= " ". $key ." = '" .$value ."'";
    }
    $string .= ">";
    
    foreach($this->mChildren as $value)
    {
      $string = $value;
    }
    
    // Create the closing tag
    $string .= "</" . $this->mName .">";
    return $string;
  }
}


//$root->indent->models; // Returns a list
//$root->indent->models->model->name; // Returns the property
//$root->indent->models->model->name->search("blah"); 
//$root->indent->attribute->name = value;
//$root->indent->value;

$xmlTest = new xmlElement("root");
$xmlTest->name = test;
echo ("test");
echo ( $xmlTest );

?>
