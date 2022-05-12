<?php
namespace App\Helpers;
use App\Helpers\Container;
class Calculations {

  function calculate($containers, $transports) {
    $resultArr = [];
    // foreach ($containers as $key => $container) {
    //     array_push($resultArr, $this->subset_sum(array_column($transports, 'volume'), $container->volume));
    // }
    // $result = $this->subset_sum(array_column($transports, 'volume'),  300);
    //   foreach ($containers as $key => $container) {
          
    //   }
  
    $array = array(3, 5, 7, 14);
    $sum = 30;

   

    return  $this->getAllCombinations(0, $array, $sum);;
  }

 
  function getContainers($tempContainers){
      $containersArr = [];
      foreach ($tempContainers as $key => $container) {
          $containerObj = new Container($container['width'], $container['length']);
          $containerObj = $containerObj->setVolume();
          array_push($containersArr,  $containerObj);
      }
      return $containersArr;
  }

 
  function getTransports($tempTransports){
      $transportArr = [];
      foreach ($tempTransports as $key => $transport) {
          if(isset($transport['radius'])){
            $transportObj = new Circle($transport['radius']);
            $transportObj->setVolume();
            array_push($transportArr,  $transportObj);
          } else if(isset($transport['width']) && isset($transport['length'])) {
            $transportObj = new Square($transport['width'], $transport['length'], );
            $transportObj->setVolume();
            array_push($transportArr,  $transportObj);
          }
      }
      return $transportArr;
  }
  
 

function getAllCombinations($ind, $denom, $n, $vals=array()){
    global $totals, $x;
    if ($n == 0){
        foreach ($vals as $key => $qty){
            for(; $qty>0; $qty--){
                $totals[$x][] = $denom[$key];
             }
        }
        $x++;
        return;
    }
    if ($ind == count($denom)) return;
    $currdenom = $denom[$ind];
    for ($i=0;$i<=($n/$currdenom);$i++){
        $vals[$ind] = $i;
        $this->getAllCombinations($ind+1,$denom,$n-($i*$currdenom),$vals);
    }
    return $totals;
}


//   function subset_sum($numbers, $target, $precision=0, $part=null)
//     {
//         // we assume that an empty $part variable means this
//         // is the top level call.
//         $toplevel = false;
//         if($part === null) {
//             $toplevel = true;
//             $part = array();
//         }

//         $s = 0;
//         foreach($part as $x)
//         {
//             $s = $s + $x;
//         }

//         // we have found a match!
//         if(bccomp((string) $s, (string) $target, $precision) < 0)
//         {
//             sort($part); // ensure the numbers are always sorted
//             return array(implode('|', $part));
//         }

//         // gone too far, break off
//         if($s >= $target)
//         {
//             return null;
//         }

//         $matches = array();
//         $totalNumbers = count($numbers);

//         for($i=0; $i < $totalNumbers; $i++)
//         {
//             $remaining = array();
//             $n = $numbers[$i];

//             for($j = $i+1; $j < $totalNumbers; $j++)
//             {
//                 $remaining[] = $numbers[$j];
//             }

//             $part_rec = $part;
//             $part_rec[] = $n;

//             $result = $this->subset_sum($remaining, $target, $precision, $part_rec);
//             if($result)
//             {
//                 $matches = array_merge($matches, $result);
//             }
//         }

//         if(!$toplevel)
//         {
//             return $matches;
//         }

//         // this is the top level function call: we have to
//         // prepare the final result value by stripping any
//         // duplicate results.
//         $matches = array_unique($matches);
//         $result = array();
//         foreach($matches as $entry)
//         {
//             $result[] = explode('|', $entry);
//         }

//         return $result;
//     }
}
?>