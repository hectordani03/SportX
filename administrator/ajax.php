<?php
include '../config/db.php';

// Verificar si se ha enviado un identificador
if (isset($_POST['mod_id_user'])) {
    // Se ha enviado un identificador, por lo tanto es una actualización
    $id = $_POST['mod_id_user'];
    $username = $_POST['mod_username'];
    $email = $_POST['mod_email'];
    $role = $_POST['mod_role'];

    // Validación y sanitización de los datos POST

    // ...

    // Actualización de los campos en la base de datos
    try {
        $sql = $conne->prepare("UPDATE users SET username = ?, email = ?,  role = ? WHERE id = ?");
        $sql->execute([$username, $email, $role, $id]);

        // Cierre de la conexión
        $conne = null;
    } catch (Exception $e) {
        // Manejo de errores
        // ...
    }
} elseif (isset($_POST['add_username'])) {
    $username = $_POST['add_username'];
    $password = $_POST['add_password'];
    $email = $_POST['add_email'];
    $role = $_POST['add_role'];
    $duplicate_user = $conne->prepare("SELECT * FROM users WHERE BINARY username = ?");
    $duplicate_user->execute([$username]);
    $duplicate_email = $conne->prepare("SELECT * FROM users WHERE email = ?");
    $duplicate_email->execute([$email]);
    if (empty($_POST["add_username"]) or empty($_POST["add_password"]) or empty($_POST["add_email"]) or empty($_POST["add_role"])) {
        header("Location:index.php");
    } elseif ($duplicate_user->rowCount() > 0) {
        header("Location:index.php");
    } elseif ($duplicate_email->rowCount() > 0) {
        header("Location:index.php");
    } else {
        try {
            $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
            $add_users = $conne->prepare("INSERT INTO users (id, username, email, password, role) VALUES(?,?,?,?,?)");
            $add_users->execute(['', $username, $email, $encrypt_password, $role]);
            $conne = null;
        } catch (Exception $e) {
        }
    }
} elseif (isset($_POST['del_id_user'])) {
    $id = $_POST['del_id_user'];
        try {
            $add_users = $conne->prepare("DELETE FROM users WHERE id = ?");
            $add_users->execute([$id]);
            $conne = null;
        } catch (Exception $e) {
        }
    }