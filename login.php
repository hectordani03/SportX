<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@1,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/logo sportX-2.png">

    <title>LOG IN</title>
</head>

<body>
    <section class="banner">
        <video muted autoplay loop>
            <source src="assets/baloncesto-video.mp4" type="video/mp4">
        </video>
        <div class="container-register">
            <img class="logo" src="assets/logo sportX-2.png" alt="logo-sportX">
            <form method="post">
                <label for="name">Name:</label>
                <input class="entrada" type="text" id="name" name="name" required>

                <label for="password">Password:</label>
                <input class="entrada" type="password" id="pass" name="password" required>

                <div class="input-group-append">
                    <button id="show_password" class="btn btn-primary" type="button" onclick="showPassword()"> <span class="bi bi-eye-slash icon"></span> </button>
                </div>

                <div class="click-submit">
                    <a href="#">Forgot password?</a>
                    <a href="register.php">Unregistered?</a>
                    <input class="input-register" type="submit" name="login" value="LOG IN">
                </div>

            </form>
        </div>
    </section>

    <?php
    require 'config/db.php';
    if (isset($_POST["login"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $check_user = $conne->prepare("SELECT * FROM users WHERE BINARY name = ?");
        $check_user->execute([$name]);
        if (empty($_POST["name"]) or empty($_POST["password"])) {
            echo 'Fill out the sections first';
        } elseif ($check_user->rowCount() > 0) {
            $row = $check_user->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row["password"])) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["role"] = $row["role"];
                if ($row["role"] != "user") {
                    header("Location: administrator/index.php");
                } else {
                    header("Location: index.php");
                }
            } else {
                echo "Password doesnt match";
            }
        } else {
            echo 'User doesnt exists';
        }
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        //-----------------------------PASSWORD CHECK LOGIN---------------------
        function showPassword() {
            var change = document.getElementById("pass");
            if (change.type == "password") {
                change.type = "text";
                $(".icon").removeClass("bi bi-eye-slash").addClass("bi bi-eye");
            } else {
                change.type = "password";
                $(".icon").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
            }
        }
    </script>
</body>

</html>