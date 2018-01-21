<?php
require('routeManager.php');
if(!empty($_GET)){
  echo checkHttpGet($_GET);
}
?>
