<?php

include("dbconnect.php");

$statusMsg = '';

// Set up image directory

$targetDir = "userimages/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

//Import upload information from imageupload.php form

$imageTitle = $_POST['imagetitle'];
$category = $_POST['category'];
$comment = $_POST['comment'];
$user_id = "";
$username = $_COOKIE['loggedin'];

// Find user_id from database

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
    $user_id = $row['user_id'];
}

if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif', 'GIF', 'pdf', 'PDF');
    // Attempt at size verification
    // if ($_FILES["file"]["size"] > 10000000) {
        // Check file type
        if (in_array($fileType, $allowTypes)) {
            // File moved to directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                //Insert details into database
                $sql = "INSERT into images (user_id, file_name, title, category, supporting_info) VALUES ('$user_id','$fileName','$imageTitle','$category','$comment')";
                if (mysqli_query($db, $sql)) {
                    $statusMsg = "File uploaded successfully";
                } else {
                    $statusMsg = "Error: " . $sql . "<br>" . mysqli_error($db);
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    //} else {
        //$statusMsg = 'File to large.  Please ensure file is under 10mb';
    //}
} else {
    $statusMsg = 'Please select a file to upload.';
}

$pageTitle = 'Upload image';
include 'header.php';

?>

<main>
    <div class="container mt-5">
        <div class="image-upload">
            <div>
                <img src="userimages/<?php echo $fileName ?>" alt="<?php echo $imageTitle ?>" class="img-thumbnail"/>
                <p><?php echo $statusMsg; ?></p>
                <button onclick="window.location.href = 'imageupload.php';" class="btn btn-primary btn-block">Upload new
                    image?
                </button>
                <button onclick="window.location.href = 'index.php';" class="btn btn-primary btn-block">Return to home
                    page?
                </button>
            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>

