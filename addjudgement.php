<?php
session_start();
include 'dbconnect.php';

$image_id = $_POST['image_id'];
$user_id = $_SESSION["user_id"];
$effectiveness = $_POST['effectiveness'];
$quality = $_POST['quality'];
$lighting = $_POST['lighting'];
$framing = $_POST['framing'];
$category = $_POST['category'];

$sql = "SELECT * FROM scores WHERE image_id = '$image_id' AND user_id = '$user_id'";
$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result) == 0) {

    $sql = "INSERT INTO scores (image_id,user_id,effectiveness,quality,lighting,framing) VALUES ('$image_id','$user_id','$effectiveness','$quality','$lighting','$framing')";
    if (mysqli_query($db, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    echo $image_id;
    $redirectURL = 'displaycategory.php?category='.$category;
    header("location:" .$redirectURL);
} else {
    echo "You have already judged this photo";
}

?>