<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="./assets/logo sportX-2.png">

    <title>Register</title>
</head>

<body>

    <img src="assets/sportX.png" alt="logo-sportX">
    <div class="container-register">
        <form action="" method="post">
            <label for="name">Name:</label>
            <input autocomplete="off" class="entrada" type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input class="entrada" type="email" id="email" name="email" required>

            <label for="pnumber">Phone Number:</label>
            <input class="entrada" type="text" minlength="10" maxlength="10" id="pnumber" name="pnumber" required>

            <label for="password">Password:</label>
            <input autocomplete="off" class="entrada" type="password" id="pass" name="password" required>

            <label for="confirmpassword">Confirm Password:</label>
            <input autocomplete="off" class="entrada" type="password" id="pass2" name="confirmpassword" required>

            <div style="margin-right: 145px" class="form-group pb-2">
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

    function validate_pass($pass, &$bug_pass)
    {
        if (strlen($pass) < 6) {
            $bug_pass = "Password must have at least 6 characters";
            return false;
        }
        if (strlen($pass) > 16) {
            $bug_pass = "Password may not have more than 16 characters";
            return false;
        }
        if (!preg_match('`[a-z]`', $pass)) {
            $bug_pass = "Password must have at least 1 lowercase word";
            return false;
        }
        if (!preg_match('`[A-Z]`', $pass)) {
            $bug_pass = "Password must have at least 1 capital  word";
            return false;
        }
        if (!preg_match('`[0-9]`', $pass)) {
            $bug_pass = "Password must have at least 1 number character";
            return false;
        }
        $bug_pass = "";
        return true;
    }

    if (isset($_POST["register"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pnumber = $_POST["pnumber"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $duplicate_email = $conne->prepare("SELECT * FROM users WHERE email = ?");
        $duplicate_email->execute([$email]);
        $duplicate_number = $conne->prepare("SELECT * FROM users WHERE phone_number = ?");
        $duplicate_number->execute([$pnumber]);
        if (empty($_POST["name"]) or empty($_POST["email"]) or empty($_POST["pnumber"]) or empty($_POST["password"]) or empty($_POST["confirmpassword"])) {
            echo 'Fill out the sections first';
        } elseif ($_POST) {
            $bug_pass = "";
            if (validate_pass($_POST["password"], $bug_pass)) {
                if ($duplicate_email->rowCount() > 0) {
                    echo 'Email already exists';
                } elseif ($duplicate_number->rowCount() > 0) {
                    echo 'Phone number already registered';
                } elseif ($password != $confirmpassword) {
                    echo 'Password doesnt match';
                } else {
                    $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
                    $add_users = $conne->prepare("INSERT INTO users (id, name, email, phone_number, password, role) VALUES(?,?,?,?,?,?)");
                    $add_users->execute(['', $name, $email, $pnumber, $encrypt_password, 'user']);
                    // $sql = $conne->prepare("UPDATE users SET username = ? SET password = ? SET email = ? WHERE id = ? ");
                    // $sql->execute([$total_reivews, $publicaciones["id"]]);
                    // if ($duplicate_variable->rowCount() > 0) {
                    if ($add_users) {
                        header("Location: login.php");
                    }
                }
            } else {
                echo "PASSWORD NO VÁLIDO: " . $bug_pass;
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