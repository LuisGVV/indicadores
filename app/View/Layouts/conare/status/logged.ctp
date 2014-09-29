<script type="text/javascript">
    $(document).ready(function(){
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
    });
    
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
    
    /**
     * Confirms the logout of the system
     */
    var confirmLogout = function(){
        $("#logout-confirm").dialog("open");
    }
</script>

<div id="logout-confirm" class="hidden">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Esta seguro que desea salir del sistema?</p>
</div>

<div id="user-status" class="floating-menu">
    <ul class="vertical">
        <li class="ui-corner-left ui-widget ui-widget-content"><span class="name"><?= $user['User']['nombre'] ?> <?= $user['User']['apellido'] ?></span></li>
        <li onclick="confirmLogout();" class="ui-corner-left ui-widget ui-widget-content"><span class="ui-icon ui-icon-power"></span><span>Salir</span></li>
    </ul>
</div>
