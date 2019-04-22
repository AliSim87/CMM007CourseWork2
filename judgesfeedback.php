<?php
$pageTitle = 'Review Feedback';
include 'header.php';
session_start();
if (!isset($_SESSION['user_level'])) {
    header("Location:login.php");
} elseif ($_SESSION['user_level'] != 'admin') {
    header("Location:unauthorised.php");
}
?>
    <main>
        <div class="container mt-5">
            <div class="row">

                <?php include 'dbconnect.php';

                $user_id = $_GET['user_id'];

                $sql = $db->query("SELECT * FROM scores INNER JOIN images WHERE scores.user_id='$user_id' AND scores.image_id=images.image_id");

                if ($sql->num_rows > 0) {
                    while ($row = $sql->fetch_assoc()) {

                        $imageTitle = $row['title'];
                        $effectiveness = $row['effectiveness'];
                        $quality = $row['quality'];
                        $lighting = $row['lighting'];
                        $framing = $row['framing'];
                        ?>
                        <p><?php echo $imageTitle ?></p>
                        <p><?php echo $effectiveness ?></p>
                        <p><?php echo $quality ?></p>
                        <p><?php echo $lighting ?></p>
                        <p><?php echo $framing ?></p>
                    <?php }
                } else { ?>
                    <p>No image(s) found...</p>
                <?php } ?>
            </div>
        </div>
    </main>

<?php include 'footer.php' ?>