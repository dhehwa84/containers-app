<?php
namespace App\Helpers;
use App\Helpers\Quadrilateral;

class Container extends Quadrilateral{
  public $transports = [];
  public $name = "Container";
    function setVolume() {
      $this->volume = $this->width * $this->length;
    }
      
}
?>