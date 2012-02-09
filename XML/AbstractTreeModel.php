<?php

/**
 * AbstractAttributes helps with setting attributes using magic methods.
 */
class AbstractAttributes
{
  private $mData = array(); 
  
  /**
   * Magic Get returns the value using the method name as a key.
   * @param type $name
   * @return type 
   */
  public function __get($name) 
  {  
    if ( !array_key_exists($name, $this->mData) ) 
    {
      return null;
    } 
    return $this->mData[$name];
  }

  /**
   * Magic Set stores the value using the method name as a key.
   * @param type $name
   * @param type $value 
   */
  public function __set($name, $value) 
  {
    $this->mData[$name] = $value;
  } 
  
  /**
   * Tree printing helper
   * @return string 
   */
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
  
  /**
   * Default constructor that requires a node name
   * @param type $name
   * @param type $value 
   */
  public function __construct($name, $value=null) 
  {
    $this->mName = $name;
    $this->mValue = $value;
    $this->mAttributes = new AbstractAttributes();
    $this->mChildren = array();
  }

  /**
   * Magic Get Method that return abstract tree models or attributes based on the method name
   * @param type $name
   * @return type 
   */
  public function __get($name) 
  { 
    if ( $name == "_attributes") {
      return $this->mAttributes;
    }
    
    if ( ! array_key_exists($name, $this->mChildren))
    {
      $this->mChildren[$name] = new AbstractTreeModel($name);
    }
    return $this->mChildren[$name];
  }
  
  /**
   * Magic Set Method that stores a value based on the method name
   * @param type $name
   * @param type $value 
   */
  public function __set($name, $value) 
  {
    $this->mValue = $value;
  } 
  
  /**
   * Direct calls to the class will return an array of children.
   * @return type 
   */
  public function __invoke() 
  {
    return $this->mChildren;
  }
  
  /**
   * Tree printing stuff
   */
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

// Create a tree
$root = new AbstractTreeModel("Root");

// Build a path with a book
$root->books->book1->name = "Test Book1";
$root->books->book1->_attributes->type = "Soft Cover";

// Build a path with another book
$root->books->book2->name = "Code Complete";
$root->books->book2->_attributes->type = "Soft Cover";

// Add a magazine to the list
$root->magazines->page1->name = "Tech Review";
$root->magazines->page1->_attributes->type = "Magazine";

// Print the tree
$root->printTree();

echo("<pre>");
// Get all the books 
var_dump( $root->books );

?>
