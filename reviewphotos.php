<?php include 'header.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_level'])) {
    header("Location:login.php");
}
elseif($_SESSION['user_level'] != 'admin') {
    header("Location:unauthorised.php");
}
?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div>
                <?php
                include 'dbconnect.php';

                $query = $db->query("SELECT * FROM images WHERE approved=0");

                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = 'userimages/'.$row["file_name"];
                        $imagetitle = $row["title"];
                        $comments = $row["supporting_info"];
                        $userid = $row["user_id"];
                        // $sql = $db->query("SELECT * FROM users WHERE user_id = '$userid'");
                        // $result=$db->query($sql);
                        // while($row = $result->fetch_array()){
                            //$username = $row['username'];
                            //?>
                            <img src="<?php echo $imageURL; ?>" alt="<?php echo $imagetitle; ?>" class="img-thumbnail"/>
                            <p><?php echo $imagetitle ?></p>
                            <p>Uploaded by: <?php echo $userid ?></p>
                            <p><?php echo $comments ?></p>
                    <?php }
                }else{ ?>
                    <p>No image(s) found...</p>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>