<?= $this->Html->css('chart/ins011_15') ?>
<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>

<!--[if lt IE 9]><?= $this->Html->script('jqplot/excanvas.min.js') ?><![endif]-->

<?= $this->Html->script('jqplot/jquery.jqplot.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.barRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.categoryAxisRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.pointLabels.min.js') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>


<script type="text/javascript">
<?php
// Gets the ticks
echo "var ticks = new Array();\n";
echo "var columns = new Array();\n";
foreach ($info['ticks'] as $tick) {
    echo "ticks.push(" . $tick . ");\n";
    echo "columns.push({'sTitle' : '" . $tick . "'});\n";
}

// Gets the series
echo "\nvar series = new Array();\n";
foreach ($info['grades'] as $grade) {
    echo "series.push({label : '" . $grade . "'});\n";
}

// Fill the series array
echo "\n";
foreach ($info['series'][0] as $index => $label) {
    echo "var series_" . $index . " = new Array();\n";
}
echo "\n";

// Fill the series detailed data
foreach ($info['series'] as $university_series) {
    foreach ($university_series as $index => $label) {
        echo "series_" . $index . ".push(" . $label . ");\n";
    }
}

// Gathers al series in one single point
echo "\nvar all_series = new Array();\n";
foreach ($info['series'][0] as $index => $label) {
    echo "all_series.push(series_" . $index . ");\n";
}
?>
</script>

<script type="text/javascript">    
    $(document).ready(function(){
        // Creates the tabs
        $("#tabs").tabs();
        // Creates the table
        $("#data-table").dataTable({
            "aaData" : all_series,
            "aoColumns" : columns,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false
        });
        
        
        // Creates the chart
        $.jqplot('chart', all_series, {
            stackSeries: true,
            seriesDefaults:{
                renderer: $.jqplot.BarRenderer,
                rendererOptions: {
                    barMargin: 30,
                    highlightMouseDown: true 
                },
                pointLabels: {
                    show: true
                }
            },
            series: series,
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks,
                    label: "Años"
                },
                yaxis: {
                    padMin: 0,
                    label: "Total"
                }
            },
            legend: {
                show: true,
                location: 'n',
                placement: 'outside'
            }
        });
        
        var imgData = $('#chart').jqplotToImageStr({}); // retrieve info from plot
        var imgElem = $('<img/>').attr('src', imgData); // create an img and add the data to it
        $('#chartImg').append(imgElem); //append data to DOM
    });
</script>
<div id="indicador" class="container">
    <h1><?= $indicator['Indicator']['nombre'] ?></h1>
    <p><?= $indicator['Indicator']['descripcion'] ?></p>
    <?php include_once ('singleChartResult.ctp'); ?>
</div>

