<?php
require('routeManager.php');
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actual_link;
if(!empty($_GET)){
  echo checkHttpGet($_GET);
}
?>
