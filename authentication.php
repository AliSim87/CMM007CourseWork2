<?php include("dbconnect.php");

    if(empty($_POST["emailaddress"]) || empty($_POST["password"]))
    {
        echo "Both fields are required.";
    }else
    {
        $emailaddress=$_POST['emailaddress'];
        $password=$_POST['password'];

        $sql="SELECT uid FROM users WHERE emailaddress='$emailaddress' and password='$password'";
        $result=mysqli_query($db,$sql);
        if(mysqli_num_rows($result) == 1)
        {
            header("location: profile.php"); // Redirecting To another Page
        }else
        {
            echo "Incorrect username or password.";
        }
    }
?>

