<?php
if ($result) {
    ?>
    <div class="ui-widget">
        <div style="margin-top: 10px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                <strong>Exito!</strong> Los datos fueron guardados correctamente.</p>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="ui-widget">
        <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                <strong>Error:</strong> Los datos no pudieron ser guardados.</p>
        </div>
    </div>
    <?php
}
?>

