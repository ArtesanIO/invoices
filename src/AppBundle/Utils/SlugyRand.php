<?php

namespace AppBundle\Utils;

class SlugyRand
{

  public function slug($start = 5, $end = 15)
  {
    $string = implode("", $this->string());

    $numbers = implode("", $this->numbers());

    $str_shuffle = str_shuffle($string.$numbers);

    $rand = rand($start, $end);

    return strtolower(substr($str_shuffle, 5, $rand));
  }

  protected function string()
  {
    return [
      "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","k",
      "r","s","t","o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
    ];
  }

  protected function numbers()
  {
    return [0,1,2,3,4,5,6,7,8,9];
  }

}
