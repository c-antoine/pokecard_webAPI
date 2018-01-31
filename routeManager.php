<?php

require('dataManager.php');

function checkHttpGet($param){

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
  checkTrade($param);
}

?>
