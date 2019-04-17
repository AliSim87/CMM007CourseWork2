<?php include 'header.php' ?>
<?php
    session_start();
    if(!isset($_SESSION['user_level'])) {
        header("Location:login.php");
        }
    elseif($_SESSION['user_level'] != 'submission') {
        header("Location:unauthorised.php");
    }
?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div>
                <h2>Welcome Back <?php print $_SESSION['firstname'] ?></h2>
                <p><a href="imageupload.php"></a>Upload a photo</p>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>