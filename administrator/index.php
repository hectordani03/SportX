<?php
include 'template/cabecera.php';
?>

<style>
    body{
        background-image: url("../assets/fondo-inicio-2.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        /* background-color: #777a7a; */
    }

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/logo sportX-2.png">
    <title>SportX</title>
</head>

<body>
<nav class="menu-secciones">
    <div class="dropdown">
        <button>Users</button>
        <div class="dropdown-content"> 
            <a rel="noopener" target="_blank" href="users.php">Nuevo</a>
            <a rel="noopener" target="_blank" href="users.php">Lista</a>
            <a rel="noopener" target="_blank" href="users.php">Buscar</a>
        </div>
    </div>
    <div class="dropdown">
        <button>Categorias</button>
        <div class="dropdown-content"> 
            <a rel="noopener" target="_blank" href="https://blog.hubspot.com/">Nuevo</a>
            <a rel="noopener" target="_blank" href="https://academy.hubspot.com/">Lista</a>
            <a rel="noopener" target="_blank" href="https://www.youtube.com/user/hubspot">Buscar</a>
        </div>
    </div>
    <div class="dropdown">
        <button>Productos</button>
        <div class="dropdown-content"> 
            <a rel="noopener" target="_blank" href="https://blog.hubspot.com/">Nuevo</a>
            <a rel="noopener" target="_blank" href="https://academy.hubspot.com/">Lista</a>
            <a rel="noopener" target="_blank" href="https://www.youtube.com/user/hubspot">Por Categoria</a>
            <a rel="noopener" target="_blank" href="https://www.youtube.com/user/hubspot">Buscar</a>
        </div>
    </div>
</nav>

<!-- <img class="zapato-1" src="../assets/zapato-1.png" alt="">
<img class="zapato-2" src="../assets/zapatos-2.png" alt="">
<img class="raqueta" src="../assets/raqueta.png" alt="">
<img class="basket" src="../assets/basket.png" alt=""> -->

</body>

</html>
<?php
include "template/pie.php"
?>