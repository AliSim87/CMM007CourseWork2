<?php include 'header.php' ?>

<main>
    <div class="login-form">
        <form action="newaccount.php" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
            <h2 class="text-center">Sign Up</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="emailaddress" placeholder="Email Address" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="firstname" placeholder="Firstname" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lastname" placeholder="Surname" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="postaddress" placeholder="House Name/Number and Street Name" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="postcity" placeholder="City" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="postcode" placeholder="Postcode" required="required">
            </div>
            <?php if($_SESSION['user_level'] == 'admin') {
                ?>
            <div class="form-group">
                <p>Please select user level:</p>
                <div>
                    <input type="radio" name="user_level" value="user" checked>
                    <label for="user">User</label>
                </div>
                <div>
                    <input type="radio" name="user_level" value="judge">
                    <label for="judge">Judge</label>
                </div>
                <div>
                    <input type="radio" name="user_level" value="admin">
                    <label for="admin">Admin</label>
                </div>
            </div>
            <?php } ?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>
        </form>
        <p class="text-center"><a href="#">Already have an account? Login here</a></p>
    </div>
</main>

<?php include 'footer.php' ?>
