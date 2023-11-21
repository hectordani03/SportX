<?php
include 'template/cabecera.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@1,500&display=swap" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/logo sportX-2.png">
    <style>
        body {
            background-color: #f8f9fa;
            font-family:'Bebas Neue', 'sans-serif' !important;-
        }

        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #000000;
        }

        .size{
            font-size: 23px;
            font-family: 'Bebas Neue', sans-serif !important;
        }

        .size2{
            font-size: 40px;
            font-family: 'sans-serif';
        }
        label {
            font-family: 'Bebas Neue', sans-serif !important;
            font-size: 25px;
            color: #495057;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border: 2px solid #000000;
            border-radius: 5px;
            padding: 8px;
            box-shadow: none;
        }

        .profile-img {
            max-width: 500px;
            border: 4px solid #ddd;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .custom-file-label::after {
            content: "Elegir archivo";
        }

        .custom-file-label {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            background-color: #9c9c9c;
            color: #ffffff;
            border: 2px solid #000000;
            border-radius: 5px;
        }

        .custom-file-input:focus {
            border-color: rgba(0, 123, 255, 0.5);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: rgb(99,190,99);
            border-color: #000000;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .profi{
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .recorte{
            width: 200px;
            height: 200px;
        }
        .field{
        border-radius: 10px;
        border-color: white;
        border-top: white;
        border-left: white;
        border-bottom-color: white;
        box-shadow: 4px 5px gray;
        }
        .sumbit{
            border-color: lightgray;
            background-color: lightgray;
            color: black !important;
            box-shadow: 3px 3px gray;
        }
    </style>
</head>
<body>
<main id = "main">

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center size2">Perfil de Usuario</h2>
            <form action="procesar.php" method="post" enctype="multipart/form-data">
                <!-- Datos del usuario -->
                <div class = "text-center">
                <img src ="../assets/default.png" class="profile-img mx-auto recorte" id="preview_image">
                </div>
                <div class="form-group">
                    <label for="employee_key">Llave de Empleado:</label>
                    <input type="text" class="form-control field size" id="employee_key" name="employee_key" readonly value="12345"><!--En value, aqui lo tienes que conectar a la base de datos -->
                </div>

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control field size" id="name" name="name" readonly value="John Doe"><!--En value, aqui lo tienes que conectar a la base de datos -->
                </div>

                <div class="form-group">
                    <label for="dob">Fecha de Nacimiento:</label>
                    <input type="text" class="form-control field size" id="dob" name="dob" readonly value="01/01/1990"><!--En value, aqui lo tienes que conectar a la base de datos -->
                </div>

                <div class="form-group">
                    <label for="phone">Número de Teléfono:</label>
                    <input type="text" class="form-control field size" id="phone" name="phone" readonly value="123-456-7890"><!--En value, aqui lo tienes que conectar a la base de datos -->
                </div>

                <!-- Foto de perfil -->
                <div class="form-group size">
                    <label for="profile_pic">Foto de Perfil:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic"><!--Esta es la foto que el usuario va a cargar, tienes que guardarla en la base de datos -->
                        <label class="custom-file-label text-center btn  size field" for="profile_pic">Elegir archivo</label>
                    </div>
                    
                </div>

                <button type="submit" class="btn btn-primary size field">Guardar Cambios</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Muestra la imagen seleccionada en el elemento de vista previa
    document.getElementById('profile_pic').addEventListener('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview_image').src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
    <?php
    include "template/pie.php"
    ?>
</main> 
</body>
</html>


