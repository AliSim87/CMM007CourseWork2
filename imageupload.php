<?php include 'header.php' ?>

<main>
    <div class="login-form">
        <form action="addimage.php" method="post" enctype="multipart/form-data">
            <h2 class="text-center">Image Upload</h2>
            <div class="form-group">
                Select Image File to Upload:
                <input type="file" class="form-control" name="file">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" name="submit" value="Upload">
            </div>
        </form>
    </div>
</main>
<?php include 'footer.php' ?>
