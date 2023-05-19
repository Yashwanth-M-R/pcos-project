<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'pcos_2023');

 
//$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link = mysqli_connect('sg2nlmysql15plsk.secureserver.net:3306', 'intrellaroot', 'intrellapass@696', 'attendancedb');
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>