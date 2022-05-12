<?php
namespace App\Helpers;
class Square extends Quadrilateral{
    
  function setVolume() {
    $this->volume = $this->length * $this->width;
  }
    
}
?>