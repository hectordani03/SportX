<?php
include 'template/cabecera.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <h1>Lista de usuarios</h1>
    <br>
    <div>
        <?php if ($row["role"] == "administrator") { ?>
            <button type="submit" data-toggle="modal" data-target="#adduser" class="btn btn-primary">ADD USER <i class="bi bi-person-fill-add"></i></button>
        <?php } ?>

        <a class="btn btn-secondary" href="../logout.php">Log Out <i class="bi bi-power"></i>
        </a>
        <a href="./pdf.php" class="btn btn-danger"><b>PDF <i class="bi bi-filetype-pdf"></i></b></a>
    </div>
    <br>

    <div class="container-fluid">
        <form class="d-flex">
            <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="¿Qué estás buscando?">
            <hr>
        </form>
    </div>
    <br>

    <table id="adm" class="table table-striped table_id ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Role</th>
                <th scope="col">Modify</th>
                <?php if ($row["role"] == "administrator") { ?>
                    <th scope="col">Delete</th>
                <?php } ?>

            </tr>
        </thead>
        <?php
        if ($row["role"] == "administrator") {
            $sql = $conne->prepare("SELECT * FROM users WHERE id != $user_id ORDER BY role");
            $sql->execute();
            $user = $sql;
        } elseif ($row["role"] == "editor") {
            $sql = $conne->prepare("SELECT * FROM users WHERE role!='administrator' AND id != $user_id ORDER BY role");
            $sql->execute();
            $user = $sql;
        }
        foreach ($user as $user_loop) {
            $users_array = $user_loop['id'] . ',' . $user_loop['name'] . ',' . $user_loop['email'] . ',' . $user_loop['phone_number'] . ',' . $user_loop['role'];
        ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $user_loop['id'] ?></th>
                    <td><?php echo $user_loop['name'] ?></td>
                    <td><?php echo $user_loop['email'] ?></td>
                    <td><?php echo $user_loop['phone_number'] ?></td>
                    <td><?php echo $user_loop['role'] ?></td>

                    <td>
                        <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#modifyuser" onclick="modify_user('<?php echo $users_array ?>')"><i class="bi bi-person-fill-gear"></i></button>
                    </td>

                    <?php if ($row["role"] == "administrator") { ?>
                        <td>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser" onclick="delete_user('<?php echo $users_array ?>')"><i class="bi bi-person-fill-down"></i></button>
                        </td>

                    <?php } ?>


                </tr>
            </tbody>

        <?php } ?>
    </table>

    <!-- --------------------------------ADD USER--------------------------------------- -->
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_user">
                        <div class="mb-3">

                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input autocomplete="off" type="text" class="form-control" name="add_name" id="add_name">

                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input autocomplete="off" type="password" class="form-control" name="pass" id="pass">
                            <p id="invalidpass"></p>

                            <div class="input-group-append">
                                <button id="show_password" class="btn btn-primary" type="button" onclick="showPassword()"> <span class="bi bi-eye-slash icon"></span> </button>
                            </div>

                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="add_email" id="add_email">

                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                            <input type="text" maxlength="10" class="form-control" name="add_pnumber" id="add_pnumber">
                            <p id="invalidpnumber"></p>

                            <div class="mb-3">
                                <label class="form-label">Role:</label>
                                <select name="add_role" id="add_role" class="form-select form-control">
                                    <option value="administrator">administrator</option>
                                    <option value="editor">editor</option>
                                    <option selected value="user">user</option>
                                </select>
                            </div>
                            <!-- <label for="recipient-name" class="col-form-label">Image:</label>
                            <input type="file" class="form-control" id=""> -->
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" id="add" value="Add">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- --------------------------------MODIFY USER--------------------------------------- -->

    <div class="modal fade" id="modifyuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="user_data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="text" required readonly id="mod_id_user" name="mod_id_user" class="form-control">

                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" id="mod_name" name="mod_name" class="form-control">

                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" id="mod_email" name="mod_email" class="form-control">

                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                            <input type="number" id="mod_pnumber" name="mod_pnumber" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role:</label>
                            <select name="mod_role" id="mod_role" class="form-select form-control">
                                <option value="administrator">administrator</option>
                                <option value="editor">editor</option>
                                <option value="user">user</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="modify" class="btn btn-warning">Modify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- --------------------------------DELETE USER--------------------------------------- -->
    <div class="modal fade" id="deleteuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this user?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="delete_user">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ID:</label>
                            <input type="text" required readonly id="del_id_user" name="del_id_user" class="form-control">

                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" required readonly id="del_name" name="del_name" class="form-control">

                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" required readonly id="del_email" name="del_email" class="form-control">

                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                            <input type="number" required readonly id="del_pnumber" name="del_pnumber" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Role:</label>
                            <input type="text" required readonly id="del_role" name="del_role" class="form-control">
                        </div>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="delete" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

//----------------------------------PASSWORD-CHECK-ADD---------------------------
        function showPassword() {
            var change = document.getElementById("pass");
            if (change.type == "password") {
                change.type = "text";
                $(".icon").removeClass("bi bi-eye-slash").addClass("bi bi-eye");
            } else {
                change.type = "password";
                $(".icon").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
            }
        }

//--------------------------------PASSWORD-SECURITY------------------------------
        $(document).ready(function() {
            $('#pass').on('input', function() {
                var password = $(this).val();
                var strength = 0;
                var tips = "";

                // Check password length
                if (password.length < 8) {
                    tips += "Make the password longer. ";
                } else {
                    strength += 1;
                }

                // Check for mixed case
                if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
                    strength += 1;
                } else {
                    tips += "Use both lowercase and uppercase letters. ";
                }

                // Check for numbers
                if (password.match(/\d/)) {
                    strength += 1;
                } else {
                    tips += "Include at least one number. ";
                }

                // Check for special characters
                if (password.match(/[^a-zA-Z\d]/)) {
                    strength += 1;
                } else {
                    tips += "Include at least one special character. ";
                }

                // Update the text and color based on the password strength
                var passwordStrengthElement = $('#invalidpass');
                if (strength < 2) {
                    passwordStrengthElement.text(tips);
                    passwordStrengthElement.css('color', 'red');
                } else if (strength === 2) {
                    passwordStrengthElement.text(tips);
                    passwordStrengthElement.css('color', 'orange');
                } else if (strength === 3) {
                    passwordStrengthElement.text(tips);
                    passwordStrengthElement.css('color', 'black');
                } else {
                    passwordStrengthElement.text("Correct Password. " + tips);
                    passwordStrengthElement.css('color', 'green');
                }
            });
        });


//--------------------------------PHONE-NUMBER----------------------------------
        function soloNumeros(e) {
            var key = e.charCode;
            console.log(key);
            return key >= 48 && key <= 57;
        }
        miFormulario = document.querySelector('#add_user');
        miFormulario.add_pnumber.addEventListener('keypress', function(e) {
            if (!soloNumeros(event)) {
                e.preventDefault();
            }
        })

        $(document).ready(function() {
            $('#add_pnumber').on('input', function() {
                var pnumber = $(this).val();
                var len = 0;
                var txt = "";
                if (pnumber.length < 10) {
                    txt += "Phone number must have 10 digits";
                } else {
                    len += 1;
                }
                var pnumberElement = $('#invalidpnumber');
                if (len < 2) {
                    pnumberElement.text("" + txt);
                    pnumberElement.css('color', 'red');
                }
            });
        });
    </script>

    <?php
    include "template/pie.php"
    ?>