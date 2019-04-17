<?php include 'header.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_level'])) {
    header("Location:login.php");
}
elseif($_SESSION['user_level'] != 'admin') {
    header("Location:unauthorised.php");
}
?>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div>
                    <h2>Welcome Back <?php echo $_COOKIE['loggedin'] ?></h2>
                    <p>What would you like to do?</p>
                    <ul>
                        <li><a href="#">Add new judge</a></li>
                        <li><a href="#">Review photos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

<?php include 'footer.php' ?>