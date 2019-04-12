<?php include 'header.php' ?>

<div class="login-form">
    <form action="authentication.php" method="post">
        <h2 class="text-center">Sign Up</h2>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </div>
    </form>
    <p class="text-center"><a href="#">Already have an account? Login here</a></p>
</div>

<?php include 'footer.php' ?>
