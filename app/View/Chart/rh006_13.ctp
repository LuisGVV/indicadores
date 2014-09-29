<?= $this->Html->css('chart/rh006_13') ?>

<h1><?= $indicator['Indicator']['nombre'] ?></h1>
<p><?= $indicator['Indicator']['descripcion'] ?></p>

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