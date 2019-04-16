<?php
include("dbconnect.php");

$username = "AliSim";
$password = "password1";

$sql="SELECT * FROM users WHERE username='AliSim'";
$result=$db->query($sql);
while($row = $result->fetch_array()){
    $userlevel = $row['user_level'];
    echo "<p>{$userlevel}</p>";
}
?>

<p>6</p>
