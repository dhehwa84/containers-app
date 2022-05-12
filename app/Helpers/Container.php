<?php
namespace App\Helpers;
use App\Helpers\Quadrilateral;

class Container extends Quadrilateral{
    function setVolume() {
      $this->volume = $this->width * $this->length;
    }
      
}
?>