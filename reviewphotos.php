<?php include 'header.php' ?>
<?php
session_start();
if(!isset($_SESSION['user_level'])) {
    header("Location:login.php");
}
elseif($_SESSION['user_level'] != 'admin') {
    header("Location:unauthorised.php");
}
?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div>
                <?php
                include 'dbconnect.php';

                $query = $db->query("SELECT * FROM images WHERE approved=0");

                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = 'uploads/'.$row["file_name"];
                        ?>
                        <img src="<?php echo $imageURL; ?>" alt="" />
                    <?php }
                }else{ ?>
                    <p>No image(s) found...</p>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php' ?>