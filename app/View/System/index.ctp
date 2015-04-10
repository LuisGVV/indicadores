<?=
$this->Html->script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js', array('inline' => false));
$this->Html->css('//cdn.datatables.net/1.10.4/css/jquery.dataTables.css', null, array('inline' => false));
?>

<script type="text/javascript">
    $(document).ready(function () {

        $('#table-users').DataTable({
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
        // Adds validation for the user form
        $("#user-form").validate({
            rules: {
                first: {
                    required: true,
                    maxlength: 40
                },
                last: {
                    required: true,
                    maxlength: 40
                },
                email: {
                    required: true,
                    maxlength: 40,
                    email: true
                },
                password: {
                    required: true,
                    maxlength: 40
                },
                type: {
                    required: true
                }
            }
        })
    });

    /**
     * Opens the create user dialog
     */
    var showModalCreateUser = function () {
        $("#create-user-modal").modal('show');
        $("#first-create").val('');
        $("#last-create").val('');
        $("#email-create").val('');
        $("#password-create").val('');
        $("#type-create").val('');
        $("#university-create").val('');
    };

    var createUser = function () {
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "system", "action" => "create_user")) ?>",
            data: {
                "first_name": $("#first-create").val(),
                "last_name": $("#last-create").val(),
                "email": $("#email-create").val(),
                "password": $("#password-create").val(),
                "usertype_id": $("#type-create").val(),
                "university_id": $("#university-create").val()
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success === true) {
                    location.reload();
                } else {
                    // Indicates the error to the user
                    $("#create-error").html(data.errorMessage);
                }
            }
        });
    };

    /**
     * Opens the delete user confirmation dialog
     */
    var showModalDeleteUser = function (id) {
        $('#delete-user-modal').modal('show');
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "system", "action" => "get_user")) ?>",
            data: {
                "id": id
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success === true) {
                    // Gets the user
                    var user = data.user.User;
                    // Sets the information
                    $("#id-delete").val(user.idusuario);
                    $("#name-delete").html(user.nombre+" "+user.apellido);
                    $("#email-delete").html(user.email);
                }
            }
        });
    };

    /**
     * Deletes the indicated user
     */
    var deleteUser = function () {
        id = $('#id-delete').val();
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "system", "action" => "delete_user")) ?>",
            data: {
                "user_id": id
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success === true) {
                    location.reload();
                } else {
                    // Indicates the error to the user
                    $("#delete-error").html(data.errorMessage);
                }
            }
        });
    };

    /**
     * Opens the update user dialog
     */
    var showModalUpdateUser = function (id) {
        // Cleans the dialog
        $("#update-user-modal").modal('show');

        // Gets the user
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "system", "action" => "get_user")) ?>",
            data: {
                "id": id
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success === true) {
                    // Gets the user
                    var user = data.user.User;

                    // Sets the information
                    $("#id-update").val(user.idusuario);
                    $("#first-update").val(user.nombre);
                    $("#last-update").val(user.apellido);
                    $("#email-update").val(user.email);
                    $("#password-update").val(user.password);
                    $("#type-update").val(user.tipo_usuario_idtipo_usuario);
                    $("#university-update").val(user.universidad_iduniversidad);
                }
            }
        });
    };

    /**
     * Updates the ser
     */
    var updateUser = function () {
// Clears the form error
        $("#user-error").html("");
        // Checks if the user form is valid
        //if ($("#user-form").valid()) {
            // Creates the user
            $.ajax({
                type: "post",
                url: "<?= $this->Html->url(array("controller" => "system", "action" => "update_user")) ?>",
                data: {
                    "id": $("#id-update").val(),
                    "first_name": $("#first-update").val(),
                    "last_name": $("#last-update").val(),
                    "email": $("#email-update").val(),
                    "password": $("#password-update").val(),
                    "usertype_id": $("#type-update").val(),
                    "university_id": $("#university-update").val()
                },
                dataTypeString: "json",
                success: function (data) {
                    if (data.success === true) {
                        location.reload();
                    } else {
                        // Indicates the error to the user
                        $("#update-error").html(data.errorMessage);
                    }
                }
            });
        //}
    };
