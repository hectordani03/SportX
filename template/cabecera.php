<?php
require 'config/db.php';
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT');

if (!empty($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    $current_user = $conne->prepare("SELECT * FROM users WHERE id = ?");
    $current_user->execute([$user_id]);
    $row = $current_user->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SportX</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@1,500&display=swap" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css"> -->
    <link rel="shortcut icon" href="./assets/logo sportX-2.png">

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
                                    <li class="temas">Calzado</li>
                                    <li class="subtemas"><a href="#"></a>Hombre</li>
                                    <li class="subtemas"><a href="#"></a>Mujer</li>
                                    <li class="subtemas"><a href="#"></a>Niño</li>
                                    <li class="temas"><a href="#"></a>Jerseys</li>
                                    <li class="subtemas"><a href="#"></a>Hombre</li>
                                    <li class="subtemas"><a href="#"></a>Mujer</li>
                                    <li class="subtemas"><a href="#"></a>Niño</li>
                                </div>
                                <div class="parte-derecha">
                                    <li class="temas"><a href="#"></a>Balones</li>
                                    <li class="temas"><a href="#"></a>Accesorios</li>
                                </div>
                                <!-- <li><a href="#"></a></li> -->
                            </ul>
                            <div class="imagen-dropdown-soccer-1">
                                <div class="imagen-soccer-1">
                                    <img src="../assets/futbol/tacos-1.0.jpeg" alt="">
                                    <img src="../assets/futbol/tacos-2.0.webp" alt="">
                                </div>
                                <div class="imagen-soccer-2">
                                    <img src="../assets/futbol/jersey-cabecera.webp" alt="">
                                    <img src="../assets/futbol/jersey-cabecera-espalda.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="../index.php">Basketball</a>
                        <div class="dropdown-content-2 ver-2">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus magnam nemo repellat facere reprehenderit, eius sequi ipsum repudiandae distinctio architecto voluptatibus perspiciatis cumque! Expedita officia nesciunt, excepturi assumenda ipsam eveniet.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, eligendi hic sapiente fugiat quia dolores expedita ad? Sequi deserunt, quisquam eius iure voluptas vero omnis perferendis fugiat, iste explicabo dolores.
                            </p>
                        </div>
                    </li>
                    <li class="dropdown"><a href="../index.php">Tennis</a>
                        <div class="dropdown-content-3 ver-3">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus magnam nemo repellat facere reprehenderit, eius sequi ipsum repudiandae distinctio architecto voluptatibus perspiciatis cumque! Expedita officia nesciunt, excepturi assumenda ipsam eveniet.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, eligendi hic sapiente fugiat quia dolores expedita ad? Sequi deserunt, quisquam eius iure voluptas vero omnis perferendis fugiat, iste explicabo dolores.
                            </p>
                        </div>
                    </li>
                    <li class="dropdown"><a href="../index.php">Swimming</a>
                        <div class="dropdown-content-4 ver-4">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus magnam nemo repellat facere reprehenderit, eius sequi ipsum repudiandae distinctio architecto voluptatibus perspiciatis cumque! Expedita officia nesciunt, excepturi assumenda ipsam eveniet.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, eligendi hic sapiente fugiat quia dolores expedita ad? Sequi deserunt, quisquam eius iure voluptas vero omnis perferendis fugiat, iste explicabo dolores.
                            </p>
                        </div>
                    </li>
                    <li class="dropdown"><a href="../index.php">Baseball</a>
                        <div class="dropdown-content-5 ver-5">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus magnam nemo repellat facere reprehenderit, eius sequi ipsum repudiandae distinctio architecto voluptatibus perspiciatis cumque! Expedita officia nesciunt, excepturi assumenda ipsam eveniet.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, eligendi hic sapiente fugiat quia dolores expedita ad? Sequi deserunt, quisquam eius iure voluptas vero omnis perferendis fugiat, iste explicabo dolores.
                            </p>
                        </div>
                    </li>
                    <li class="dropdown"><a href="../index.php">Golf</a>
                        <div class="dropdown-content-6 ver-6">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus magnam nemo repellat facere reprehenderit, eius sequi ipsum repudiandae distinctio architecto voluptatibus perspiciatis cumque! Expedita officia nesciunt, excepturi assumenda ipsam eveniet.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, eligendi hic sapiente fugiat quia dolores expedita ad? Sequi deserunt, quisquam eius iure voluptas vero omnis perferendis fugiat, iste explicabo dolores.
                            </p>
                        </div>
                    </li>
                </ul>
                <div class="iconos-cabecera">

                    <?php if ($row["role"] != "user") { ?>
                        <li><a href="./administrator/index.php"><i class="bi bi-person-circle"></i></li></a>
                    <?php } ?>
                    <li><a href="./logout.php"><i class="bi bi-box-arrow-right"></i></li></a>
                    <li><a href=""><i class="bi bi-search"></i></li></a>
                </div>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>