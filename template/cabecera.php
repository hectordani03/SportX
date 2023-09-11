<?php
require './config/db.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT');

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GreenPaws</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@1,500&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    // Obtenemos el dominio y el puerto del sitio web
    const domain = window.location.hostname;
    const port = window.location.port;

    // Generamos una cadena de consulta con el dominio y el puerto
    const query = "?domain=" + domain;
    if (port) {
      query += "&port=" + port;
    }

    // Creamos una función para borrar la caché
    const clearCache = () => {
      // Enviamos una solicitud POST al script de borrado de caché
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "/clear-cache.php" + query);
      xhr.send();
    };

    // Ejecutamos la función de borrado de caché en un intervalo de tiempo determinado
    setInterval(clearCache, 60000); // 60 segundos
  </script>

</head>
<body>
    <section class="header header-inicio">
        <img src="./assets/logo sportX-2.png" alt="">
        <nav class="nav-inicio">
            <div class="nav-links nav-links-2" id="navlinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <!-- <li class="text-primary"><a href="inicio.php">HOME</a></li> -->
                    <li class="dropdown"><a href="../index.php">Soccer</a>
                        <div class="dropdown-content ver-1">
                            <ul>
                                <div class="parte-izquierda">
                                    <li class="temas">Footwear</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Jerseys</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                </div>
                                <div class="parte-derecha">
                                    <li class="temas"><a href="#"></a>Bottoms</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Balls</li>
                                    <li class="temas"><a href="#"></a>Accessories</li>
                                </div>
                                <!-- <li><a href="#"></a></li> -->
                            </ul>
                            <div class="imagen-dropdown-soccer-1">
                                <div class="imagen-soccer-1">
                                    <img src="./assets/futbol/tacos-1.0.jpeg" alt="">
                                    <img src="./assets/futbol/tacos-2.0.webp" alt="">
                                </div>
                                <div class="imagen-soccer-2">
                                    <img src="./assets/futbol/jersey-cabecera.webp" alt="">
                                    <img src="./assets/futbol/jersey-cabecera-espalda.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="../index.php">Basketball</a>
                        <div class="dropdown-content ver-2">
                        <ul>
                                <div class="parte-izquierda">
                                    <li class="temas">Footwear</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Jerseys</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                </div>
                                <div class="parte-derecha">
                                    <li class="temas"><a href="#"></a>Bottoms</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Balls</li>
                                    <li class="temas"><a href="#"></a>Accessories</li>
                                </div>
                                <!-- <li><a href="#"></a></li> -->
                            </ul>
                            <div class="imagen-dropdown-soccer-1 imagen-dropdown-basket-1">
                                <div class="imagen-soccer-1">
                                    <img src="./assets/futbol/jordan-2.1.webp" alt="">
                                    <img src="./assets/futbol/jordan-2.webp" alt="">
                                </div>
                                <div class="imagen-soccer-2 imagen-basket-2">
                                    <img src="./assets/futbol/jersey-basket-1.webp" alt="">
                                    <img src="./assets/futbol/jersey-basket-2.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </li>                    
                    <li class="dropdown"><a href="../index.php">Tennis</a>
                        <div class="dropdown-content ver-3">
                        <ul>
                                <div class="parte-izquierda">
                                    <li class="temas">Footwear</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Clothes</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                </div>
                                <div class="parte-derecha">
                                    <li class="temas"><a href="#"></a>Rackets</li>
                                    <li class="subtemas"><a href="#"></a>Adults</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Balls</li>
                                    <li class="temas"><a href="#"></a>Accessories</li>
                                </div>
                                <!-- <li><a href="#"></a></li> -->
                            </ul>
                            <div class="imagen-dropdown-soccer-1 imagen-dropdown-tennis-1">
                                <div class="imagen-soccer-1">
                                    <img src="./assets/futbol/raqueta-1.webp" alt="">
                                    <img src="./assets/futbol/raqueta-2.webp" alt="">
                                </div>
                                <div class="imagen-soccer-2">
                                    <img src="./assets/futbol/mochila-tenis-2.1.webp" alt="">
                                    <img src="./assets/futbol/mochila-tenis-1.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </li>                    
                    <li class="dropdown"><a href="../index.php">Swimming</a>
                        <div class="dropdown-content ver-4">
                        <ul>
                                <div class="parte-izquierda">
                                    <li class="temas">Footwear</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Swimsuit</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                </div>
                                <div class="parte-derecha">
                                    <li class="temas"><a href="#"></a>Googles</li>
                                    <li class="subtemas"><a href="#"></a>Adults</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Accessories</li>
                                </div>
                                <!-- <li><a href="#"></a></li> -->
                            </ul>
                            <div class="imagen-dropdown-soccer-1 imagen-dropdown-swimming-1">
                                <div class="imagen-soccer-1">
                                    <img src="./assets/futbol/googles-1.webp" alt="">
                                    <img src="./assets/futbol/googles-2.webp" alt="">
                                </div>
                                <div class="imagen-soccer-2">
                                    <img src="./assets/futbol/traje-natacion-1.webp" alt="">
                                    <img src="./assets/futbol/traje-natacion-2.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </li>                    
                    <li class="dropdown"><a href="../index.php">Baseball</a>
                        <div class="dropdown-content ver-5">
                        <ul>
                                <div class="parte-izquierda">
                                    <li class="temas">Footwear</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Child</li>
                                    <li class="temas"><a href="#"></a>Jerseys</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Child</li>
                                </div>
                                <div class="parte-derecha">
                                    <li class="temas"><a href="#"></a>Bats</li>
                                    <li class="subtemas"><a href="#"></a>Adults</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Balls</li>
                                    <li class="temas"><a href="#"></a>Accesorios</li>
                                </div>
                                <!-- <li><a href="#"></a></li> -->
                            </ul>
                            <div class="imagen-dropdown-soccer-1 imagen-dropdown-baseball-1">
                                <div class="imagen-soccer-1">
                                    <img src="./assets/futbol/jersey-beisbol-1.webp" alt="">
                                    <img src="./assets/futbol/jersey-beisbol-2.webp" alt="">
                                </div>
                                <div class="imagen-soccer-2">
                                    <img src="./assets/futbol/gorra-1.webp" alt="">
                                    <img src="./assets/futbol/gorra-2.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </li>                    
                    <li class="dropdown"><a href="../index.php">Football</a>
                        <div class="dropdown-content ver-6">
                        <ul>
                                <div class="parte-izquierda">
                                    <li class="temas">Footwear</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Jerseys</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                </div>
                                <div class="parte-derecha">
                                    <li class="temas"><a href="#"></a>Bottoms</li>
                                    <li class="subtemas"><a href="#"></a>Man</li>
                                    <li class="subtemas"><a href="#"></a>Woman</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Balls</li>
                                    <li class="temas"><a href="#"></a>Protections</li>
                                    <li class="subtemas"><a href="#"></a>Adults</li>
                                    <li class="subtemas"><a href="#"></a>Kids</li>
                                    <li class="temas"><a href="#"></a>Accesorios</li>
                                </div>
                                <!-- <li><a href="#"></a></li> -->
                            </ul>
                            <div class="imagen-dropdown-soccer-1 imagen-dropdown-football-1">
                                <div class="imagen-soccer-1">
                                    <img src="./assets/futbol/jersey-futbol-americano-1.webp" alt="">
                                    <img src="./assets/futbol/jersey-futbol-americano-2.webp" alt="">
                                </div>
                                <div class="imagen-soccer-2">
                                    <img src="./assets/futbol/bufanda-1.webp" alt="">
                                    <img src="./assets/futbol/bufanda-2.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </li>                </ul>
                <div class="iconos-cabecera">
                    <li><a href="#"><i class="bi bi-search"></i></li></a>
                    <li><a href="./administrator/index.php"><i class="bi bi-person-circle"></i></li></a>
                    <li><a href="./logout.php"><i class="bi bi-box-arrow-right"></i></li></a>

                </div>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>
