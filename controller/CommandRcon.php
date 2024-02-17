<?php

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function GlistToJson(){
  require 'model/RconConnect.php';

  $cmd = sendCommand("glist");

  $finalJson = [];

  $phpLine = explode("\n",$cmd);

  foreach ($phpLine as $key) {
    $NameAndPlayer = explode(":",$key);

    if (!(strpos($NameAndPlayer[0], "[") === false)) {
      $name = get_string_between($NameAndPlayer[0], "[", "]");
      $number = (int)get_string_between($NameAndPlayer[0], "(", ")");

      $playerList = explode(" ", str_replace(",", "", $NameAndPlayer[1]));

      $i = 0;
      foreach ($playerList as $player) {
        if ($player == "") {
          unset($playerList[$i]);
        }
        $i++;
      }

      $finalJson[$name] = array("name" => $name,"num" => $number, "player" => $playerList);
    }
  }

  return $finalJson;
}
