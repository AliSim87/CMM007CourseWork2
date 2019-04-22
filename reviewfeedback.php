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
                while ($row = $sql->fetch_array()) {
                    $firstName = $row['firstname'];
                    $surname = $row['lastname'];
                    $user_id = $row['user_id'];
                    ?>
                    <p><a href="judgesfeedback.php?user_id=<?php echo $user_id?>">Photos judged by: <?php echo $firstName . " " . $surname ?></a></p>
                <?php }
            } else { ?>
                <p>No Judges have marked yet</p>
            <?php } ?>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>