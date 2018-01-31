<?php
require('routeManager.php');
// echo $actual_link;
if(!empty($_GET)){
  echo checkHttpGet($_GET);
}
?>
