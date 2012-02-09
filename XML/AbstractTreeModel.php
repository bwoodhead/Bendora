<?php

/**
 * AbstractAttributes helps with setting attributes using magic methods.
 */
class AbstractAttributes
{
  private $mData = array(); 
  
  public function __get($name) 
  {  
    if ( ! array_key_exists($name, $this->mData)) {
      return null;
    }
    
    return $this->mData[$name];
  }
  
  public function __set($name, $value) 
  {
    $this->mData[$name] = $value;
  } 
  
  public function printAttributes()
  {
    $string = null;
    foreach( $this->mData as $key => $value ) {
      $string .= $key . ": ". $value . "<br>";
    }
    return $string;
  }
}

/**
 * Abstract Tree Model represents data trees in a php friendly way.
 */
class AbstractTreeModel 
{
  private $mName;
  private $mValue;
  private $mAttributes;
  private $mChildren;
  
  public function __construct($name, $value=null) 
  {
    $this->mName = $name;
    $this->mValue = $value;
    $this->mAttributes = new AbstractAttributes();
    $this->mChildren = array();
  }

  public function __get($name) 
  { 
    if ( $name == "_attributes") {
      return $this->mAttributes;
    }
    if ( ! array_key_exists($name, $this->mChildren($name)) )
    {
      $this->mChildren[$name] = new AbstractTreeModel($name);
    }
    return $this->mChildren[$name];
  }
  
  public function __set($name, $value) 
  {
    $this->mValue = $value;
  } 
  
  public function _setValue($value)
  {
    $this->mValue = $value;
  }

  public function _addAttribute($key, $value)
  {
    $this->mAttributes->$key = $value;
  }

  public function _addChild(AbstractTreeModel &$child)
  {
    array_push( $this->mChildren, $child );
  }
  
  public function printTree()
  {
    echo("<table border=1>");
    echo("<tr><td colspan=2>Name: " . $this->mName . "</td></tr>");
    echo("<tr><td><td>Value: " . $this->mValue . "</td></td></tr>");
    echo("<tr><td><td>Attrib: ". $this->mAttributes->printAttributes() . "</td></td></tr>");
    foreach($this->mChildren as $value)
    {
      echo("<tr><td><td>");
      $value->printTree();
      echo("</td></td></tr>");
    }
    echo("</table>");
  }
}

//header("Content-type: text/plain");

$root = new AbstractTreeModel("Root");

$root->books->book1->name = "Test Book1";
$root->books->book1->_attributes->type = "Soft Cover";

$root->books->book2->name = "Test Book2";
$root->books->book2->_attributes->type = "Soft Cover";

$root->books->book3->name = "Test Book3";
$root->books->book3->_attributes->type = "Soft Cover";

/*
$root->_addAttribute("name", "TestTest");

$page1 = new AbstractTreeModel("page1", "asdf1");
$page2 = new AbstractTreeModel("page2", "asdf2");

$page1->_addAttribute("asdf", "att1");
$page1->_addAttribute("asdf", "att2");

$root->_addChild( $page1 );
$root->_addChild( $page2 );

$child1 = new AbstractTreeModel("child1", "value1");
$child2 = new AbstractTreeModel("child2", "value2");

$page1->_addChild($child1);
$page2->_addChild($child2);

//$root->name = "asdf";
//$root->name = "asdf";
//$root->attribute->adsf = 'asdf';

*/

$root->printTree();

//echo('<pre>');
//var_dump( $root );

//print_r( $root );

?>
