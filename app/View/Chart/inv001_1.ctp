<?= $this->Html->css('jqplot/jquery.jqplot.min') ?>
<?= $this->Html->css('chart/inv001_1') ?>
<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>

<!--[if lt IE 9]><?= $this->Html->script('jqplot/excanvas.min.js') ?><![endif]-->

<?= $this->Html->script('jqplot/jquery.jqplot.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.barRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.categoryAxisRenderer.min.js') ?>
<?= $this->Html->script('jqplot/jquery.jqplot/jqplot.pointLabels.min.js') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<script type="text/javascript">
    var all_series;
    var columns;
    var dataRows;
<?php
// Sets the ticks
echo "var ticks = new Array();\n";
echo "var columns = new Array();\n";
foreach ($info['ticks'] as $tick) {
    echo "ticks.push('" . $tick . "');\n";
    echo "columns.push({'sTitle' : '" . $tick . "'});\n";
}

// Sets the series
echo "\nvar series = new Array();\n";
foreach ($info['series_labels'] as $label) {
    echo "series.push('" . $label . "');\n";
}

// Sets the series per university
foreach ($info['series'] as $university_name => $university_series) {
    echo "\nvar s_" . $university_name . " = new Array();\n";
    foreach ($university_series as $value) {
        echo "s_" . $university_name . ".push(" . $value . ");\n";
    }
}

// Groups all the series
echo "\nvar all_series = new Array();\n";
foreach ($info['series'] as $university_name => $university_series) {
    echo "all_series.push(s_" . $university_name . ");\n";
}

// Sets rows for DataTable
/*
echo "\nvar dataRows = new Array();\n";
foreach ($info['dataRows'] as $row) {
    //echo "\ndataRows.push('[";
    foreach ($row as $value){
        echo "console.log(".$value.");";
    }
}*/
echo "\nvar dataRows = new Array();\n";
foreach ($info['dataRows'] as $row) {
    echo "\nvar row = new Array();\n";
    foreach ($row as $value){
        echo "\nrow.push(".$value.");";
    }
    echo "\ndataRows.push(row);";
}
?>
console.log(dataRows);
for(var i = 0; i < dataRows.length; i++) {
    console.log("Fila"+i+": "+dataRows[i]);
    console.log("Primero "+dataRows[i][0]);
    //dataRows[i][0] = new Date(dataRows[i][0], 0, 0);
    dataRows[i][0] = dataRows[i][0].toString();
}

console.log(dataRows);

</script>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

// Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages': ['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Year');
        data.addColumn('number', 'UCR');
        data.addColumn('number', 'UNA');
        data.addColumn('number', 'ITCR');
        data.addColumn('number', 'UNED');
        data.addColumn('number', 'UTN');
        data.addRows(dataRows);
        
        // Set chart options
        var options = {
            'legend': 'left',
            'title': '<?= $indicator['Indicator']['codigo'] ?> - <?= $indicator['Indicator']['nombre'] ?>',
            'is3D': true,
            'isStacked': true,
            hAxis: {
                'title': 'Año',
                format: 'percent'},
            legend: {
                'title': 'Año',
                format: 'percent'}
                    
            //'width': 400,
            //'height': 300
        };
        
        var chartId = document.getElementById('chart');
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(chartId);
        /*google.visualization.events.addListener(chart, 'ready', function () {
            chartId.innerHTML = '<img src="' + chart.getImageURI() + '">';
            console.log(chartId.innerHTML);
        }); Insertar PNG*/
        chart.draw(data, options);
    }
</script>


<script type="text/javascript">
    $(document).ready(function () {
        // Creates the tabs
        $("#tabs").tabs();

        // Creates the table
        $("#data-table").dataTable({
            "aaData": all_series,
            "aoColumns": columns,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false
        });

        // Creates the chart
        /*var plot = $.jqplot('chart', all_series, {
         stackSeries: true,
         seriesDefaults: {
         renderer: $.jqplot.BarRenderer,
         rendererOptions: {
         fillToZero: true,
         barWidth: 100,
         barMargin: 30,
         highlightMouseDown: true
         },
         pointLabels: {
         show: true,
         stackedValue: true
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
         min: 0,
         tickInterval: 5000,
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
         //Insert image into DOM
         if (!window.chrome) {
         var imgData = $('#chart').jqplotToImageStr({}); // retrieve info from plot
         var imgElem = $('<img/>').attr('src', imgData); // create an img and add the data to it
         $('#chartImg').append(imgElem); //append data to DOM
         }*/
    });
</script>
<div id="indicador" class="container">
    <?php include_once ('singleChartResult.ctp'); ?>
</div>