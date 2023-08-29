<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Register</title>
</head>

<body>

    <div class="container-register ver-2">
        <img class="imagen-registro" src="assets/sportX.png" alt="logo-sportX">

        <form action="" method="post">
            <label for="username">Name</label>
            <input class="entrada" type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input class="entrada" type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input class="entrada" type="password" id="pass" name="password" required>

            <label for="confirmpassword">Confirm Password</label>
            <input class="entrada" type="password" id="pass2" name="confirmpassword" required>

            <div style="margin-right: 145px" class="form-group pb-2 mostrar-pass">
                <input type="checkbox" id="muestrapassword" />&nbsp;&nbsp;Show Password 
            </div>

            <div class="click-submit">
                <a href="#">Forgot password?</a>
                <a href="login.php">Already registered?</a>
                <input class="input-register" type="submit" name="register" value="REGISTER">
            </div>
            
        </form>
        
    </div>

    <?php
    require 'config/db.php';

    function validar_clave($contrasenia, &$error_contrasenia)
    {
        if (strlen($contrasenia) < 6) {
            $error_contrasenia = "La clave debe tener al menos 6 caracteres";
            return false;
        }
        if (strlen($contrasenia) > 16) {
            $error_contrasenia = "La clave no puede tener más de 16 caracteres";
            return false;
        }
        if (!preg_match('`[a-z]`', $contrasenia)) {
            $error_contrasenia = "La clave debe tener al menos una letra minúscula";
            return false;
        }
        if (!preg_match('`[A-Z]`', $contrasenia)) {
            $error_contrasenia = "La clave debe tener al menos una letra mayúscula";
            return false;
        }
        if (!preg_match('`[0-9]`', $contrasenia)) {
            $error_contrasenia = "La clave debe tener al menos un caracter numérico";
            return false;
        }
        $error_contrasenia = "";
        return true;
    }

    if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate_user = $conne->prepare("SELECT * FROM users WHERE BINARY username = ?");
        $duplicate_user->execute([$username]);
        $duplicate_email = $conne->prepare("SELECT * FROM users WHERE email = ?");
        $duplicate_email->execute([$email]);
        if (empty($_POST["username"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["confirmpassword"])) {
            echo 'Fill out the sections first';
        } elseif ($_POST) {
            $error_encontrado = "";
            if (validar_clave($_POST["password"], $error_encontrado)) {
                if ($duplicate_user->rowCount() > 0) {
                    echo 'Username already exists';
                } elseif ($duplicate_email->rowCount() > 0) {
                    echo 'Email already exists';
                } elseif ($password != $confirmpassword) {
                    echo 'Password doesnt match';
                } else {
                    $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
                    $add_users = $conne->prepare("INSERT INTO users (id, username, email, password, role) VALUES(?,?,?,?,?)");
                    $add_users->execute(['', $username, $email, $encrypt_password, 'user']);
                    // $sql = $conne->prepare("UPDATE users SET username = ? SET password = ? SET email = ? WHERE id = ? ");
                    // $sql->execute([$total_reivews, $publicaciones["id"]]);
                    // if ($duplicate_variable->rowCount() > 0) {
        
                    if ($add_users) {
                        header("Location: login.php");
                    }
                }
            } else {
                echo "PASSWORD NO VÁLIDO: " . $error_encontrado;
            }
        } 
    }
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#muestrapassword').click(function() {
                var defType = 'password';
                if ($('#muestrapassword').is(':checked')) {
                    defType = 'text';
                }
                $('#pass2').attr('type', defType);
            });
        });
        $(document).ready(function() {
            $('#muestrapassword').click(function() {
                var defType = 'password';
                if ($('#muestrapassword').is(':checked')) {
                    defType = 'text';
                }
                $('#pass').attr('type', defType);
            });
        })
    </script>
</body>

</html>