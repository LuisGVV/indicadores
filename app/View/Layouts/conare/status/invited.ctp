<script type="text/javascript">
    $(document).ready(function () {

        //Validate rules for the login
        $("#login-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            }
        });

        //Binding de eventos para cuando el usuario hace enter
        $("#password").keyup(function (e) {
            if ((e.which === 13) && $("#login-form").valid()) {
                submitLogin();
            }
        });
        
         $("#email").keyup(function (e) {
            if ((e.which === 13) && $("#login-form").valid()) {
                submitLogin();
            }
        });
    });

    var openLoginModal = function () {
        //fix-around para que el modal se muestre, si el modal hereda 
        //de un fixed-relative position no se muestra correcamente
        $('#login-modal').appendTo("body"); 
        $('#login-modal').modal('show');
    };

    /**
     * Submits the login dialog
     */
    var submitLogin = function () {
        //$("#login-error").html("");
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "authentication", "action" => "login")) ?>",
            data: {
                email: $("#email").val(),
                password: $("#password").val()
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success === true) {
                    location.reload();
                } else {
                    $("#login-error").html("Datos equivocados.");
                }
            }
        });
    }
</script>

<div class="navbar-form navbar-right" role="form">
    <button type="button" class="btn btn-primary" onclick="openLoginModal()">Iniciar Sesión</button>
</div>

<div id="login-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="modal-header" class="modal-title">Iniciar Sesión</h4>
            </div>
            <form id="login-form" name="login-form-modal">
                <div class="modal-body">
                    <div class="form-group">
                        <input id="email" name="email" type="text" placeholder="Correo" class="form-control">
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control">
                    </div>
                    <div id="error-message">
                        <strong id="login-error"></strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" onclick="submitLogin();">Entrar</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
