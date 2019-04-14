<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'azure');
define('DB_PASSWORD', '6#vWHD_$');
define('DB_DATABASE', 'cmm007');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>