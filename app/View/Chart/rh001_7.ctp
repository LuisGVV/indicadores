<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/rh001_7') ?>
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

// Gets the series by male and female
echo "\nvar series_male = new Array();\n";
echo "var series_female = new Array();\n";
foreach ($info['series'] as $label) {
    echo "series_male.push(" . $label[0] . ");\n";
    echo "series_female.push(" . $label[1] . ");\n";
}
?>
</script>

<script type="text/javascript">    
    $(document).ready(function(){
        // Creates the tabs
        $("#tabs").tabs();
        
        // Creates the table
        $("#data-table").dataTable({
            "aaData" : [series_male, series_female],
            "aoColumns" : columns,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false
        });
        
        // Creates the chart
        $.jqplot('chart', [series_male, series_female], {
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
            series: [{label: "Hombres"}, {label: "Mujeres"}],
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