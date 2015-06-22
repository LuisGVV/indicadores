<h1><?= $indicator['Indicator']['codigo'] ?> - <?= $indicator['Indicator']['nombre'] ?></h1>

<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#tabs-1" role="tab" data-toggle="tab">Gráfico</a>
        </li>
        <li role="presentation"> 
            <a href="#tabs-2" role="tab" data-toggle="tab">Datos</a>
        </li>
        <li role="presentation">
            <a href="#tabs-3" role="tab" data-toggle="tab">Descripción y Fórmula</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tabs-1">
            <div class="well">
                <div id="chart"></div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tabs-2">
            <table id="data-table"></table>
        </div>
        <div role="tabpanel" class="tab-pane" id="tabs-3">
            <h3>Descripción:</h3>
            <p><?= $indicator['Indicator']['descripcion'] ?></p>
            <h3>Fórmula:</h3>
            <p><?= $indicator['Indicator']['formula'] ?></p>
        </div>
    </div>
</div>