<?php
include 'template/cabecera.php';
?>

<style>
    footer{
        margin-top: 40px;
    }

    main{
        margin-top: 100px !important;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/logo">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>SportX</title>
</head>

<body>
    <main id="main">
    <a href="./user.php" class="user-btn btn-su">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </svg><span>Hector Daniel</span>
</a>
    <button class="dark-mode btn-success">
        <label class="switch-container">
            <input type="checkbox">
            <span class="slider"></span>
        </label>
    </button>

    
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="card shadow cards-content">
                <svg class="svg-color" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/></svg>
                    <h1>Users</h1>
                    <h3>52</h3>
                </div>
            </div> 
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="card shadow cards-content">
                <svg class="svg-color" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M0 32C0 14.3 14.3 0 32 0h72.9c27.5 0 52 17.6 60.7 43.8L257.7 320c30.1 .5 56.8 14.9 74 37l202.1-67.4c16.8-5.6 34.9 3.5 40.5 20.2s-3.5 34.9-20.2 40.5L352 417.7c-.9 52.2-43.5 94.3-96 94.3c-53 0-96-43-96-96c0-30.8 14.5-58.2 37-75.8L104.9 64H32C14.3 64 0 49.7 0 32zM244.8 134.5c-5.5-16.8 3.7-34.9 20.5-40.3L311 79.4l19.8 60.9 60.9-19.8L371.8 59.6l45.7-14.8c16.8-5.5 34.9 3.7 40.3 20.5l49.4 152.2c5.5 16.8-3.7 34.9-20.5 40.3L334.5 307.2c-16.8 5.5-34.9-3.7-40.3-20.5L244.8 134.5z"/></svg>
                <h1>Providers</h1>
                <h3>52</h3>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="card shadow cards-content">
                <svg class="svg-color" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/></svg>
                    <h1>Orders</h1>
                    <h3>52</h3>
                </div>
            </div> 
        </div>
        <div class="row mt-5 grafica">
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card shadow graphic-card">
                <svg class="svg-color" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M320 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM125.7 175.5c9.9-9.9 23.4-15.5 37.5-15.5c1.9 0 3.8 .1 5.6 .3L137.6 254c-9.3 28 1.7 58.8 26.8 74.5l86.2 53.9-25.4 88.8c-4.9 17 5 34.7 22 39.6s34.7-5 39.6-22l28.7-100.4c5.9-20.6-2.6-42.6-20.7-53.9L238 299l30.9-82.4 5.1 12.3C289 264.7 323.9 288 362.7 288H384c17.7 0 32-14.3 32-32s-14.3-32-32-32H362.7c-12.9 0-24.6-7.8-29.5-19.7l-6.3-15c-14.6-35.1-44.1-61.9-80.5-73.1l-48.7-15c-11.1-3.4-22.7-5.2-34.4-5.2c-31 0-60.8 12.3-82.7 34.3L57.4 153.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l23.1-23.1zM91.2 352H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h69.6c19 0 36.2-11.2 43.9-28.5L157 361.6l-9.5-6c-17.5-10.9-30.5-26.8-37.9-44.9L91.2 352z"/></svg>
                    <h1>Products by sport</h1>
                    <?php
                        $con = new mysqli("localhost", "root", "", "sportx");
                        $sql = "SELECT category, SUM(stock) AS total_stock FROM products GROUP BY category";
                        $res = $con->query($sql);
                    ?>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    var data;
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        <?php
                            while($fila = $res->fetch_assoc()){
                                echo "['".$fila["category"]."',".$fila["total_stock"]."],";
                            }
                        ?>
                        ]);

                        var options = {
                        title: ''
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);

                        dataReadyCallback(data);

                    }
                    </script>
                    <div id="piechart"></div>
                </div>
            </div> 
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card shadow cards-content coments-card">
                <svg class="svg-color" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/></svg>
                    <h1>Orders</h1>
                    <div class="coment">    
                        <h3>Pedido 1</h3>
                        <div class="coment-content">
                            <p>jdajsdjajdjsajdasdkaskdadoeo</p><span class="pendiente">Pendiente</span>
                        </div>
                    </div>
                    <hr>
                    <div class="coment">
                        <h3>Pedido 2</h3>
                        <div class="coment-content">
                            <p>jdajsdjajdjsajdasdkaskdadoeo</p><span class="recibido">Recibido</span>
                        </div>
                    </div>
                    <hr>
                    <div class="coment">
                        <h3>Pedido 3</h3>
                        <div class="coment-content">
                            <p>jdajsdjajdjsajdasdkaskdadoeo</p><span class="pendiente">Pendiente</span>
                        </div>
                    </div>
                    <hr>
                    <div class="coment">
                        <h3>Pedido 4</h3>
                        <div class="coment-content">
                            <p>jdajsdjajdjsajdasdkaskdadoeo</p><span class="entregado">Entregado</span>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <?php
    include "template/pie.php"
    ?>
    <!-- <script src="../JS/dark-mode.js"></script> -->
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
