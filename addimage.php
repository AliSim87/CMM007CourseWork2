<?php

include("dbconnect.php");

$statusMsg = '';

$targetDir = "userimages/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$fileSize = floor(filesize($targetFilePath) / 1024 / 1024, 1);

$imageTitle = $_POST['imagetitle'];
$category = $_POST['category'];
$comment = $_POST['comment'];
$user_id = "";
$username = $_COOKIE['loggedin'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    $user_id = $row['user_id'];
}

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg','JPG', 'png','PNG', 'jpeg', 'JPEG', 'gif', 'GIF', 'pdf', 'PDF');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $sql = "INSERT into images (user_id, file_name, title, category, supporting_info) VALUES ('$user_id','$fileName','$imageTitle','$category','$comment')";
            if (mysqli_query($db, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($db);
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

include 'header.php';

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

<? include 'footer.php'; ?>

