<?php
include "db.php";

$conn = mysqli_connect($host, $user, $password, $database);
if(!$conn){
  die("DB connection failed");
}

$title = $_POST["title"];
$description = $_POST["description"];
$dep = $_POST["dep"];
$hod = $_POST["hod"];
$venue = $_POST["venue"];
$lastdate = $_POST["lastdate"];
//$programs = $_POST["programs"];
$rules = $_POST["rules"];

$eventds = "INSERT into events (title, descript, depart, hod, venue, lastdate, rules) VALUES ('$title', '$description', '$dep', '$hod', '$venue', '$lastdate', '$rules')";

mysqli_query($conn,$eventds);
?>