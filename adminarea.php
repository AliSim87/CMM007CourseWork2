<?php $pageTitle = "Admin Area";
include 'header.php';
session_start();
if (!isset($_SESSION['user_level'])) {
    header("Location:login.php");
} elseif ($_SESSION['user_level'] != 'admin') {
    header("Location:unauthorised.php");
}
?>
    <main>
        <div class="container mt-5">
            <div class="image-upload">
                <h2>Welcome Back <?php print $_SESSION['firstname'] ?></h2>
                <p>What would you like to do?</p>
                <button onclick="window.location.href = 'signup.php';" class="btn btn-primary btn-block">Add new user</button>
                <button onclick="window.location.href = 'reviewphotos.php';" class="btn btn-primary btn-block">Review photos</button>
                <button onclick="window.location.href = 'reviewfeedback.php';" class="btn btn-primary btn-block">View Judges Feedback</button>
            </div>
        </div>
    </main>

<?php include 'footer.php' ?>