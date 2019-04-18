<?php include("dbconnect.php");

$image_id = $_GET["image_id"];

if(isset($_POST["submit"])) {
    $sql="INSERT INTO images (approved) VALUES (1) WHERE image_id = '$image_id'";
    if (mysqli_query($db, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
}