<?php 

var_dump($_SERVER);
echo "<br>";
$r = explode("/", $_SERVER['REQUEST_URI']);
echo end($r)."/".prev($r);

?>