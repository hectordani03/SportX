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
                <label for="username">Username:</label>
                <input class="entrada" type="text" id="username" name="username" required>
                
            <label for="password">Password:</label>
            <input class="entrada" type="password" id="pass" name="password" required>
            
            <div class="input-group-append">
                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="bi bi-eye icon"></span> </button>
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
        $username = $_POST["username"];
        $password = $_POST["password"];
        $check_user = $conne->prepare("SELECT * FROM users WHERE BINARY username = ?");
        $check_user->execute([$username]);
        if (empty($_POST["username"]) or empty($_POST["password"])) {
            echo 'Fill out the sections first';
        } elseif ($check_user->rowCount() > 0) {
            $row = $check_user->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row["password"])) {
                $_SESSION["id"] = $row["id"];
                if ($row["role"] != "user") {
                    header("Location: administrator/inicio.php");
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
    <script type="text/javascript">
        function mostrarPassword() {
            var cambio = document.getElementById("pass");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>
</body>

</html>