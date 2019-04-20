<?php $pageTitle = "Judge Area";
include 'header.php';
session_start();
if (!isset($_SESSION['user_level'])) {
    header("Location:login.php");
} elseif ($_SESSION['user_level'] != 'judge') {
    header("Location:unauthorised.php");
}

$image_id = $_GET["image_id"];

$sql="SELECT * FROM images INNER JOIN users WHERE image_id = '$image_id' AND images.user_id=users.user_id";

$imageURL = 'userimages/' . $row["file_name"];
$imageTitle = $row["title"];
$username = $row['username'];
$image_id = $row['image_id'];

$pageTitle = $imageTitle;

?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div>
                <img src="userimages/<?php echo $fileName ?>" alt="<?php echo $imageTitle ?>" class="img-thumbnail"/>
                <p><?php echo $statusMsg; ?></p>
                <p><a href="imageupload.php">Upload new image?</a></p>
                <p><a href="index.php">Return to home page?</a></p>
            </div>
        </div>
    </div>
</main>
