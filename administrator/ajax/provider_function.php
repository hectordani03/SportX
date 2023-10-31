<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require '../../config/db.php';

// Verificar si se ha enviado un identificador
if (isset($_POST['mod_id_provider'])) {
    // Se ha enviado un identificador, por lo tanto es una actualización
    $id = $_POST['mod_id_provider'];
    $email = $_POST['mod_email'];
    $domicile = $_POST['mod_domicile'];
    $pnumber = $_POST['mod_pnumber'];
    $provider = $conne->prepare("SELECT * FROM provider WHERE provider_key = ?");
    $provider->execute([$id]);
    $row = $provider->fetch(PDO::FETCH_ASSOC);
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
        $mail->Subject = 'SportX Registered You!';
        $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>You have been registered as a SportX Provider</p>
</p>  
</body>
</html>
';
        $mail->Body = ($mensaje);
        $mail->send();

        $sql = $conne->prepare("UPDATE provider SET email = ?, domicile = ?, phone_number = ? WHERE provider_key = ?");
        $sql->execute([$email, $domicile, $pnumber, $id]);
    } else {
        $sql = $conne->prepare("UPDATE provider SET domicile = ?, phone_number = ? WHERE provider_key = ?");
        $sql->execute([$domicile, $pnumber, $id]);
    }
} elseif (isset($_POST['add_name'])) {
    $name = $_POST['add_name'];
    $lastname = $_POST['add_lastname'];
    $date = $_POST['add_bday'];
    $d = explode('/', $date);
    $birthday = $d[2] . $d[0] . $d[1];
    $email = $_POST['add_email'];
    $domicile = $_POST['add_domicile'];
    $pnumber = $_POST['add_pnumber'];
    $duplicate_email = $conne->prepare("SELECT * FROM provider WHERE email = ?");
    $duplicate_email->execute([$email]);
    $duplicate_number = $conne->prepare("SELECT * FROM provider WHERE phone_number = ?");
    $duplicate_number->execute([$pnumber]);
    if ($duplicate_email->rowCount() > 0) {
        echo 'Email already exists';
    } elseif ($duplicate_number->rowCount() > 0) {
        echo 'Phone number already registered';
    } else 
    {
        $add_providers = $conne->prepare("INSERT INTO provider (provider_key, name, lastname, bday, email, domicile, phone_number) VALUES(?,?,?,?,?,?,?)");
        $add_providers->execute(['', $name, $lastname, $birthday, $email, $domicile, $pnumber]);
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
        $mail->Subject = 'SportX Registered You!';
        $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>You have been registered as a SportX Provider</p>
</p>  
</body>
</html>
';
        $mail->Body = ($mensaje);
        $mail->send();
    }
} elseif (isset($_POST['del_id_provider'])) {
    $id = $_POST['del_id_provider'];
    try {
        $del_providers = $conne->prepare("DELETE FROM provider WHERE provider_key = ?");
        $del_providers->execute([$id]);
        $conne = null;
    } catch (Exception $e) {
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>