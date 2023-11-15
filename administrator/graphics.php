<?php
include 'template/cabecera.php';
$con = new mysqli("localhost", "root", "", "sportx");

function generarGrafica($sql, $titulo, $elementoContenedor) {
    $con = new mysqli("localhost", "root", "", "sportx");
    $res = $con->query($sql);
?>
    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                        while($fila = $res->fetch_assoc()){
                            echo "['".$fila["mark"]."',".$fila["total_stock"]."],";
                        }
                    ?>
                ]);

                var options = {
                    title: '<?php echo $titulo; ?>'
                };

                var chart = new google.visualization.PieChart(document.getElementById('<?php echo $elementoContenedor; ?>'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <div id="<?php echo $elementoContenedor; ?>" style="width: 900px; height: 500px;"></div>
    </body>
    </html>
<?php
}

// Llama a la función para generar una gráfica
$sql1 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Baseball' GROUP BY mark";
$titulo1 = 'Stock de productos por marca en la categoría Baseball';
$elementoContenedor1 = 'piechart1';
generarGrafica($sql1, $titulo1, $elementoContenedor1);

// Llama a la función para generar otra gráfica
$sql2 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Soccer' GROUP BY mark";
$titulo2 = 'Stock de productos por marca en la categoría Soccer';
$elementoContenedor2 = 'piechart2';
generarGrafica($sql2, $titulo2, $elementoContenedor2);

// Puedes seguir llamando la función para generar más gráficas según sea necesario.
?>
