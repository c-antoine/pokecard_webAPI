<?php

function dbConnect(){

/*
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="pokeapi";
  */

  $servername="mysql.hostinger.com";
  $username = "u267870526_mejn";
  $dbname="u267870526_me";
  $password="Bue2nVwLPoN2";

  try {
      $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }
  catch (PDOException $e) {
      echo "Echec lors de la connexion: ";
  }
  return $bdd;
}

?>
