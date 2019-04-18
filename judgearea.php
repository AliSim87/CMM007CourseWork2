<?php $pageTitle = "Admin Area"; include 'header.php';
session_start();
if(!isset($_SESSION['user_level'])) {
    header("Location:login.php");
}
elseif($_SESSION['user_level'] != 'judge') {
    header("Location:unauthorised.php");
}
?>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div>
                    <h2>Welcome Back <?php print $_SESSION['firstname'] ?></h2>
                    <p>What would you like to do?</p>
                    <ul>
                        <li><a href="signup.php">Judge Photos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

<?php include 'footer.php' ?>