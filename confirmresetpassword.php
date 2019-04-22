<?php
include("dbconnect.php");
$password = $_POST["password"];
$user_id = $_POST['user_id'];

$sql = "INSERT INTO users (password) VALUES ('$password') WHERE user_id='$user_id'";
if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:login.php");