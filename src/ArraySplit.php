
<?php
  class ArraySplit {

    /*
    * Takes second index in argument array to divide main array into the number
    * of subarrays that second index indicates.
    * eg. [[1, 2], 3] returns [[1], [2]];
    */
    public function split($nums) {
      $finalArr = [];

      $number = $nums[1];
      $arr = $nums[0];

      for($i = 1; $i <= $number; $i++) {
        array_push($finalArr, []);
      }

      if (count($arr) > 0 && $number > 0) {
        $count = 0;
        for($i = 0; $i < count($arr); $i++) {
          array_push($finalArr[$count], $arr[$i]);
          $count++;
          if ($count >= $number) $count = 0;
        }
      } elseif (count($arr) > 0 && $number === 0) {
        return $arr;
      }

      return $finalArr;
    }

  }
