<?php

session_start();

$category = $_GET["category"];

$pageTitle = $category;

include 'header.php'; ?>


<main>
    <div class="container mt-5">
        <div class="row">
            <div>
                <?php
                include 'dbconnect.php';

                $query = $db->query("SELECT * FROM images INNER JOIN users WHERE category='$category' AND images.user_id=users.user_id");

                if($query->num_rows > 0){
                while($row = $query->fetch_assoc()) {

                    $imageURL = 'userimages/' . $row['file_name'];
                    $imageTitle = $row['title'];
                    $username = $row['username'];
                    $image_id = $row['image_id'];

                    ?>

                    <img src="<?php echo $imageURL; ?>" alt="<?php echo $imageTitle; ?>" class="img-thumbnail"/>
                    <?php echo $imageTitle ?>
                    <p>Uploaded by: <?php echo $username ?></p>
                    <?php if ($_SESSION['user_level'] == 'judge') { ?>
                        <div>
                            <form method="post" action="judgeimage.php?image_id=<?php echo $image_id ?>">
                                <button type="submit" class="btn btn-primary btn-block">Judge this photo?</button>
                            </form>
                        </div>
                    <?php }
                }}else{ ?>
                <p>No image(s) found...</p>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>