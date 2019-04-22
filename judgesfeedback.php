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

                $sql = $db->query("SELECT user_id FROM users WHERE user_level='judge'");

                if ($sql->num_rows > 0) {
                    while ($row = $sql->fetch_assoc()) {

                        $imageTitle = $row['title'];
                        $firstName = $row['firstname'];
                        $surname = $row['lastname'];
                        $user_id = $row['scores.user_id'];
                        $effectiveness = $row['effectiveness'];
                        $quality = $row['quality'];
                        $lighting = $row['lighting'];
                        $framing = $row['framing'];
                        ?>
                        <p><?php echo $imageTitle ?></p>
                        <p>Judged by: <?php echo $firstName . " " . $surname ?></p>
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