<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/rh004_10') ?>
<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>

<!--[if lt IE 9]><?= $this->Html->script('jqplot/excanvas.min.js') ?><![endif]-->

<?= $this->Html->script('jqplot/jquery.jqplot.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.barRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.categoryAxisRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.pointLabels.min.js') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<script type="text/javascript">
<?php
// Sets the ticks
echo "var ticks = new Array();\n";
echo "var columns = new Array();\n";
foreach ($info['ticks'] as $tick) {
    $tick = str_replace('Cantidad de investigadores participantes (Incluye Ad honorem) en ', '', $tick);
    echo "ticks.push('" . $tick . "');\n";
    echo "columns.push({'sTitle' : '" . $tick . "'});\n";
}

// Sets the series
foreach ($info['series'] as $year_series) {
    echo "\nvar series_" . $year_series['year'] . " = new Array();\n";
    $series = $year_series['value'];
    foreach ($series as $label) {
        echo "series_" . $year_series['year'] . ".push(" . $label . ");\n";
    }
}
?>
</script>

<h1><?= $indicator['Indicator']['nombre'] ?></h1>
<p><?= $indicator['Indicator']['descripcion'] ?></p>

<?php
// For each year creates a chart
foreach ($info['series'] as $year_series) {
    ?>
    <script type="text/javascript">    
        $(document).ready(function(){
            // Creates the tabs
            $("#tabs_<?= $year_series['year'] ?>").tabs();
                
            // Creates the table
            $("#data-table_<?= $year_series['year'] ?>").dataTable({
                "aaData" : [series_<?= $year_series['year'] ?>],
                "aoColumns" : columns,
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": false,
                "bInfo": false,
                "bAutoWidth": false
            });
                                    
            // Creates the current year chart
            var plot_<?= $year_series['year'] ?> = $.jqplot('chart_<?= $year_series['year'] ?>', [series_<?= $year_series['year'] ?>], {
                seriesDefaults: {
                    renderer:$.jqplot.BarRenderer,
                    pointLabels: { show: true, location: 'e', edgeTolerance: -15 },
                    shadowAngle: 135,
                    rendererOptions: {
                        barDirection: 'horizontal',
                        barWidth: 30
                    }
                },
                axes: {
                    xaxis: {
                        label: "Cantidad"  
                    },
                    yaxis: {
                        renderer: $.jqplot.CategoryAxisRenderer,
                        "ticks": ticks
                    }
                }
            });
                                            
            $("#chart_<?= $year_series['year'] ?>").height(350);
            plot_<?= $year_series['year'] ?>.replot();
        });
    </script>

    <div id="tabs_<?= $year_series['year'] ?>" class="chart-tabs">
        <ul>
            <li><a href="#tabs-1">Grafico</a></li>
            <li><a href="#tabs-2">Datos</a></li>
        </ul>
        <div id="tabs-1">
            <div class="chart-container-vertical">
                <span><?= $year_series['year'] ?></span>
                <div id="chart_<?= $year_series['year'] ?>"></div>
            </div>
        </div>
        <div id="tabs-2">
            <table id="data-table_<?= $year_series['year'] ?>"></table>
        </div>
    </div>
    <?php
}
?>