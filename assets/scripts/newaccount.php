<?php include("dbconnect.php");

$emailaddress = $_POST["emailaddress"];
$username = $_POST["username"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["emailaddress"];
$postaddress = $_POST["postaddress"];
$postcity = $_POST["postcity"];
$postcode = $_POST["postcode"];

$sql = "INSERT INTO users ('username', 'emailaddress','password','firstname','lastname','postaddress','postcity','postcode') VALUES ('$username', '$emailaddress','$password','$firstname','$lastname','$postaddress','$postcity','$postcode')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:index.php");
?>