</script>

<div id="indicador" class="container">
    <h1>Usuarios</h1>

    <button class="btn btn-primary" onclick="showModalCreateUser();">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Agregar usuario</button>

    <table class="table table-striped table-bordered table-hover" id="table-users">
        <thead class="panel-heading">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?= $user['User']['nombre'] ?></td>
                    <td><?= $user['User']['apellido'] ?></td>
                    <td><?= $user['User']['email'] ?></td>
                    <td class="text-center"><button class="btn btn-xs btn-primary" onclick="showModalUpdateUser('<?= $user['User']['idusuario'] ?>');"><span class="glyphicon glyphicon-pencil"></span></button></td>
                    <td class="text-center"><button class="btn btn-xs btn-danger" onclick="showModalDeleteUser('<?= $user['User']['idusuario'] ?>');"><span class="glyphicon glyphicon-trash"></span></button></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<div id="update-user-modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modificar usuario</h4>
            </div>
            <div class="modal-body">
                <span id="user-dialog-title"></span>
                <form class="form-horizontal" id="user-form" name="user-form">
                    <div class="form-group">
                        <input class="form-control" type="hidden" id="id-update" name="id" />
                        <label class="col-sm-2">Nombre:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="first-update" name="first_name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Apellido:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="last-update" name="last_name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Email:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="email-update" name="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Contraseña:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="password-update" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Tipo de usuario:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="type-update" name="type">
                                <?php
                                foreach ($user_types as $user_type) {
                                    ?>
                                    <option value="<?= $user_type['UserType']['idtipo_usuario'] ?>"><?= ucfirst($user_type['UserType']['nombre']) ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Universidad:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="university-update" name="university">
                                <option value="">---</option>
                                <?php
                                foreach ($universities as $university) {
                                    ?>
                                    <option value="<?= $university['University']['iduniversidad'] ?>"><?= $university['University']['acronimo'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <label class="error" id="update-error"></label>
            <div class="modal-footer">
                <div class="action">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="user-form-action" onclick="updateUser();">Actualizar usuario</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="create-user-modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Crear usuario</h4>
            </div>
            <div class="modal-body">
                <span id="user-dialog-title"></span>
                <form class="form-horizontal" id="user-form" name="user-form" action="">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" />
                        <label class="col-sm-2 control-label">Nombre:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="first-create" name="first" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Apellido:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="last-create" name="last" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="email-create" name="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contraseña:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="password-create" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipo de usuario:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="type-create" name="type">
                                <?php
                                foreach ($user_types as $user_type) {
                                    ?>
                                    <option value="<?= $user_type['UserType']['idtipo_usuario'] ?>"><?= ucfirst($user_type['UserType']['nombre']) ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Universidad:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="university-create" name="university">
                                <option value="">---</option>
                                <?php
                                foreach ($universities as $university) {
                                    ?>
                                    <option value="<?= $university['University']['iduniversidad'] ?>"><?= $university['University']['acronimo'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>

                <label class="error" id="create-error"></label>
            </div>
            <div class="modal-footer">
                <div class="action">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="user-form-action" onclick="createUser();">Crear usuario</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="delete-user-modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Borrar usuario</h4>
            </div>
            <div class="modal-body">
                <h4>Desea borrar el usuario?</h4>
                <div class="form-group">
                    <input type="hidden" id="id-delete" name="id" />
                    <label>Nombre:</label><p id="name-delete"></p>
                </div>
                <div class="form-group">
                    <label>Correo:</label><p id="email-delete"></p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="action">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="user-form-action" onclick="deleteUser();">Borrar usuario</button>
                </div>
            </div>
        </div>
    </div>
</div>

