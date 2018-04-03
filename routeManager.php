<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
require('dataManager.php');

function checkHttpGet($param){

  checkPokedex($param);
  /*
  La liste de toutes les cartes
  $_GET['action'] = pokedex
  */

  /* Les détails d'une carte
  $_GET['action'] = details
  $_GET['card'] = id_card
  */
  checkCard($param);

  /* Liste des cartes lié à l'utilisateur
  $_GET['action'] = cardList
  $_GET['user'] = id_user
  */
  checkUser($param);

  /* L'échange de carte
  $_GET['action'] = trade
  $_GET['trade'] = create / accept / destroy
  $_GET['userFrom'] = id_user qui veux échanger
  $_GET['userTo'] = id_user destinataire
  $_GET['card'] = id_card
  */
  // checkTrade($param);
}

?>
