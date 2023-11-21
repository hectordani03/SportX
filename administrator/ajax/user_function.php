<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require '../../config/db.php';

function randomPassword($len = 8)
{

    //enforce min length 8
    if ($len < 8)
        $len = 8;

    //define character libraries - remove ambiguous characters like iIl|1 0oO
    $sets = array();
    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    $sets[] = '23456789';
    $sets[]  = '~!@#$%^&*(){}[],./?';

    $password = '';

    //append a character from each set - gets first 4 characters
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
    }

    //use all characters to fill up to $len
    while (strlen($password) < $len) {
        //get a random set
        $randomSet = $sets[array_rand($sets)];

        //add a random char from the random set
        $password .= $randomSet[array_rand(str_split($randomSet))];
    }

    //shuffle the password string before returning!
    return str_shuffle($password);
}

// Verificar si se ha enviado un identificador
if (isset($_POST['mod_id_user'])) {
    // Se ha enviado un identificador, por lo tanto es una actualización
    $id = $_POST['mod_id_user'];
    $email = $_POST['mod_email'];
    $pnumber = $_POST['mod_pnumber'];
    $password = randomPassword($password);
    $Year = date("Y");
    $employee_key = $Year . rand(1000, 9999);
    $encriptar = password_hash($password, PASSWORD_DEFAULT);
    $user = $conne->prepare("SELECT * FROM users WHERE id = ?");
    $user->execute([$id]);
    $row = $user->fetch(PDO::FETCH_ASSOC);
    if ($email != $row['email']) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'equiposportx@gmail.com';
        $mail->Password = 'nifpmoijwqwdplhe';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';
        $mail->setFrom('equiposportx@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'SportX job offer email recovery ';
        $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>Su número de cuenta es: ' . $employee_key . '</p>
<p>Su contraseña es: ' . $password . '</p>
<p> LOG IN:</p>

<p> <a href="http://localhost/SportX/administrator/login.php' . '">
Verificar cuenta </a> 
</p>  
</body>
</html>
';
        $mail->Body = ($mensaje);
        $mail->send();

        $sql = $conne->prepare("UPDATE users SET employee_key = ?, password = ?, email = ?, phone_number = ? WHERE id = ?");
        $sql->execute([$employee_key, $encriptar, $email, $pnumber, $id]);
    } else {
        $sql = $conne->prepare("UPDATE users SET phone_number = ? WHERE id = ?");
        $sql->execute([$pnumber, $id]);
    }
} elseif (isset($_POST['add_name'])) {
    $name = $_POST['add_name'];
    $lastname = $_POST['add_lastname'];
    $date = $_POST['add_bday'];
    $d = explode('/', $date);
    $birthday = $d[2] . $d[0] . $d[1];
    $email = $_POST['add_email'];
    $pnumber = $_POST['add_pnumber'];
    $password = randomPassword($password);
    $Year = date("Y");
    $employee_key = $Year . rand(1000, 9999);
    $encriptar = password_hash($password, PASSWORD_DEFAULT);
    $duplicate_email = $conne->prepare("SELECT * FROM users WHERE email = ?");
    $duplicate_email->execute([$email]);
    $duplicate_number = $conne->prepare("SELECT * FROM users WHERE phone_number = ?");
    $duplicate_number->execute([$pnumber]);
    $duplicate_key = $conne->prepare("SELECT * FROM users WHERE employee_key = ?");
    $duplicate_key->execute([$employee_key]);
    if ($duplicate_email->rowCount() > 0) {
        echo 'Email already exists';
    } elseif ($duplicate_number->rowCount() > 0) {
        echo 'Phone number already registered';
    } elseif ($duplicate_key->rowCount() > 0) {
        echo 'Employee key already exists';
    } else {

        $add_users = $conne->prepare("INSERT INTO users (id, employee_key, name, lastname, birthday, password, email, phone_number) VALUES(?,?,?,?,?,?,?,?)");
        $add_users->execute(['', $employee_key, $name, $lastname, $birthday, $encriptar, $email, $pnumber]);
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'equiposportx@gmail.com';
        $mail->Password = 'nifpmoijwqwdplhe';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';
        $mail->setFrom('equiposportx@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'SportX job offer Accepted';
        $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>Estimado ' .$name. ',</p>
<p>Es un placer darle la bienvenida a SportX. Estamos emocionados de tenerte como parte de nuestra comunidad.</p>
<p>A continuación, encontrará los detalles de su cuenta:</p>
<ul>
    <li>Su número de cuenta es: ' . $employee_key . '</li>
    <li>Su contraseña es: ' . $password . '</li>
    <li>Enlace de inicio de sesión: http://localhost/SportX/administrator/login.php</li>
</ul>
<p>Instrucciones para comenzar:</p>
<ol>
    <li>Utilice el enlace de inicio de sesión proporcionado para acceder a su cuenta.</li>
    <li>Ingrese su número de cuenta y la contraseña temporal cuando se le solicite.</li>
    <li>Una vez que haya iniciado sesión, se le pedirá que cambie su contraseña por motivos de seguridad. Siga las instrucciones para establecer una contraseña segura y memorable.</li>
</ol>
<p>Importante</p>
<ul>
    <li>Guarde su número de cuenta en un lugar seguro y no comparta su contraseña con nadie.</li>
    <li>Si tiene alguna pregunta o encuentra algún problema durante el proceso de inicio de sesión, no dude en ponerse en contacto con nuestro equipo de soporte técnico en equiposportx@gmail.com o llamando al 314 100 8320.</li>
</ul>
<p>Gracias por confiar en SportX. ¡Esperamos que disfrute utilizando nuestro Sistema!</p>
<p>Atentamente,</p>
<p>Equipo SportX</p>
<p>Desde: Area administrativa</p>
<p>SportX&copy; 2023</p>
<p>equiposportx@gmail.com</p>
<p>314 100 8320</p>
<p>http://localhost/SportX/administrator/login.php</p>
</body>
</html>
';
        $mail->Body = ($mensaje);
        $mail->send();
        echo '<script language="javascript">
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "success",
                title: "Código de Verificacion enviado a su correo",
                text: "",
                confirmButtonColor: "#28a745",
                confirmButtonText: "OK",
            }).then(function() {
                window.location.href = "user.php";
            });
        });
      </script>';
    }
} elseif (isset($_POST['del_id_user'])) {
    $id = $_POST['del_id_user'];
    try {
        $del_users = $conne->prepare("DELETE FROM users WHERE id = ?");
        $del_users->execute([$id]);
        $conne = null;
    } catch (Exception $e) {
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>