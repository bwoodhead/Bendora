<?php

/**
 * The base interface
 */
interface iProcessor
{
  public function BillCustomer( $amount );
}

/**
 * A test implementation returns true
 */
class TestTrueProcessor implements iProcessor
{
  public function BillCustomer($amount) 
  {
    echo($amount);
    return true;
  }
}
/**
 * A test implementation returns true
 */
class TestFalseProcessor implements iProcessor
{
  public function BillCustomer($amount) 
  {
    echo($amount);
    return false;
  }
}

/**
 * A real mastercard implementation
 */
class MasterCardProcessor implements iProcessor
{
  public function BillCustomer($amount) 
  {
    // Connect to mastercard and bill for $amount;
  }
}

/**
 * The Processor API interface class used by everything else.
 */
class Processor
{
  private $mProcessor;
  
  public function __constructor( iProcessor $processor )
  {
    $this->mProcessor = $processor;
  }
  
  public function BillCustomer( $amount )
  {
    $this->mProcessor.BillCustomer($amount);
  }
}

/*******************************************/
// Using it
/*******************************************/

// Create a test processor that will work
$processor = new Processor( new TestTrueProcessor() );

// Bill a credit card
$results = $processor->BillCustomer(100.00);
if ( $results == true )
{
  echo("worked");
}

// Create a test processor that will fail
$processor = new Processor( new TestFalseProcessor() );

// Bill a credit card
$results = $processor->BillCustomer(100.00);
if ( $results != true )
{
  echo("worked");
}

// Done testing so lets create the real deal
$processor = new Processor( new MasterCardProcessor() );

// Bill me 100 dollars
$results = $processor->BillCustomer(100.00);


?>
