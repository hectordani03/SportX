<?php
require '../config/db.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT');

if (!empty($_SESSION["id"])) {
    
    $user_id = $_SESSION["id"];
    $current_user = $conne->prepare("SELECT * FROM users WHERE id = ?");
    $current_user->execute([$user_id]);
    $row = $current_user->fetch(PDO::FETCH_ASSOC);
    if ($row["role"] == 'user') {
        header("Location:");
    }
}else{
    header("Location:../login.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <section class="header">
        <img src="../assets/logo sportX-2.png" alt="">
        <h1>WELCOME <?php echo $row["username"];?></h1>
        <nav>
            <div class="nav-links" id="navlinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li class="text-primary"><a href="inicio.php">HOME</a></li>
                    <li><a href="../index.php">SPORTX</a></li>
                    <li><a href="../logout.php">LOG OUT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>
