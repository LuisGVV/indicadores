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
     * Opens the login dialog
     */
    var showLogin = function(){
        $("#login-dialog").dialog("open");
    }
    
    /**
     * Submits the login dialog
     */
    var submitLogin = function(){
        $("#login-error").html("");
        if ($("#login-form").valid()){
            $.ajax({
                type: "post",
                url: "<?= $this->Html->url(array("controller" => "authentication", "action" => "login")) ?>",
                data: {
                    email: $("#email").val(),
                    password: $("#password").val()
                },
                dataTypeString: "json",
                success: function(data){
                    if (data.success == true){
                        location.reload();
                    } else {
                        $("#login-error").html("Datos equivocados.");
                    }
                }
            });
        }
    }
</script>

<div id="login-dialog" class="hidden">
    <div class="form">
        <span>Entrada</span>
        <div>
            <form id="login-form" name="login-form" method="post" action="">
                <div>
                    <label>Email:</label>
                    <input type="text" id="email" name="email" />
                </div>
                <div>
                    <label>Contraseña</label>
                    <input type="password" id="password" name="password" />
                </div>
            </form>
            <label class="error" id="login-error"></label>
            <div class="action">
                <button onclick="submitLogin();">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div id="user-status" class="floating-menu">
    <ul class="vertical">
        <li onclick="showLogin();" class="ui-corner-left ui-widget ui-widget-content"><span class="ui-icon ui-icon-person"></span><span>Entrar</span></li>
    </ul>
</div>
