<?php include 'header.php' ?>
<?php
    if(isset($_COOKIE['accesslevel']) != 'submission' || !isset($_COOKIE)){
        header("Location:Login.php");
        }
?>
<main>
    <div class="container mt-5">
        <div class="row">
            <div>
                <h2>Welcome Back <?php echo $_COOKIE['loggedin'] ?></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed tempor lorem. Pellentesque sagittis ex nec velit eleifend elementum. Etiam venenatis porttitor erat in ornare. Duis nisl leo, pretium ac hendrerit pulvinar, elementum eget risus. Praesent at laoreet tellus. Nullam pharetra commodo elit ac blandit. Vivamus ac fringilla nunc.</p>
                <p>Morbi molestie enim mattis venenatis lobortis. Cras elementum faucibus neque, non ultrices mauris molestie sit amet. Integer nec facilisis ex, nec faucibus arcu. Sed id elit sed mauris congue pretium blandit et justo. Aenean faucibus, purus id condimentum volutpat, ligula magna sagittis purus, auctor fermentum nunc quam nec orci. Maecenas accumsan felis dapibus leo efficitur, ac semper lacus dapibus. Cras non mattis est. Pellentesque rhoncus sapien tellus, in dictum justo viverra non. Aenean nisi tellus, sodales eget mauris eu, rhoncus interdum nibh. Maecenas ut feugiat purus. Cras eget purus nisl.</p>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>