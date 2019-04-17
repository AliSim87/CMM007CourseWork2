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
            setcookie('loggedin',$username,time()+3600);
            $sql="SELECT * FROM users WHERE username='$username'";
            $result=$db->query($sql);
            while($row = $result->fetch_array()){
                $firstname = $row['firstname'];
                $userlevel = $row['user_level'];
                session_start();
                $_SESSION['user_level'] = $userlevel;
                $_SESSION['firstname'] = $firstname;

                if ($_SESSION['user_level'] == 'submission') {
                    header("location: userprofile.php"); // Redirecting To another Page
                }
                elseif ($_SESSION['user_level'] == 'admin') {
                    header("location: adminarea.php");
                }
                elseif ($_SESSION['user_level'] == 'judge') {

                }
                else {
                    header("location: unauthorised.php");
                }
            }
        }else {
            echo "Incorrect username or password.";
        }
    }
?>

