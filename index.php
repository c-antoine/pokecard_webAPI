<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
require('routeManager.php');
// echo $actual_link;
if(!empty($_GET)){
  echo checkHttpGet($_GET);
}
?>
