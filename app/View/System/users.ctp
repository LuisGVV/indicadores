
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<script type="text/javascript">
    $(document).ready(function () {
        // Sets the buttons
        $("button").button();

        // Creates the table
        $("#users-table").dataTable({
            "bJQueryUI": true,
            "bAutoWidth": true,
            "bPaginate": false,
            "aoColumns": [
                null,
                null,
                null,
                {"sWidth": "25px", "bSortable": false},
                {"sWidth": "25px", "bSortable": false}
            ]
        });

        // Removes the hidden class of the table
        $("#users-table").removeClass("hidden");

        // The delete user confirmation dialog
        $("#delete-user-confirm").dialog({
            resizable: false,
            height: 150,
            modal: true,
            autoOpen: false,
            draggable: false,
            show: "fold",
            hide: "fold",
            buttons: {
                "Eliminar": function () {
                    deleteUser($("#delete-user-id").val());
                },
                "Cancelar": function () {
                    $(this).dialog("close");
                }
            }
        });

        // Creates the user dialog
//        $("#user-dialog").dialog({
//            resizable: false,
//            height: 480,
//            width: 400,
//            modal: true,
//            autoOpen: false,
//            draggable: false,
//            show: "fold",
//            hide: "fold"
//        });

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
     * Opens the delete user confirmation dialog
     */
    var openDeleteUserConfirm = function (email, id) {
        $("#delete-user-email").html(email);
        $("#delete-user-id").val(id);
        $("#delete-user-confirm").dialog("open");
    };

    /**
     * Deletes the indicated user
     */
    var deleteUser = function (id) {
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "system", "action" => "delete_user")) ?>",
            data: {
                "user_id": id
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success == true) {
                    // Closes the dialog
                    $("#delete-user-confirm").dialog("close");

                    // Reloads the tab
                    var current_index = $("#tabs").tabs("option", "selected");
                    $("#tabs").tabs('load', current_index);
                } else {
                    // Indicates the error to the user
                    $("#user-error").html(data.errorMessage);
                }
            }
        });
    };

    /**
     * Opens the create user dialog
     */
    var openCreateUserDialog = function () {
        // Cleans the dialog
        $("#user-form").find("input").val("");

        // Opens the dialog
        $("#user-dialog-title").html("Crear usuario");
        $("#user-form-action").attr("onclick", "createUser();");
        $("#user-dialog").dialog("open");
    };

    /**
     * Opens the update user dialog
     */
    var showUpdateUserModal = function (id) {
        // Cleans the dialog 
        $("#user-modal").modal('show');
        //$("#user-modal").find("input").val("");

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
                    $("#first").val(user.nombre);
                    $("#last").val(user.apellido);
                    $("#email").val(user.email);
                    $("#password").val(user.password);
                    $("#type").val(user.tipo_usuario_idtipo_usuario);
                    $("#university").val(user.universidad_iduniversidad);

                    // Opens the dialog
                    $("#user-dialog-title").html("Actualizar usuario");
                    $("#user-form-action").attr("onclick", "updateUser();");
                    $("#id").val(id);
                    $("#user-dialog").dialog("open");
                }
            }
        });
    };


    /**
     * Creates a new user
     */
    var createUser = function () {
        // Clears the form error
        $("#user-error").html("");

        // Checks if the user form is valid
        if ($("#user-form").valid()) {
            // Creates the user
            $.ajax({
                type: "post",
                url: "<?= $this->Html->url(array("controller" => "system", "action" => "create_user")) ?>",
                data: {
                    "first_name": $("#first").val(),
                    "last_name": $("#last").val(),
                    "email": $("#email").val(),
                    "password": $("#password").val(),
                    "usertype_id": $("#type").val(),
                    "university_id": $("#university").val()
                },
                dataTypeString: "json",
                success: function (data) {
                    if (data.success == true) {
                        location.reload();
                    } else {
                        // Indicates the error to the user
                        $("#user-error").html(data.errorMessage);
                    }
                }
            });
        }
    };

    /**
     * Updates the ser
     */
    var updateUser = function () {
        // Clears the form error
        $("#user-error").html("");

        // Checks if the user form is valid
        if ($("#user-form").valid()) {
            // Creates the user
            $.ajax({
                type: "post",
                url: "<?= $this->Html->url(array("controller" => "system", "action" => "update_user")) ?>",
                data: {
                    "id": $("#id").val(),
                    "first_name": $("#first").val(),
                    "last_name": $("#last").val(),
                    "email": $("#email").val(),
                    "password": $("#password").val(),
                    "usertype_id": $("#type").val(),
                    "university_id": $("#university").val()
                },
                dataTypeString: "json",
                success: function (data) {
                    if (data.success == true) {
                        location.reload();
                    } else {
                        // Indicates the error to the user
                        $("#user-error").html(data.errorMessage);
                    }
                }
            });
        }
    };
</script>

<h1>Usuarios</h1>

<button class="btn-primary btn-lg" onclick="openCreateUserDialog();">Crear un nuevo usuario</button>


<table class="table" id="users-table" class="hidden">
    <thead class="panel-heading">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th></th>
            <th></th>
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
                <td class="center"><button onclick="showUpdateUserModal('<?= $user['User']['idusuario'] ?>');"><span class="ui-icon ui-icon-pencil"></span></button></td>
                <td class="center"><button onclick="openDeleteUserConfirm('<?= $user['User']['email'] ?>', '<?= $user['User']['idusuario'] ?>');"><span class="ui-icon ui-icon-trash"></span></button></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<div id="delete-user-confirm" class="modal">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Esta seguro que desea borrar el usuario <span id="delete-user-email"></span>?</p>
    <input type="hidden" id="delete-user-id" />
</div>

<div id="user-modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modificar usuario</h4>
            </div>
            <div class="modal-body">
                <span id="user-dialog-title"></span>
                <form id="user-form" name="user-form">
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" />
                        <label>Nombre:</label>
                        <input type="text" id="first" name="first" />
                    </div>
                    <div class="form-group">
                        <label>Apellido:</label>
                        <input type="text" id="last" name="last" />
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password" id="password" name="password" />
                    </div>
                    <div class="form-group">
                        <label>Tipo de usuario:</label>
                        <select id="type" name="type">
                            <?php
                            foreach ($user_types as $user_type) {
                                ?>
                                <option value="<?= $user_type['UserType']['idtipo_usuario'] ?>"><?= ucfirst($user_type['UserType']['nombre']) ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Universidad:</label>
                        <select id="university" name="university">
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
                </form>
            </div>
            <label class="error" id="user-error"></label>
            <div class="action">
                <button id="user-form-action" onclick="">Aceptar</button>
            </div>
        </div>
    </div>
</div>



