<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css"
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php echo "<title>$pageTitle</title>" ?>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="/assets/images/Bloomingbiglogo.png" width="100px" height="77.67px" alt="Big Blooming Aberdeen Logo"/></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="guidelines.php">Guideline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
            </ul>
            <?php
            if (isset($_COOKIE['loggedin'])){
                echo '<ul class="nav navbar-nav ml-auto"><li class="nav-item"><a class="nav-link" href="userprofile.php"><span class="fas fa-user"></span> &nbsp' . $_COOKIE["loggedin"] . '</a> </li>
                        <li class="nav-item"><a class="nav-link" href="logout.php"><span class="fas fa-sign-out-alt"></span> Sign Out</a></li></ul>';
            }
            else {
                echo '<ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="signup.php"><span class="fas fa-user-plus"></span> Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                </ul>';
            }
            ?>

        </div>
    </nav>
</header>

