<?php
include("dbconnect.php");

$username = "AliSim";
$password = "password1";

$sql="SELECT * FROM users WHERE username='$username' and password='$password'";
$result=$db->query($sql);
$row=$result->fetch_array();
while($row = $result->fetch_array()){
    $userlevel = $row['user_level'];
    echo "<p>{$userlevel}</p>";
}
?>

<p>5</p>
