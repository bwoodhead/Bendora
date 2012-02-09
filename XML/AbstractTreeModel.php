<?php

/**
 * Abstract Tree Model represents data trees in a php friendly way.
 */
class AbstractTreeModel 
{
  private $mName;
  private $mValue;
  private $mAttributes;
  private $mChildren;
  
  public function __construct($name, $value) 
  {
    $this->mName = $name;
    $this->mValue = $value;
    $this->mAttributes = array();
    $this->mChildren = array();
  }
  
  public function _setValue($value)
  {
    $this->mValue = $value;
  }

  public function _addAttribute($key, $value)
  {
    $this->mAttributes[$key] = $value;
  }

  public function _addChild(AbstractTreeModel &$child)
  {
    array_push( $this->mChildren, $child );
  }
  
  public function printTree()
  {
    echo("<table border=1><tr>");
    echo("<td>" . $this->mName . "</td>");
    echo("<td>" . $this->mValue . "</td>");
    echo("<td>");
    foreach($this->mAttributes as $key => $value) 
    {
      echo($key . ": ". $value . "<br>");
    }
    foreach($this->mChildren as $value)
    {
      $value->printTree();
    }
    echo("</td>");
    echo("</tr></table>");
  }
}

$root = new AbstractTreeModel("Root");
$root->_setValue("Test");
$root->_addAttribute("name", "TestTest");

$page1 = new AbstractTreeModel("page1", "asdf1");
$page2 = new AbstractTreeModel("page2", "asdf2");

$page1->_addAttribute("asdf", "bob");
$root->_addChild( $page1 );
$root->_addChild( $page2 );

$root->printTree();

echo('<pre>');
var_dump( $root );

print_r( $root );


?>
