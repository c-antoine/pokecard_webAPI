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
  // $jsonArray = array();
  foreach ($arrayCardList as $key => $value) {
      // $jsonArray[$key]=;
      $masterArray[$key] = getJSONCardFromID($value);
  }
  return $masterArray;
}

function getJSONCardFromID($value){
  $jsonArray = array();
  $jsonArray = json_decode(file_get_contents("https://pokeapi.co/api/v2/pokemon/".$value."/"), true);

  $name = ($jsonArray['name']);
  $xp = ($jsonArray['base_experience']);
  $height = ($jsonArray['height']);
  $weight = ($jsonArray['weight']);
  $sprite = ($jsonArray['sprites']['front_default']);

  $arrayToSend = array();
  $arrayTypePokemon = array();
  $arrayToSend['id']=$value;
  $arrayToSend['name']=$name;
  $arrayToSend['xp']=$xp;
  //On concatène chaque type dans un String
  foreach ($jsonArray['types'] as $subkey => $subvalue) {
    if(!in_array($subvalue['type']['name'], $arrayTypePokemon)){
      array_push($arrayTypePokemon, $subvalue['type']['name']);
    }
  }
  $arrayToSend['type']=$arrayTypePokemon;
  $arrayToSend['height']=$height;
  $arrayToSend['weight']=$weight;
  $arrayToSend['sprite']=$sprite;

  return $arrayToSend;
}

function httpJsonEncoder($jsonArray){
  header('Content-type: application/json');
  echo json_encode($jsonArray);
}

?>
