<?php
$pageTitle = 'Reset Password';
include 'header.php';
include("dbconnect.php");
$error = '';

if(empty($_POST["username"]))
{
    $error = "Please enter a username to continue";
}else
{
    $username=$_POST['username'];
    $sql="SELECT user_id FROM users WHERE username='$username'";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result) == 1)
    {
        $user_id = $row['user_id'];
    }
    else {
        $error = 'Username not Found';
    }

}

if($error == '') {
    ?>
<main>
    <div class="login-form">
        <form action="confirmresetpassword.php" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
            <h2 class="text-center">Reset Password</h2>
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </div>
        </form>
    </div>
</main>
<?php } else {
    ?>
<main>
    <div class="login-form">
        <?php echo $error ?>
    </div>
</main>
<?php }
include 'footer.php'
?>

