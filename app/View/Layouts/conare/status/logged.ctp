<script type="text/javascript">
    /*$(document).ready(function(){
        $("#logout-confirm").dialog({
            resizable: false,
            height:150,
            modal: true,
            autoOpen: false,
            draggable: false,
            show: "fold",
            hide: "fold",
            buttons: {
                "Salir": function() {
                    logout();
                },
                "Cancelar": function() {
                    $(this).dialog("close");
                }
            }
        }); 
    });*/
    
    /**
     * Sends the ajax request to logout the user and waits for the answer
     */
    var logout = function(){
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "authentication", "action" => "logout")) ?>",
            dataTypeString: "json",
            success: function(data){
                if (data.success == true){
                    location.href = "<?= $this->Html->url(array("controller" => "home", "action" => "index")) ?>";
                }
            }
        });
    }
    
    /*
    var confirmLogout = function(){
        $("#logout-confirm").dialog("open");
    }
    */
</script>

<ul class="nav navbar-nav navbar-right">
    <li><strong class="navbar-text"><?= $user['User']['nombre'] ?></strong></li>
    <li onclick="logout();"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
</ul>

