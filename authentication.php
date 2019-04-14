<?php include("dbconnect.php");

    if(empty($_POST["firstname"]) || empty($_POST["password"]))
    {
        echo "Both fields are required.";
    }else
    {
        $firstname=$_POST['firstname'];
        $password=$_POST['password'];

        $sql="SELECT id FROM users WHERE firstname='$firstname'";
        $result=mysqli_query($db,$sql);
        if(mysqli_num_rows($result) == 1)
        {
            header("location: profile.php"); // Redirecting To another Page
        }else {
            echo "Incorrect username or password.";
        }
    }
?>

