<?php
include("dbconnect.php");

$image_id = $_GET["image_id"];

$sql="SELECT * FROM images INNER JOIN users WHERE image_id = '$image_id' AND images.user_id=users.user_id";

if($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        //Send email to user
        $email = $row["emailaddress"];
        $firstName = $row["firstname"];
        $imageTitle = $row["imagetitle"];

        $subject = 'Your image has been Approved';
        $message = 'Hi ' . $firstName . '. We are happy to say your image ' .$imageTitle. ' has been approved for our competition.';
        mail($email, $subject, $message);
    }
}

//Approve image for display
$sql="UPDATE images SET approved=1 WHERE image_id = '$image_id'";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location: reviewphotos.php");

?>