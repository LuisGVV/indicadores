<div class="internal">
    <ul class="lineal">
        <li><button onclick="location.href='<?= $this->Html->url(array("controller" => "home", "action" => "index")) ?>';">Inicio</button></li>
        <li><button onclick="location.href='<?= $this->Html->url(array("controller" => "indicators", "action" => "indicators_list")) ?>';">Indicadores</button></li>

        <?php
        if (isset($access) && $URLCheck->analizeAccess($access, 'data')) {
            ?><li><button onclick="location.href='<?= $this->Html->url(array("controller" => "data", "action" => "index")) ?>';">Datos</button></li><?php
        }
        ?>

        <?php
        if (isset($access) && $URLCheck->analizeAccess($access, 'system')) {
            ?><li><button onclick="location.href='<?= $this->Html->url(array("controller" => "system", "action" => "index")) ?>';">Sistema</button></li><?php
        }
        ?>
    </ul>
</div>

<?php
;
?>