<?php
include 'dbconnect.php';
session_start();
if (!isset($_SESSION['user_level'])) {
    header("Location:login.php");
} elseif ($_SESSION['user_level'] != 'judge') {
    header("Location:unauthorised.php");
}

$image_id = $_GET["image_id"];

$sql = "SELECT * FROM images INNER JOIN users WHERE image_id = '$image_id' AND images.user_id=users.user_id";

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        $imageURL = 'userimages/' . $row["file_name"];
        $imageTitle = $row["title"];
        $username = $row['username'];
        $image_id = $row['image_id'];
        $category = $row['category'];
    }
}

$pageTitle = $imageTitle;

include 'header.php';

?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div>
                <img src="userimages/<?php echo $fileName ?>" alt="<?php echo $imageTitle ?>" class="img-thumbnail"/>
            </div>
            <div>
                <form action="judgephoto.php" method="post">
                    <input type="hidden" id="image_id" name="image_id" value="<?php echo $image_id ?>">
                    <input type="hidden" id="category" name="category" value="<?php echo $category ?>">
                    Effectiveness: <input type="range" size="2" name="effectiveness" min="1" max="5" value="3">
                    Quality: <input type="range" size="2" name="quality" min="1" max="5" value="3">
                    Lighting: <input type="range" size="2" name="lighting" min="1" max="5" value="3">
                    Framing: <input type="range" size="2" name="framing" min="1" max="5" value="3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
