<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/rh003_9') ?>
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
    echo "ticks.push(" . $tick . ");\n";
    echo "columns.push({'sTitle' : '" . $tick . "'});\n";
}

// Sets the series labels
echo "\nvar series = new Array();\n";
foreach ($info['grades'] as $grade) {
    echo "series.push({label : '" . $grade . "'});\n";
}

// Sets the series
echo "\n";
foreach ($info['series'][0] as $index => $label) {
    echo "var series_" . $index . " = new Array();\n";
}
echo "\n";

// Sets the series values
foreach ($info['series'] as $university_series) {
    foreach ($university_series as $index => $label) {
        echo "series_" . $index . ".push(" . $label . ");\n";
    }
}

// Groups all the series
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
        
        // Create the chart
        $.jqplot('chart', all_series, {
            stackSeries: true,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                rendererOptions: {
                    fillToZero: true,
                    barWidth: 100,
                    barMargin: 30,
                    highlightMouseDown: true 
                },
                pointLabels: {show: true}
            },
            series: series,
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks,
                    label: "Años"
                },
                yaxis: {
                    min: 0,
                    tickInterval: 500,
                    padMin: 0,
                    label: "Cantidad"
                }
            },
            legend: {
                show: true,
                location: 'n',
                placement: 'outside'
            }
        });
        //Insert image into DOM
        if(!window.chrome){
            var imgData = $('#chart').jqplotToImageStr({}); // retrieve info from plot
            var imgElem = $('<img/>').attr('src', imgData); // create an img and add the data to it
            $('#chartImg').append(imgElem); //append data to DOM
        }
    });
</script>
<div id="indicador" class="container">
    <?php include_once ('singleChartResult.ctp'); ?>
</div>