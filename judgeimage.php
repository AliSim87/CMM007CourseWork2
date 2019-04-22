<?php
include 'dbconnect.php';
session_start();
if (!isset($_SESSION['user_level'])) {
    header("Location:login.php");
} elseif ($_SESSION['user_level'] != 'judge') {
    header("Location:unauthorised.php");
}

$image_id = $_GET['image_id'];

$sql = $db->query("SELECT * FROM images INNER JOIN users WHERE image_id = '$image_id' AND images.user_id=users.user_id");

if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        $imageURL = 'userimages/' . $row['file_name'];
        $category = $row['category'];
        $imageTitle = $row['title'];
        $firstName = $row['firstname'];
        $surname = $row['lastname'];
        $comment = $row['supporting_info'];
    }
}

$pageTitle = $imageTitle;

include 'header.php';

?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <img src="<?php echo $imageURL ?>" alt="<?php echo $imageTitle ?>" style="max-width: 550px;"/>
            </div>
            <div class="col-6">
                <p>Title: <?php echo $imageTitle ?></p>
                <p>Name: <?php echo $firstName ." ". $surname ?></p>
                <p>Supporting Statement: <?php echo $comment ?></p>
                <form action="addjudgement.php" method="post">
                    <input type="hidden" name="image_id" value="<?php echo $image_id ?>">
                    <input type="hidden" name="category" value="<?php echo $category ?>">
                    <div class="form-group">
                        <div><input type="range" size="2" name="effectiveness" min="1" max="5" value="3">  Effectiveness (1-5)</div>
                        <div><input type="range" size="2" name="quality" min="1" max="5" value="3"> Quality (1-5)</div>
                        <div><input type="range" size="2" name="lighting" min="1" max="5" value="3"> Lighting (1-5)</div>
                        <div><input type="range" size="2" name="framing" min="1" max="5" value="3"> Framing (1-5)</div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
