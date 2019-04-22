<?php include("dbconnect.php");
if (empty($_POST["username"]) || empty($_POST["password"])) {
    echo "Both fields are required.";
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT user_id FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) == 1) {
        setcookie('loggedin', $username, time() + 3600);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $db->query($sql);
        while ($row = $result->fetch_array()) {
            $firstname = $row['firstname'];
            $userlevel = $row['user_level'];
            $user_id = $row['user_id'];
            session_start();
            $_SESSION['user_level'] = $userlevel;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['user_id'] = $user_id;

            if ($_SESSION['user_level'] == 'submission') {
                header("location: userprofile.php");
            } elseif ($_SESSION['user_level'] == 'admin') {
                header("location: adminarea.php");
            } elseif ($_SESSION['user_level'] == 'judge') {
                header("location: judgearea.php");
            } else {
                header("location: unauthorised.php");
            }
        }
    } else {
        $pageTitle = "Incorrect";
        include 'header.php'; ?>
        <main>
            <div class="container mt-5">
                <div class="row">
                    <p>Incorrect username or password.</p>
                </div>
            </div>
        </main>
    <?php }
}
include 'footer.php'; ?>

