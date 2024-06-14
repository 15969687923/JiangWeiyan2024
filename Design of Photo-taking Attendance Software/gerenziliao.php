<?php
header("Content-type: text/html; charset=utf-8");
$servername = "localhost:3306";
$username = "root";
$password = "861576789n";
$dbname = "tuqiandb";
 

$conn = new mysqli($servername, $username, $password,$dbname);
 
session_start();
$_SESSION["panduan"] = 0;
}