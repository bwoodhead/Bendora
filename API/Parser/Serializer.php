<?php

class Serializer 
{
  private $mInputFormat;
  private $mOutputFormat;
  
  public function __construct( Serializer\Interfaces\iSerializeInput $inputFormat, Serializer\Interfaces\iSerializeOutput $outputFormat) 
  {
    $this->mInputFormat = $incputFormat;
    $this->mOutputFormat = $outputFormat;
  }
  
  /**
   * Convert from an input to an output type
   * @param type $string
   * @return type 
   */
  public function convert($string) 
  {
    return $this->mOutputFormat.outputStream( $this->mInputFormat.inputStream( $string )); 
  }
}

?>
