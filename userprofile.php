<?php $pageTitle = "Welcome";
include 'header.php';
session_start();
if (!isset($_SESSION['user_level'])) {
    header("Location:login.php");
} elseif ($_SESSION['user_level'] != 'submission') {
    header("Location:unauthorised.php");
}
?>
    <main>
        <div class="container mt-5">
            <div class="image-upload">
                <h2>Welcome Back <?php print $_SESSION['firstname'] ?></h2>
                <button onclick="window.location.href = 'imageupload.php';" class="btn btn-primary btn-block">Upload a photo</button>
            </div>
        </div>
    </main>

<?php include 'footer.php' ?>