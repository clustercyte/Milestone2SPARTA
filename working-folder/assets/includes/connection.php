<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "muhmuslim";
$db['db_pass'] = "toor";
$db['db_name'] = "c_phiwiki";

foreach($db as $key => $value) {

    define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


?>