<?php

session_start();
define('SITEURL',"http://localhost/food-order/");
$user = "root";
$password = "";
$db = "food-order";
$server = "localhost";

$link = mysqli_connect($server,$user,$password);
if(!$link){
    die("Connection not Established");
}

$seldb = mysqli_select_db($link,$db);

if(!$seldb){
    die("database not Established");
}

?>