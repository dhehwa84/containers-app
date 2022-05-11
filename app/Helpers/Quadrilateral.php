<?php
class Quadrilateral {
  public $width;
  public $length;

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
}
?>