<?php
$pageTitle = "Gallery";
include 'header.php'
?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <img src="assets/images/citylandscape.jpg" alt="City Landscape" class="img-thumbnail">
                <h4><a href="displaycategory.php?category=landscape">City Landscape</a></h4>
            </div>
            <div class="col-4">
                <img src="assets/images/conceptual.JPG" alt="Conceptual and Expressive" class="img-thumbnail">
                <h4><a href="displaycategory.php?category=conceptual">Conceptual and Expressive</a></h4>
            </div>
            <div class="col-4">
                <img src="assets/images/nature.jpg" alt="Nature in Bloom" class="img-thumbnail">
                <h4><a href="displaycategory.php?category=nature">Nature in Bloom</a></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="assets/images/street.jpg" alt="Street Photography" class="img-thumbnail">
                <h4><a href="displaycategory.php?category=street">Street Photography</a></h4>
            </div>
            <div class="col-4">
                <img src="assets/images/portrait.jpg" alt="Portrait on Location" class="img-thumbnail">
                <h4><a href="displaycategory.php?category=portrait">Portrait on Location</a></h4>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php'
?>
