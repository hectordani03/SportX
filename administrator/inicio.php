<?php
include 'template/cabecera.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<nav class="menu-secciones">
    <ul class="menu-horizontal">
        <li>
            <a class="users" href="">Users</a>
            <ul class="menu-vertical vert-1">
                <li><a href="peliculas_recientes.php">Nuevo</a></li>
                <li><a href="peliculas_clasicas.php">Lista</a></li>
                <li><a href="peliculas_proximas.php">Buscar</a></li>
            </ul>
        </li>
        <li>
            <a class="categories" href="">Categories</a>
            <ul class="menu-vertical">
                <li><a href="series_recientes.php">Nueva</a></li>
                <li><a href="series_clasicas.php">Lista</a></li>
                <li><a href="series_proximas.php">Buscar</a></li>
            </ul>
        </li>
        <li>
            <a class="products" href="">Products</a>
            <ul class="menu-vertical">
                <li><a href="reseñas_peliculas.php">Nuevo</a></li>
                <li><a href="reseñas_series.php">Lista</a></li>
                <li><a href="reseñas_series.php">Por categoria</a></li>
                <li><a href="reseñas_series.php">Buscar</a></li>
            </ul>
        </li>
    </ul>
</nav>

</body>

</html>
<?php
include "template/pie.php"
?>