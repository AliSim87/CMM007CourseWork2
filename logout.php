<?php
session_start();
session_destroy();
setcookie('loggedin', '',time()+3600);
setcookie('accesslevel','',time()+3600);
header("location: index.php"); // Redirecting To another Page
?>