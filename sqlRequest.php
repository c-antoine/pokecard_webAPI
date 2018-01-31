<?php
require('dataBaseConnect.php');

function getUser($id_user){
  $database=dbConnect();
  $getUserQuery=$database->prepare("SELECT * FROM user WHERE id = :id;");
  $getUserQuery->bindParam(":id", $id_user);
  $getUserQuery->execute();
  $getUserResult=$getUserQuery->fetch();
  if( (isset($getUserResult['id']) && !empty($getUserResult['id'])) ){
    return true;
  }else{
    return false;
  }
}

function getListCardForUser($id_user){
  $database=dbConnect();
  $getCardListQuery=$database->prepare("SELECT * FROM cardlist WHERE id_user = :id_user;");
  $getCardListQuery->bindParam(":id_user", $id_user);
  $getCardListQuery->execute();
  $result=$getCardListQuery->fetch();
  $array = array();
  $array = explode(";", $result['cardlist']);
  return $array;
}

function setCardlistToUser($id_user, $cardlist){
  $database=dbConnect();
  $setCardlistQuery=$database->prepare("INSERT INTO cardlist (id_user, cardlist) VALUES(:id_user, :cardlist);");
  $setCardlistQuery->bindParam(":id_user", $id_user);
  $setCardlistQuery->bindParam(":cardlist", $cardlist);
  $setCardlistQuery->execute();
}

function setUser($id_user){
  $database=dbConnect();
  $setUserQuery=$database->prepare("INSERT INTO user (id, name) VALUES(:id, '');");
  $setUserQuery->bindParam(":id", $id_user);
  $setUserQuery->execute();
}

function createExchange($params){
  $database=dbConnect();
  $createExchange = $database->prepare("INSERT INTO exchange (userFrom, userTo, card, status) VALUES (:userFrom, :userTo, :card, 'created');");
  $createExchange->bindParam('userFrom', $params['userFrom']);
  $createExchange->bindParam('userTo', $params['userTo']);
  $createExchange->bindParam('card', $params['card']);
  $createExchange->execute();
}

function getExchange($params){
  $database=dbConnect();
  $getUserQuery=$database->prepare("SELECT * FROM exchange WHERE userFrom;");
  $getUserQuery->bindParam(":id", $id_user);
  $getUserQuery->execute();
  $getUserResult=$getUserQuery->fetch();
  if( (isset($getUserResult['id']) && !empty($getUserResult['id'])) ){
    return true;
  }else{
    return false;
  }
}



?>
