<?php

require('sqlRequest.php');
require('jsonManager.php');

function checkHttpGet($param){

  /* L'utilisateur existe ?
  $_GET['action'] = auth
  $_GET['user'] = id_user
  */
  checkUser($param);

  /* Les détails d'une carte
  $_GET['action'] = details
  $_GET['card'] = id_card
  */
  // checkCard($param);

  /* Liste des cartes lié à l'utilisateur
  $_GET['action'] = cardList
  $_GET['user'] = id_user
  */
  // checkCardList($param);

  /* L'échange de carte
  $_GET['action'] = trade
  $_GET['userFrom'] = id_user
  $_GET['userTo'] = id_user
  $_GET['idCard'] = id_card
  */
  // checkTrade($params);
}

function notEmpty($value){
  if( (isset($value) && !empty($value)) ){
    return true;
  }else{
    return false;
  }
}

function checkUser($param){
  if( notEmpty($param['action']) && $param['action']=='auth' && notEmpty($param['user']) ) {
    if(getUser($param['user'])){
      $cardList = getListCardForUser($param['user']);
      echo getJSONCardsFromArray($cardList);
    }else{
      return false;
    }
  }
}

// function checkCard($param){
//   if(  ){
//     echo "1";
// }
//
// function checkCardList($params){
//
// }
//
// function checkTrade($params){
//
// }

?>
