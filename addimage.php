<?php include("dbconnect.php");
    if (isset($_POST['upload'])) {
        $image = $_FILES['image']['name'];
        $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
        $target = "userimages/".basename($image);
        $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
        mysqli_query($db, $sql);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    }
    $result = mysqli_query($db, "SELECT * FROM images");
?>