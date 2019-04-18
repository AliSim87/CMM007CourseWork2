<?php $pageTitle = "Upload Image"; include 'header.php' ?>

<main>
    <div class="login-form">
        <form action="addimage.php" id="imageupload" method="post" enctype="multipart/form-data">
            <h2 class="text-center">Image Upload</h2>
            <div class="form-group">
                <p>Select Image File to Upload:</p>
                <input type="file" name="file">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" name="imagetitle">
            </div>
            <div class="form-group">
                <p>Please select a category:</p>
                <div>
                    <input type="radio" name="category" value="landscape" checked>
                    <label for="landscape">City Landscape</label>
                </div>
                <div>
                    <input type="radio" name="category" value="conceptual">
                    <label for="conceptual">Conceptual and Expressive</label>
                </div>
                <div>
                    <input type="radio" name="category" value="nature">
                    <label for="nature">Nature in Bloom</label>
                </div>
                <div>
                    <input type="radio" name="category" value="street">
                    <label for="street">Street Photography</label>
                </div>
                <div>
                    <input type="radio" name="category" value="portrait">
                    <label for="portrait">Portrait on Location</label>
                </div>
            </div>
            <div class="form-group">
                <textarea form="imageupload" rows="4" cols="50" name="comment">Enter supporting information here...</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" name="submit" value="Upload">
            </div>
        </form>
    </div>
</main>
<?php include 'footer.php' ?>
