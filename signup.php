<?php include 'header.php' ?>

<div class="login-form">
    <form action="assets/scripts/newaccount.php" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
        <h2 class="text-center">Sign Up</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="emailaddress" placeholder="Email Address" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control name="password" placeholder="Password" required="required">
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
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </div>
    </form>
    <p class="text-center"><a href="#">Already have an account? Login here</a></p>
</div>

<?php include 'footer.php' ?>
