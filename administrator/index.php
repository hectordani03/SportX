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

</head>

<body>

    <h1 class="users-text">USERS</h1>
    <p class="users-intro">La sección de usuarios en tu aplicación controla quién accede y participa en la gestión del inventario. Los administradores pueden agregar y eliminar usuarios, asegurando un control efectivo y seguro del acceso a la información y funciones del sistema.</p>
    <button type="submit" data-toggle="modal" data-target="#adduser" class="btn btn-primary d-flex mx-auto mb-3 add-user">ADD USER</button>

    <table id="adm" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Modify</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <?php
        $sql = $conne->prepare("SELECT * FROM users");
        $sql->execute();
        $user = $sql;
        foreach ($user as $user_loop) {
            $users_array = $user_loop['id'] . ',' . $user_loop['username'] . ',' . $user_loop['email'] . ',' . $user_loop['role']; ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $user_loop['id'] ?></th>
                    <td><?php echo $user_loop['username'] ?></td>
                    <td><?php echo $user_loop['email'] ?></td>
                    <td><?php echo $user_loop['role'] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modifyuser" onclick="modify_user('<?php echo $users_array ?>')">MODIFY</button>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser" onclick="delete_user('<?php echo $users_array ?>')">DELETE</button>
                    </td>
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
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" name="add_username" id="add_username">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" name="add_password" id="add_password">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="add_email" id="add_email">

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
                        <button type="button" id="add" class="btn btn-primary">Add</button>
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

                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" id="mod_username" name="mod_username" class="form-control">

                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" id="mod_email" name="mod_email" class="form-control">
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
                        <button type="button" id="modify" class="btn btn-success">Modify</button>
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
                            <input type="text" required readonly id="del_username" name="del_username" class="form-control">

                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" required readonly id="del_email" name="del_email" class="form-control">
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
    <script type="text/javascript" src="../../GreenPaws/inicio.php"></script>
    <script src="inicio.js"></script>

    <?php
    include "template/pie.php"
    ?>