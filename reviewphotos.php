<?php
include 'header.php';
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

                $query = $db->query("SELECT * FROM images INNER JOIN users WHERE approved=0 AND images.user_id=users.user_id");

                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){

                        $imageURL = 'userimages/'.$row["file_name"];
                        $imagetitle = $row["title"];
                        $comments = $row["supporting_info"];
                        $userid = $row["user_id"];
                        $username = $row['username'];
                        $image_id = $row['image_id'];

                        ?>

                        <img src="<?php echo $imageURL; ?>" alt="<?php echo $imagetitle; ?>" class="img-thumbnail"/>
                        <p><?php echo $imagetitle ?></p>
                        <p>Uploaded by: <?php echo $username ?></p>
                        <p><?php echo $comments ?></p>
                        <span>
                            <form method="post">
                                <input action="approveimage.php?image_id=<?php $image_id ?>" type="hidden" name="approve">
                                <button type="submit">Approve</button>
                            </form>
                        </span>
                    <?php }
                }else{ ?>
                    <p>No image(s) found...</p>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>