<?php
include "db.php";

$thumbnail = $_FILES['image']['name'];
$title = $_POST["title"];
$description = $_POST["description"];
$dep = $_POST["dep"];
$hod = $_POST["hod"];
$venue = $_POST["venue"];
$lastdate = $_POST["lastdate"];
$programs = $_POST["programs"];
$rules = $_POST["rules"];

$tmpname = $_FILES['image']['tmp_name'];
$folder = "uploads/".$thumbnail;

// move file to folder
move_uploaded_file($tmpname, $folder);

$eventds = "INSERT into events (thumbnail, title, descript, depart, hod, venue, lastdate, rules) VALUES ('$thumbnail','$title', '$description', '$dep', '$hod', '$venue', '$lastdate', '$rules')";

mysqli_query($conn,$eventds);

// split values by comma
$values = explode(",", $programs);

foreach ($values as $value) {

    $value = trim($value); // remove spaces

    $eventds = "INSERT INTO programs (program_name) VALUES ('$value')";
    $conn->query($eventds);
}

 $filename = strtolower(str_replace(" ", "_", $title)) . ".html";

    // HTML template
    $html = "
    <!DOCTYPE html>
    <html>
    <head>
        <title>$title</title>
    </head>
    <body>
        <h1>$title</h1>
        <p>$description</p>
    </body>
    </html>
    ";

    // Save file
    file_put_contents($filename, $html);

echo "Event Created Successfully!";
?>