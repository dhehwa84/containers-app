<?php
class Circle {
  public $radius;

  function __construct($radius) {
    $this->radius = $radius;
  }
  function get_radius() {
    return $this->radius;
  }
  function get_volume() {
    return $this->radius * 2;
  }
}
?>