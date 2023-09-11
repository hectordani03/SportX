<?php
require_once '../config/db.php';
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