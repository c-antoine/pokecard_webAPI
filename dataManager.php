<?php
require('sqlRequest.php');
require('jsonManager.php');
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors',1);
ini_set('display_errors',1);

function checkPokedex($param){
  if( notEmpty($param['action']) && $param['action']=='pokedex'){
    //Fait un appel HTTP à pokeapiV2 et retourne une arrayList
    $arrayToEncode = getJSONPokedex();
    //Encode le tableau en JSON et le retourne
    httpJsonEncoder($arrayToEncode);
  }
}

/*
$_GET['action'] = cardlist
$_GET['user'] = id_user
*/
function checkUser($param){
  if( notEmpty($param['action']) && $param['action']=='cardlist' && notEmpty($param['user']) ) {
    //Si l'utilisateur n'existe pas
    if(!getUser($param['user'])){
      //On crée l'utilisateur & ses cartes
      createUser($param['user']);
    }
    //Récupère la liste des cartes liés à l'utilisateur en BDD
    $cardList = getListCardForUser($param['user']);
    //Fait un appel HTTP à pokeapiV2 et retourne une arrayList
    $arrayToEncode = getJSONCardsFromArray($cardList);
    //Encode le tableau en JSON et le retourne
    httpJsonEncoder($arrayToEncode);
  }
}

/*
$_GET['action'] = details
$_GET['card'] = id_card
*/
function checkCard($param){
  if( notEmpty($param['action']) && $param['action']=='details' && notEmpty($param['card']) ){
    //Si la carte existe, entre 1 et 802
    if($param['card']>0 && $param['card']<803){
      //Fait un appel HTTP à pokeapiV2 et retourne un carte
      $arrayToEncode = getJSONCardFromID($param['card']);
      //Encode le tableau en JSON et le retourne
      httpJsonEncoder($arrayToEncode);
    }
  }
}

/* L'échange de carte
$_GET['action'] = trade
$_GET['trade'] = create / accept / destroy
$_GET['userFrom'] = id_user qui veux échanger
$_GET['userTo'] = id_user destinataire
$_GET['card'] = id_card
*/
function checkTrade($params){
  if( notEmpty($params['action']) && $params['action']=='trade' && notEmpty($params['trade'])){
    if( notEmpty($params['userFrom']) && notEmpty($params['userTo'])){
      if( getUser($params['userFrom']) && getUser($params['userFrom'])){
        if($params['card']>0 && $params['card']<803){
          if($params['trade'] == 'create'){
            // && (!getExchange($params))
            createExchange($params);
          }else if($params['trade'] == 'accept'){
            //doAccept
          }else if($params['trade'] == 'destroy'){
            //doDestroy
          }
        }
      }
    }
  }
}

function createUser($user_id){
  //On génère une liste de 5 pokemons aléatoirement
  $cardlist = generateRandomPokemons($user_id);
  //On ajoute les pokemons en BDD et on les lie à l'utilisateur
  setCardlistToUser($user_id, $cardlist);
  //On créer l'utilisateur
  setUser($user_id);
}

function notEmpty($value){
  if( (isset($value) && !empty($value)) ){
    return true;
  }else{
    return false;
  }
}

function generateRandomPokemons($id_user){
  $pokeList = "";
  for($nbPokemons=0;$nbPokemons<5;$nbPokemons++){
    if($nbPokemons!=0){
      $pokeList = $pokeList.";".rand(1, 802);
    }else{
      $pokeList = $pokeList.rand(1, 802) ;
    }
  }
  return $pokeList;
}


?>
