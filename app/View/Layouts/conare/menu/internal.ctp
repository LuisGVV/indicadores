

<li><a href='<?= $this->Html->url(array("controller" => "indicators", "action" => "indicators_list")) ?>'>Indicadores</a></li>

<?php
if (isset($access) && $URLCheck->analizeAccess($access, 'data')) {
    ?><li><a href='<?= $this->Html->url(array("controller" => "data", "action" => "index")) ?>'>Datos</a></li>
    <li><a href='<?= $this->Html->url(array("controller" => "audit", "action" => "index")) ?>'>Auditorias</a></li>    
<?php
}
?>

<?php
if (isset($access) && $URLCheck->analizeAccess($access, 'system')) {
    ?><li><a href='<?= $this->Html->url(array("controller" => "system", "action" => "index")) ?>'>Sistema</button></li><?php
}
?>


