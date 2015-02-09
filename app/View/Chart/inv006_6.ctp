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
var ticks = new Array();
var columns = new Array();
var allSeries = new Array();
<?php
foreach ($info['ticks'] as $index => $tick) { 
    $tick = str_replace(' (equipo e infraestructura)', '', $tick);
    $tick = str_replace('Gastos en inversion en', '', $tick);
    $tick = str_replace(' (Incluye Ad honorem)', '', $tick); 
    echo "ticks.push('" . $tick . "');\n";
    //echo "ticks.push('" . ($index + 1) . ' - ' . $tick . "');\n";
    echo "columns.push({'sTitle' : '" . ($index + 1) . "*'});\n";
}?>

<?php
// Sets the series
foreach ($info['series'] as $year_series) {
    echo "\nvar series_" . $year_series['year'] . " = new Array();\n";
    $series = $year_series['value'];
    foreach ($series as $label) {
        echo "series_" . $year_series['year'] . ".push(" . $label . ");\n";
    }
    echo "\nallSeries.push(series_" . $year_series['year'] . ")";
}
?>
</script>
<script type="text/javascript">
    $(document).ready(function () {

        //HACER DESPUES LO DE LAS TABS
        /* Creates the tabs
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
         });*/

            // Creates the chart
            var plot = $.jqplot('chart', allSeries, {
                seriesDefaults: {
                    renderer: $.jqplot.BarRenderer,
                    pointLabels: {
                        show: true, location: 'e', edgeTolerance: -15
                    },
                    shadowAngle: 135,
                    rendererOptions: {
                        barDirection: 'horizontal',
                        barWidth: 30
                    }
                },
                axes: {
                    xaxis: {
                        min: 0,
                        tickInterval: 500,
                        padMin: 0,
                        label: "Total"
                    },
                    yaxis: {
                        pad: 1.05,
                        renderer: $.jqplot.CategoryAxisRenderer,
                        "ticks": ticks
                    }
                }
            });

            $("#chart").height(800);
            plot.replot();
            if (!window.chrome) {
                var imgData = $('#chart').jqplotToImageStr({}); // retrieve info from plot
                var imgElem = $('<img/>').attr('src', imgData); // create an img and add the data to it
                $('#chartImg').append(imgElem); //append data to DOM
            }
        });
</script>

<div id="indicador" class="container">
    <?php include_once ('singleChartResult.ctp'); ?>
</div>