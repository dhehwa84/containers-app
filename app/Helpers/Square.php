<?php
namespace App\Helpers;
class Square extends Quadrilateral{
    public $name = "Square";
  function setVolume() {
    $this->volume = $this->length * $this->width;
  }
    
}
?>