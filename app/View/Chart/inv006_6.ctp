<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/inv006_6') ?>
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
foreach ($info['ticks'] as $index => $tick) {
    $tick = str_replace(' (equipo e infraestructura)', '', $tick);
    $tick = str_replace(' (Incluye Ad honorem)', '', $tick);
    echo "ticks.push('" . ($index + 1) . ' - ' . $tick . "');\n";
    echo "columns.push({'sTitle' : '" . ($index + 1) . "*'});\n";
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
// Does a chart for each year series
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
                                
            // Creates the chart
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
                        label: "Total"  
                    },
                    yaxis: {
                        renderer: $.jqplot.CategoryAxisRenderer,
                        "ticks": ticks
                    }
                }
            });
                                        
            $("#chart_<?= $year_series['year'] ?>").height(850);
            plot_<?= $year_series['year'] ?>.replot();
            
            var imgData = $('#chart_<?= $year_series['year'] ?>').jqplotToImageStr({}); // retrieve info from plot
            var imgElem = $('<img/>').attr('src', imgData); // create an img and add the data to it
            $('#chartImg_<?= $year_series['year'] ?>').append(imgElem); //append data to DOM
        });
    </script>

    <div id="tabs_<?= $year_series['year'] ?>" class="chart-tabs">
        <ul>
            <li><a href="#tabs-1">Grafico</a></li>
            <li><a href="#tabs-2">Datos</a></li>
            <li><a href="#tabs-3">Descargar gráficos como imágen</a></li>
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
        <div id="tabs-3">
            <div id="chartImg_<?= $year_series['year'] ?>"></div>
        </div>
    </div>
    <?php
}
?>