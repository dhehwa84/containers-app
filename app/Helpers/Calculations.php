<?php
namespace App\Helpers;
use App\Helpers\Container;
class Calculations {

  /**
   * takes the containers and transpots array and 
   * determines which combinations of transports fits into the containers
   * @param containers array
   * @param transports array
   */
  function calculate($containers, $transports) {
    // first we  get the powerset of the transports
    $powerSet = $this->transport_power_set($transports);

    // go through the containers and deteermine what can fit
    foreach ($containers as $key => $container) {
      $this->fitTransportsToContainer($container, $powerSet);
    }
    return $containers;
  }

  function fitTransportsToContainer(&$container, $powerSet)
  {
    foreach ($powerSet as $key => $set) {
      $subArraySize = array_sum(array_column($set, 'volume')); 
      if($subArraySize <= $container->volume){
        array_push($container->transports, $set);
      }
    }
  }

  /**
   * returns a powerset of arrays to the provided set
   * of transports
   * @param array
   */
  function transport_power_set($array) {
    // initialize by adding the empty set
    $results = array(array( ));

    foreach ($array as $element)
        foreach ($results as $combination)
            array_push($results, array_merge(array($element), $combination));

    return $results;
  }
  /**
   * receives an array of containers dimentions and 
   * returns an array of containers objects
   * @param containersDimentions array
   */
  function getContainers($tempContainers){
      $containersArr = [];
      foreach ($tempContainers as $key => $container) {
          $containerObj = new Container($container['width'], $container['length']);
          $containerObj->setVolume();
          array_push($containersArr,  $containerObj);
      }
      return $containersArr;
  }
   /**
   * receives an array of transports dimentions and 
   * returns an array of transports objects
   * @param transportsDimentions array
   */
  function getTransports($tempTransports){
      $transportArr = [];
      foreach ($tempTransports as $key => $transport) {
          if(isset($transport['radius'])){
            // create a circle 
            $transportObj = new Circle($transport['radius']);
            $transportObj->setVolume();
            array_push($transportArr,  $transportObj);
          } else if(isset($transport['width']) && isset($transport['length'])) {
            // create a square
            $transportObj = new Square($transport['width'], $transport['length'], );
            $transportObj->setVolume();
            array_push($transportArr,  $transportObj);
          }
      }
      return $transportArr;
  }
  
}
?>