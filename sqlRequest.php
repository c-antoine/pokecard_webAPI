<?php
require('dataBaseConnect.php');


// public class User(){
//
// }

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

function setUser($name, $pass){
  $database=dbConnect();
  $setUserQuery=$database->prepare("INSERT INTO user VALUES(:name, :password);");
  $setUserQuery->bindParam(":name", $name);
  $setUserQuery->bindParam(":password", $pass);
  $setUserQuery->execute();
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

?>
