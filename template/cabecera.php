<?php
require 'config/db.php';
if (!empty($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    $current_user = $conne->prepare("SELECT * FROM users WHERE id = ?");
    $current_user->execute([$user_id]);
    $row = $current_user->fetch(PDO::FETCH_ASSOC);
}else{
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GreenPaws</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@1,500&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="assets/logo.webp" alt="" /></a>
            <div class="nav-links" id="navlinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">EXAMPLE</a></li>
                    <li><a href="">EXAMPLE</a></li>
                    <?php { ?>

                    <li><a href="administrator/index.php">ADMIN</a></li>
                    
                    <?php } ?>
                    <li><a href="logout.php">LOG OUT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>My favorite animals</h1>
            <p>This is just an example of my favorite animals</p>
            <a class="index-btn" href="">More info</a>
        </div>
    </section>
    <!-- ----------------------Javascript for toggle menu---------------------- -->
    <script>
        var navlinks = document.getElementById("navlinks");

        function showMenu() {
            navlinks.style.right = "0";
        }

        function hideMenu() {
            navlinks.style.right = "-200px";
        }
    </script>