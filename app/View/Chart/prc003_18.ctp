<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/prc003_18') ?>
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
    $tick = str_replace('Cantidad de proyectos ', '', $tick);
    $tick = str_replace('en ', '', $tick);
    $tick = ucfirst($tick);
    echo "ticks.push('" . $tick . "');\n";
    echo "columns.push({'sTitle' : '" . $tick . "'});\n";
}

// Sets the series by year
foreach ($info['series'] as $year_series) {
    echo "\nvar series_" . $year_series['year'] . " = new Array();\n";
    $series = $year_series['value'];
    foreach ($series as $label) {
        echo "series_" . $year_series['year'] . ".push(" . $label . ");\n";
    }
}
?>
</script>
<div id="indicador" class="container">
    <h1><?= $indicator['Indicator']['codigo'] ?> - <?= $indicator['Indicator']['nombre'] ?></h1>
    <h3>Descripción:</h3>
    <p><?= $indicator['Indicator']['descripcion'] ?></p>
    <h3>Fórmula:</h3>
    <p><?= $indicator['Indicator']['formula'] ?></p>
    <?php
    // For each year does a chart
    foreach ($info['series'] as $year_series) {
        ?>
        <script type="text/javascript">
            $(document).ready(function () {
                // Creates the tabs
                $("#tabs_<?= $year_series['year'] ?>").tabs();

                // Creates the table
                $("#data-table_<?= $year_series['year'] ?>").dataTable({
                    "aaData": [series_<?= $year_series['year'] ?>],
                    "aoColumns": columns,
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
                        renderer: $.jqplot.BarRenderer,
                        pointLabels: {show: true, location: 'e'},
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
                if (!window.chrome) {
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