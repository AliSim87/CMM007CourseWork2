<?php include("dbconnect.php");
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
        echo "Both fields are required.";
    }else
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT user_id FROM users WHERE username='$username' and password='$password'";
        $result=mysqli_query($db,$sql);
        if(mysqli_num_rows($result) == 1)
        {
            header("location: userprofile.php"); // Redirecting To another Page
            $_SESSION['username'] = $username;
            $sql="SELECT * FROM users WHERE username='$username'";
            $result=$db->query($sql);
            while($row = $result->fetch_array()){
                $userlevel = $row['user_level'];
                setcookie('accesslevel',$userlevel,time()+3600);
            }
        }else {
            echo "Incorrect username or password.";
        }
    }
?>

