<?php include 'header.php' ?>

<main>
    <div class="login-form">
        <form action="authentication.php" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="firstname" placeholder="Email Address" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <a href="#">Forgot Password?</a>
            </div>
        </form>
        <p class="text-center"><a href="#">Create an Account</a></p>
    </div>
</main>

<?php
include("dbconnect.php");
$sql = "SELECT id, firstname, lastname FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
}
} else {
echo "0 results";
}
?>
<?php include 'footer.php' ?>
