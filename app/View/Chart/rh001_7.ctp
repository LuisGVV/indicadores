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
    });
</script>

<h1><?= $indicator['Indicator']['nombre'] ?></h1>
<p><?= $indicator['Indicator']['descripcion'] ?></p>

<div id="tabs" class="chart-tabs">
    <ul>
        <li><a href="#tabs-1">Grafico</a></li>
        <li><a href="#tabs-2">Datos</a></li>
    </ul>
    <div id="tabs-1">
        <div class="chart-container">
            <div id="chart"></div>
        </div>
    </div>
    <div id="tabs-2">
        <table id="data-table"></table>
    </div>
</div>