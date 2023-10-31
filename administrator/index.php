<?php
include 'template/cabecera.php';
?>

<style>
    body {
        background-image: url("../assets/fondo-inicio-2.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        /* background-color: #777a7a; */
    }
    footer{
        margin-top: 40px;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/logo">
    <title>SportX</title>
</head>

<body>
    <main id="main">
        <nav class="menu-secciones">
            <?php if ($row["id"] == 1) { ?>
                <div class="dropdown">
                    <button>Users</button>
                <div class="dropdown-content">
                    <a rel="noopener"  href="user.php">Add Product</a>
                </div>
            </div>
        <?php } ?>
        <div class="dropdown">
            <button>Categories</button>
            <div class="dropdown-content">
                <a rel="noopener" href="./product.php">List of Products</a>
                
            </div>
        </div>
        <div class="dropdown">
            <button>Providers</button>
            <div class="dropdown-content">
                <a rel="noopener" href="./provider.php">Add Provider</a>
            </div>
        </div>
    </nav>
    <?php
    include "template/pie.php"
    ?>
</main>
</body>
<script>
    
    const header = document.getElementById('header');
        const mainContent = document.getElementById('main');
        // const mediaQuery1 = window.matchMedia("(min-width: 1698px)");

        // Crear una variable con el tamaño de pantalla
        const screenWidth = window.innerWidth;


        header.addEventListener('mouseover', () => {
            mainContent.style.width = '83%';
            mainContent.style.marginLeft = '16%';
        });



        header.addEventListener('mouseout', () => {
            mainContent.style.width = '';
            mainContent.style.marginLeft = '';
        });
</script>

</html>
