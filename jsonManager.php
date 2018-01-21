<?php
// $str = file_get_contents("https://pokeapi.co/api/v2/pokemon/1/");
//
// $jsonIterator = new RecursiveIteratorIterator(
//     new RecursiveArrayIterator(json_decode($str, TRUE)),
//     RecursiveIteratorIterator::SELF_FIRST);
//
// foreach ($jsonIterator as $key => $val) {
//     if(is_array($val)) {
//         echo "$key:<br>";
//     } else {
//         echo "$key => $val<br>";
//     }
// }

// function extractPokemonData($unsortedData){
//
// }

function getJSONCardsFromArray($arrayCardList){
  $masterArray = array();
  foreach ($arrayCardList as $key => $value) {
      // header('Content-type: application/json');

      $jsonArray = array();
      $jsonArray[$key] = json_decode(file_get_contents("https://pokeapi.co/api/v2/pokemon/".$value."/"), true);
      // $forms = ($jsonArray[$key]['forms']);
      // $abilities = ($jsonArray[$key]['abilities']);
      $name = ($jsonArray[$key]['name']);
      $sprite = ($jsonArray[$key]['sprites']['back_default']);

      $arrayToSend = array();
      $arrayToSend[0]=$name;
      $arrayToSend[1]=$sprite;

      // $arrayToSend = json_encode($arrayToSend);
      header('Content-type: application/json');
      // echo $arrayToSend;
      $masterArray[$key] = $arrayToSend;
      // $unsortedData = file_get_contents("https://pokeapi.co/api/v2/pokemon/".$value."/");
      // extractPokemonData();
  }
  echo json_encode($masterArray);
}

?>
