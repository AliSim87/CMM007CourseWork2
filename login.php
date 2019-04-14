<?php include 'header.php' ?>

<main>
    <div class="login-form">
        <form action="authentication.php" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="emailaddress" placeholder="Email Address" required="required">
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

<?php include 'footer.php' ?>
