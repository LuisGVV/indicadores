<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/prc004_19') ?>
<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>

<!--[if lt IE 9]><?= $this->Html->script('jqplot/excanvas.min.js') ?><![endif]-->

<?= $this->Html->script('jqplot/jquery.jqplot.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.barRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.categoryAxisRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.pointLabels.min.js') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<script type="text/javascript">
<?php
// Sets the series labels
echo "var series_label = new Array();\n";
foreach ($info['series_label'] as $index => $label) {
    echo "\n";
    echo "series_label.push({label: '" . $label . "'});\n";
    foreach ($info['series']['central'] as $year_series) {
        echo "var series_" . $index . "_" . $year_series['year'] . " = new Array();\n";
    }
}

// Sets the ticks
echo "\nvar ticks = new Array();\n";
echo "var columns = new Array();\n";
foreach ($info['ticks'] as $index => $tick) {
    $tick = str_replace('Cantidad de proyectos en ', '', $tick);
    echo "ticks.push('" . $tick . "');\n";
    echo "columns.push({'sTitle' : '" . $tick . "'});\n";
}

// Sets the series for central
foreach ($info['series']['central'] as $year_series) {
    $year = $year_series['year'];
    $series = $year_series['value'];
    echo "\n";
    foreach ($series as $value) {
        echo "series_0_" . $year . ".push(" . $value . ");\n";
    }
}

// Sets the series for regional
echo "\n";
foreach ($info['series']['regional'] as $year_series) {
    $year = $year_series['year'];
    $series = $year_series['value'];
    echo "\n";
    foreach ($series as $value) {
        echo "series_1_" . $year . ".push(" . $value . ");\n";
    }
}

// Sets the series values for central and regional
foreach ($info['series']['central'] as $year_series) {
    echo "\n";
    $year = $year_series['year'];
    echo "var series_" . $year . " = new Array();\n";
    echo "series_" . $year . ".push(series_0_" . $year . ");\n";
    echo "series_" . $year . ".push(series_1_" . $year . ");\n";
}
?>
</script>
<div id="indicador" class="container">
    <h1><?= $indicator['Indicator']['nombre'] ?></h1>
    <p><?= $indicator['Indicator']['descripcion'] ?></p>

    <?php
    // For each year creates a chart
    foreach ($info['series']['central'] as $year_series) {
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
                        xaxis: {
                            label: "Total"  
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

                $("#chart_<?= $year_series['year'] ?>").height(350);
                plot_<?= $year_series['year'] ?>.replot();
                if(!window.chrome){
                    var imgData = $('#chart_<?= $year_series['year'] ?>').jqplotToImageStr({}); // retrieve info from plot
                    var imgElem = $('<img/>').attr('src', imgData); // create an img and add the data to it
                    $('#chartImg_<?= $year_series['year'] ?>').append(imgElem); //append data to DOM
                }
            });
        </script>
        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#tabs-1_<?= $year_series['year'] ?>" role="tab" data-toggle="tab">Gráfico</a>
                </li>
                <li role="presentation"> 
                    <a href="#tabs-2_<?= $year_series['year'] ?>" role="tab" data-toggle="tab">Datos</a>
                </li>
                <li role="presentation">
                    <a href="#tabs-3_<?= $year_series['year'] ?>" role="tab" data-toggle="tab">Descargar Imagen</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="tabs-1_<?= $year_series['year'] ?>">
                    <div class="chart-container-vertical">
                        <span><?= $year_series['year'] ?></span>
                        <div id="chart_<?= $year_series['year'] ?>"></div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tabs-2_<?= $year_series['year'] ?>">
                    <table id="data-table_<?= $year_series['year'] ?>"></table>
                </div>
                <div role="tabpanel" class="tab-pane" id="tabs-3_<?= $year_series['year'] ?>">
                    <div id="chartImg_<?= $year_series['year'] ?>"></div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>