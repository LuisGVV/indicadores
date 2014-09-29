<script type="text/javascript">
    $(document).ready(function(){
        $("#tabs").tabs({
            beforeLoad: function( event, ui ) {
                ui.jqXHR.error(function() {
                    ui.panel.html("No se pudo cargar la pagina deseada");
                });
            }
        });
    });
</script>

<div>
    <h1>Configuration del sistema</h1>
    <div id="tabs">
        <ul>
            <li><a id="system-users" href="<?= $this->Html->url(array("controller" => "system", "action" => "users")) ?>">Usuarios</a></li>
            <li><a id="system-users" href="<?= $this->Html->url(array("controller" => "system", "action" => "audit")) ?>">Auditoria</a></li>
        </ul>
    </div>
</div>