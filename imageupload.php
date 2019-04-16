<?php include 'header.php' ?>

<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<div id='img_div'>";
    echo "<img src='userimages/".$row['image']."' >";
    echo "<p>".$row['image_text']."</p>";
    echo "</div>";
}
?>
<form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
        <input type="file" name="image">
    </div>
    <div>
      <textarea
          id="text"
          cols="40"
          rows="4"
          name="image_text"
          placeholder="Say something about this image..."></textarea>
    </div>
    <div>
        <button type="submit" name="upload">POST</button>
    </div>
</form>

<?php include 'footer.php' ?>
