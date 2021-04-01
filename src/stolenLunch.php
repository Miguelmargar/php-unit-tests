<?php

  class StolenLunch {

    public $codeMap = ['a', 'b', 'c', 'd', 'e', 'f',
                      'g', 'h', 'i', 'j', 'k', 'l',
                      'm', 'n', 'o', 'p', 'q', 'r',
                      's', 't', 'u', 'v', 'w', 'x',
                      'y', 'z'];

    public function decifer(string $str) {
      if ($str === "") return $str;

      $numsArr = str_split($str);

      if (count($numsArr) > 0) {

        $finalArr = [];

        foreach($numsArr as $num) {
          array_push($finalArr, $this->codeMap[intval($num)]);
        }
        $finalArr = implode($finalArr);
      }
      return $finalArr;
    }

  }
