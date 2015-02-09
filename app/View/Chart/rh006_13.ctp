<?= $this->Html->css('chart/rh006_13') ?>

<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>

<!--[if lt IE 9]><?= $this->Html->script('jqplot/excanvas.min.js') ?><![endif]-->

<?= $this->Html->script('jqplot/jquery.jqplot.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.barRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.categoryAxisRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.pointLabels.min.js') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<h1><?= $indicator['Indicator']['codigo'] ?> - <?= $indicator['Indicator']['nombre'] ?></h1>
<h3>Descripción:</h3>
<p><?= $indicator['Indicator']['descripcion'] ?></p>
<h3>Fórmula:</h3>
<p><?= $indicator['Indicator']['formula'] ?></p>

<div class="chart-list">
    <ul>
        <?php
        foreach ($info as $rh006_13) {
            if (isset($rh006_13['year'])) {
                ?>
                <li>
                    <div class="ui-widget ui-widget-content ui-corner-all">
                        <label><?= $rh006_13['year'] ?></label>
                        <span><?= $rh006_13['total'] ?></span>
                    </div>
                </li>
                <?php
            }
        }
        ?>
    </ul>
</div>