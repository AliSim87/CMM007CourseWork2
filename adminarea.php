<?php include 'header.php' ?>
<?php
if(!isset($_COOKIE['accesslevel'])) {
    header("Location:login.php");
}
elseif($_COOKIE['accesslevel'] != 'admin') {
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