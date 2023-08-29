<?php
require 'config/db.php';
unset(
    $_SESSION["id"],
);
header("Location:login.php");