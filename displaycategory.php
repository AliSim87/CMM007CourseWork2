<?php

session_start();

$category = $_GET["category"];

$pageTitle = $category;

include 'header.php'; ?>


    <main>
        <div class="container mt-5">
            <div class="row">
                <?php
                include 'dbconnect.php';

                $sql = $db->query("SELECT * FROM images INNER JOIN users WHERE category='$category' AND images.user_id=users.user_id");

                if ($sql->num_rows > 0) {
                    while ($row = $sql->fetch_assoc()) {

                        $imageURL = 'userimages/' . $row['file_name'];
                        $imageTitle = $row['title'];
                        $firstName = $row['firstname'];
                        $surname = $row['lastname'];
                        $image_id = $row['image_id'];
                        $approved = $row['approved'];

                        if ($approved == 1) {

                            ?>
                            <div class="gallery-image">
                            <img src="<?php echo $imageURL; ?>" alt="<?php echo $imageTitle; ?>"
                                 class="img-thumbnail"/>
                            <p><?php echo $imageTitle ?></p>
                            <p>Uploaded by: <?php echo $firstName . " " . $surname ?></p>
                            <?php if ($_SESSION['user_level'] == 'judge') { ?>
                                <div>
                                    <form method="post" action="judgeimage.php?image_id=<?php echo $image_id ?>">
                                        <button type="submit" class="btn btn-primary btn-block">Judge this photo?
                                        </button>
                                    </form>
                                </div>
                            <?php } ?>
                            </div>
                        <?php }
                    }
                } else { ?>
                    <p>No image(s) found...</p>
                <?php } ?>

            </div>
        </div>
    </main>

<?php include 'footer.php'; ?>