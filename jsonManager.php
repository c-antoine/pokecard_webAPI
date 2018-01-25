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
      // $abilities = ($jsonArray[$key]['abilities
      $name = ($jsonArray[$key]['name']);
      $xp = ($jsonArray[$key]['base_experience']);
      $height = ($jsonArray[$key]['height']);
      $weight = ($jsonArray[$key]['weight']);
      $sprite = ($jsonArray[$key]['sprites']['front_default']);

      $arrayToSend = array();
      $arrayTypePokemon = array();
      $arrayToSend['id']=$value;
      $arrayToSend['name']=$name;
      $arrayToSend['xp']=$xp;
      foreach ($jsonArray[$key]['types'] as $subkey => $subvalue) {
        if(!in_array($subvalue['type']['name'], $arrayTypePokemon)){
          array_push($arrayTypePokemon, $subvalue['type']['name']);
        }
        // print_r($key);
        // print_r($value);
        // echo $value['type']['name'];
        // $arrayToSend['type']=$arrayToSend['type']+$value[1]['name'];
      }
      $arrayToSend['type']=$arrayTypePokemon;
      $arrayToSend['height']=$height;
      $arrayToSend['weight']=$weight;
      $arrayToSend['sprite']=$sprite;

      $masterArray[$key] = $arrayToSend;
  }
  header('Content-type: application/json');
  echo json_encode($masterArray);
}

?>
