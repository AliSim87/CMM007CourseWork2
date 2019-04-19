<?php include("dbconnect.php");

$image_id = $_GET["image_id"];

$sql="SELECT * FROM images INNER JOIN users WHERE image_id = '$image_id' AND images.user_id=users.user_id";

if($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $email = $row["emailaddress"];
        $firstname = $row["firstname"];
        $imagetitle = $row["imagetitle"];

        $subject = 'Your image has been Approved';
        $message = 'Hi ' . $firstname . '. We are happy to say your image ' .$imagetitle. ' has been approved from our competition.';
        mail($email, $subject, $message);

        $deletefile = 'userimages/'.$row["file_name"];
        unlink($deletefile) or die("Couldn't delete file");
    }
}

$sql="UPDATE images SET approved=1 WHERE image_id = '$image_id'";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location: reviewphotos.php");

?>