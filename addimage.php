<?php include("dbconnect.php");

$statusMsg = '';

$targetDir = "userimages/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$imagetitle = $_POST['imagetitle'];
$category = $_POST['category'];
$comment = $_POST['comment'];
$user_id = "";
$username = $_COOKIE['loggedin'];
$sql="SELECT * FROM users WHERE username='$username'";
$result=$db->query($sql);
while($row = $result->fetch_array()){
    $user_id = $row['user_id'];
}

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $insert = $db->query("INSERT into images (user_id, file_name, title, category, supporting_info) VALUES ('$user_id','".$fileName."','$imagetitle','$category','$comment')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

echo $statusMsg, $imagetitle, $category. $comment, $username, $user_id;

?>

