<?php $sql="SELECT user_level FROM users WHERE username='$username' and password='$password'";
$result=mysqli_query($sql);
$row=mysqli_fetch_object($result);
$userlevel = $row->userlevel;
echo $userlevel;
?>