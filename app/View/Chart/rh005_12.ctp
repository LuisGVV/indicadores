<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/rh005_12') ?>
<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>

<!--[if lt IE 9]><?= $this->Html->script('jqplot/excanvas.min.js') ?><![endif]-->

<?= $this->Html->script('jqplot/jquery.jqplot.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.barRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.categoryAxisRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.pointLabels.min.js') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<script type="text/javascript">
<?php
// Sets the labels for the series
echo "var series_label = new Array();\n";
foreach ($info['series_label'] as $index => $label) {
    echo "\n";
    echo "series_label.push({label: '" . $label . "'});\n";
    foreach ($info['series']['male'] as $year_series) {
        echo "var series_" . $index . "_" . $year_series['year'] . " = new Array();\n";
    }
}

// Sets the ticks
echo "\nvar ticks = new Array();\n";
echo "var columns = new Array();\n";
foreach ($info['ticks'] as $index => $tick) {
    echo "ticks.push('" . $tick . "');\n";
    echo "columns.push({'sTitle' : '" . $tick . "'});\n";
}

// Sets the series for male
foreach ($info['series']['male'] as $year_series) {
    $year = $year_series['year'];
    $series = $year_series['value'];
    echo "\n";
    foreach ($series as $value) {
        echo "series_0_" . $year . ".push(" . $value . ");\n";
    }
}

// Sets the series for female
echo "\n";
foreach ($info['series']['female'] as $year_series) {
    $year = $year_series['year'];
    $series = $year_series['value'];
    echo "\n";
    foreach ($series as $value) {
        echo "series_1_" . $year . ".push(" . $value . ");\n";
    }
}

// Sets the series values for male and female
foreach ($info['series']['male'] as $year_series) {
    echo "\n";
    $year = $year_series['year'];
    echo "var series_" . $year . " = new Array();\n";
    echo "series_" . $year . ".push(series_0_" . $year . ");\n";
    echo "series_" . $year . ".push(series_1_" . $year . ");\n";
}
?>
</script>

<h1><?= $indicator['Indicator']['nombre'] ?></h1>
<p><?= $indicator['Indicator']['descripcion'] ?></p>

<?php
// For each year creates a chart
foreach ($info['series']['male'] as $year_series) {
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            // Creates the tabs
            $("#tabs_<?= $year_series['year'] ?>").tabs();
                    
            // Creates the table
            $("#data-table_<?= $year_series['year'] ?>").dataTable({
                "aaData" : series_<?= $year_series['year'] ?>,
                "aoColumns" : columns,
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": false,
                "bInfo": false,
                "bAutoWidth": false
            });
                                
            // Creates the chart
            var plot_<?= $year_series['year'] ?> = $.jqplot('chart_<?= $year_series['year'] ?>', series_<?= $year_series['year'] ?>, {
                stackSeries: true,
                series: series_label,
                seriesDefaults: {
                    renderer:$.jqplot.BarRenderer,
                    pointLabels: { show: true, location: 'e' },
                    rendererOptions: {
                        barDirection: 'horizontal',
                        barWidth: 30
                    }
                },
                axes: {
                    xaxis:{
                        label: "Cantidad"  
                    },
                    yaxis: {
                        renderer: $.jqplot.CategoryAxisRenderer,
                        "ticks": ticks
                    }
                },
                legend: {
                    show: true,
                    location: 'n',
                    placement: 'outside'
                }  
            });
                                                                                                
            $("#chart_<?= $year_series['year'] ?>").height(250);
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