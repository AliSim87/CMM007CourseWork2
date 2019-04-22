<?php include("dbconnect.php");

$image_id = $_GET["image_id"];

$sql="SELECT * FROM images INNER JOIN users WHERE image_id = '$image_id' AND images.user_id=users.user_id";

if($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
        $email = $row["emailaddress"];
        $firstname = $row["firstname"];
        $imagetitle = $row["imagetitle"];

        $subject = 'Sorry has been rejected';
        $message = 'Hi ' . $firstname . '. We are sorry but your image ' .$imagetitle. ' has been rejected from our competition.  If you feel this is unfair or would like more information about the rejection email: admin@bigbloomingaberdeen.org.uk';

        mail($email, $subject, $message);

        $deletefile = 'userimages/'.$row["file_name"];
        unlink($deletefile) or die("Couldn't delete file");
    }
}


$sql="DELETE FROM images WHERE image_id = '$image_id'";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}



header("location: reviewphotos.php");

?>