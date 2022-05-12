<?php
namespace App\Helpers;
class Quadrilateral {
  public $width;
  public $length;
  public $volume;

  function __construct($width, $length) {
    $this->width = $width;
    $this->length = $length;
  }
  function get_length() {
    return $this->length;
  }
  function get_width() {
    return $this->width;
  }
    
  function get_volume() {
    return $this->volume;
  }
    
}
?>