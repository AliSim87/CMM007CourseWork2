<?php $pageTitle = "Admin Area"; include 'header.php';
session_start();
if(!isset($_SESSION['user_level'])) {
    header("Location:login.php");
}
elseif($_SESSION['user_level'] != 'judge') {
    header("Location:unauthorised.php");
}
?>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div>
                    <h2>Welcome Back <?php print $_SESSION['firstname'] ?></h2>
                    <p>Please choose a category to judge</p>
                    <div class="row">
                        <div>
                            <h2>Gallery</h2>
                            <div class="col-4">
                                <img src="assets/images/citylandscape.jpg" alt="City Landscape" class="img-thumbnail">
                                <h4>City Landscape</h4>
                            </div>
                            <div class="col-4">
                                <img src="assets/images/conceptual.JPG" alt="Conceptual and Expressive" class="img-thumbnail">
                                <h4>Conceptual and Expressive</h4>
                            </div>
                            <div class="col-4">
                                <img src="assets/images/nature.jpg" alt="Nature in Bloom" class="img-thumbnail">
                                <h4>Nature in Bloom</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <h2>Gallery</h2>
                            <div class="col-4">
                                <img src="assets/images/street.jpg" alt="Street Photography" class="img-thumbnail">
                                <h4>Street Photography</h4>
                            </div>
                            <div class="col-4">
                                <img src="assets/images/portrait.jpg" alt="Portrait on Location" class="img-thumbnail">
                                <h4>Portrait on Location</h4>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'footer.php' ?>