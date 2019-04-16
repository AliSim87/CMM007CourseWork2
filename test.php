<?php
include("dbconnect.php");
$sql="SELECT * FROM users WHERE username='$username' and password='$password'";
$result=$db->query($sql);
$row=$result->fetch_array();
while($row = $result->fetch_array()){
    $userlevel = $row['user_level'];
    echo "<p>{$userlevel}</p>";
}
?>

<p>4</p>
