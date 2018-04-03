<?php

function getJSONCardsFromArray($arrayCardList){
  $masterArray = array();
  $subMasterArray = array();
  // $jsonArray = array();
  foreach ($arrayCardList as $key => $value) {
      // $jsonArray[$key]=;
      $masterArray[$key] = getJSONCardList($value);
  }
  /*
  $subMasterArray['previous']=null;
  $subMasterArray['next']="http://local.project.com/PokeCardAPI/web/index.php/pokemon/get/20";
  */
  $subMasterArray["pokemons"]=$masterArray;
  return $masterArray;
}

function getJSONPokedex(){
  $jsonArray = array();
  $jsonArray = json_decode(file_get_contents("https://pokeapi.co/api/v2/pokedex/1/"), true);
  $idPokemonList = array();
  $idPokemonList = ($jsonArray['pokemon_entries']);

  $arrayToSend = array();
  $i=0;
  foreach ($idPokemonList as $subkey => $subvalue) {
    $arrayToSend[$i]['id']=$subvalue['entry_number'];
      // array_push($arrayToSend, $subvalue['entry_number']);
      $i++;
  }
  return $arrayToSend;
}

function getJSONCardList($value){
  $jsonArray = array();
  $jsonArray = json_decode(file_get_contents("https://pokeapi.co/api/v2/pokemon/".$value."/"), true);

  $name = ($jsonArray['name']);
  $xp = ($jsonArray['base_experience']);
  $sprite = ($jsonArray['sprites']['front_default']);

  $arrayToSend = array();
  $arrayTypePokemon = array();
  $arrayToSend['id']=$value;
  $arrayToSend['name']=ucfirst($name);
  $arrayToSend['xp']=$xp;
  //On concatène chaque type dans un String
  foreach ($jsonArray['types'] as $subkey => $subvalue) {
    if(!in_array($subvalue['type']['name'], $arrayTypePokemon)){
      array_push($arrayTypePokemon, ucfirst($subvalue['type']['name']));
    }
  }
  $arrayToSend['type']=$arrayTypePokemon;
  $arrayToSend['sprite']=$sprite;

  return $arrayToSend;
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
  $arrayToSend['name']=ucfirst($name);
  $arrayToSend['xp']=$xp;
  //On concatène chaque type dans un String
  foreach ($jsonArray['types'] as $subkey => $subvalue) {
    if(!in_array($subvalue['type']['name'], $arrayTypePokemon)){
      array_push($arrayTypePokemon, ucfirst($subvalue['type']['name']));
    }
  }
  //$arrayTypePokemon = substr($arrayTypePokemon, 1);
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
