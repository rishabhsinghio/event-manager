<?php
$host="localhost";
$user="root";
$password="";
$database="events";

$conn = mysqli_connect($host, $user, $password, $database);
if(!$conn){
  die("DB connection failed");
}
?>