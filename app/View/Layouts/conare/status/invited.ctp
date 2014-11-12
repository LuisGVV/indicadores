<script type="text/javascript">
    $(document).ready(function(){
        
        //Creates the dialog of the login
        $("#login-dialog").dialog({
            resizable: false,
            modal: true,
            draggable: false,
            show: "fold",
            hide: "fold",
            autoOpen: false,
            height: 250
        });
        
        
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
    });
    /**
     * Submits the login dialog
     */
    var submitLogin = function(){
        $("#login-error").html("");
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "authentication", "action" => "login")) ?>",
            data: {
                email: $("#email").val(),
                password: $("#password").val()
            },
            dataTypeString: "json",
            success: function(data){
                if (data.success === true){
                    location.reload();
                } else {
                    /*
                     * Rellenar con los errores
                    $("#login-error").html("Datos equivocados.");
                    */
                }
            }
        });
    }
</script>

<form class="navbar-form navbar-right" role="form">
    <div class="form-group">
        <input id="email" type="text" placeholder="Correo" class="form-control">
    </div>
    <div class="form-group">
        <input id="password" type="password" placeholder="Contraseña" class="form-control">
    </div>
    <button type="button" class="btn btn-primary" onclick="submitLogin()">Iniciar Sesión</button>
</form>
