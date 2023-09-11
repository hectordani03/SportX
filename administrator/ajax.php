<?php
include '../config/db.php';

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

// Verificar si se ha enviado un identificador
if (isset($_POST['mod_id_user'])) {
    // Se ha enviado un identificador, por lo tanto es una actualización
    $id = $_POST['mod_id_user'];
    $name = $_POST['mod_name'];
    $email = $_POST['mod_email'];
    $pnumber = $_POST['mod_pnumber'];
    $role = $_POST['mod_role'];

    // Validación y sanitización de los datos POST

    // ...

    // Actualización de los campos en la base de datos
    try {
        $sql = $conne->prepare("UPDATE users SET name = ?, email = ?, phone_number = ?, role = ? WHERE id = ?");
        $sql->execute([$name, $email, $pnumber, $role, $id]);

        // Cierre de la conexión
        $conne = null;
    } catch (Exception $e) {
        // Manejo de errores
        // ...
    }
} elseif (isset($_POST['add_name'])) {
    $name = $_POST['add_name'];
    $password = $_POST['pass'];
    $email = $_POST['add_email'];
    $pnumber = $_POST['add_pnumber'];
    $role = $_POST['add_role'];
    $duplicate_email = $conne->prepare("SELECT * FROM users WHERE email = ?");
    $duplicate_email->execute([$email]);
    $duplicate_number = $conne->prepare("SELECT * FROM users WHERE phone_number = ?");
    $duplicate_number->execute([$pnumber]);
    if (empty($_POST["add_name"]) or empty($_POST["add_email"]) or empty($_POST["add_pnumber"]) or empty($_POST["pass"]) or empty($_POST["add_role"])) {
        echo 'Fill out the sections first';
    } elseif ($_POST) {
        $bug_pass = "";
        if (validate_pass($_POST["pass"], $bug_pass)) {
            if ($duplicate_email->rowCount() > 0) {
                echo 'Email already exists';
            } elseif ($duplicate_number->rowCount() > 0) {
                echo 'Phone number already registered';
            } else {
                $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
                $add_users = $conne->prepare("INSERT INTO users (id, name, email, phone_number, password, role) VALUES(?,?,?,?,?,?)");
                $add_users->execute(['', $name, $email, $pnumber, $encrypt_password, 'user']);
            }
        } else {
            echo "PASSWORD NO VÁLIDO: " . $bug_pass;
        }
    }
}elseif (isset($_POST['del_id_user'])) {
    $id = $_POST['del_id_user'];
        try {
            $add_users = $conne->prepare("DELETE FROM users WHERE id = ?");
            $add_users->execute([$id]);
            $conne = null;
        } catch (Exception $e) {
        }
    }