<script>
var indicators_insumo = function(){
    location.href = '<?php echo $this->Html->url( 
            array("controller" => "indicators", "action" => "indicators_insumo")) ?>';
};
var indicators_proceso = function(){
    location.href = '<?php echo $this->Html->url( 
            array("controller" => "indicators", "action" => "indicators_proceso")) ?>';
};
var indicators_producto = function(){
    location.href = '<?php echo $this->Html->url( 
            array("controller" => "indicators", "action" => "indicators_producto")) ?>';
};
</script>


<div class="container">
    <div class="jumbotron">
        <h2>Indicadores de Investigación</h2>
        <p>
            La Comisión de Vicerrectores de Investigación del Consejo Nacional 
            de Rectores (CONARE) se honra en presentar a las comunidades 
            universitaria, nacional e internacional el sitio de publicación 
            sobre los indicadores de investigación interuniversitaria estatal de
            las cuatro instituciones de educación superior que conforman este 
            Consejo.
        </p>
<!--        <p>
            La expectativa es que esta publicación se convierta en un insumo esperado, año tras año, por quienes ostentan cargos que demandan la toma de decisiones; pero también por aquellos y aquellas académicas que gustan del análisis crítico de la situación y/o tendencias de la investigación universitaria. Análisis que permita concluir sobre los logros y limitaciones alrededor del proceso de investigación en nuestras instituciones de educación superior universitaria estatal.
        </p>-->
    </div>
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Insumo</h2>
            <p>Recursos financieros que se invierten en investigación y por los
                recursos humanos que participan en su gestión</p>
            <p><a class="btn btn-default" role="button"
                  onclick="indicators_insumo();">Ver indicadores&raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Proceso</h2>
            <p>Indicadores bibliométricos, patentes y licencias</p>
            <p><a class="btn btn-default" role="button" 
                  onclick="indicators_proceso();">Ver indicadores&raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Producto</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
            <p><a class="btn btn-default" role="button" 
                  onclick="indicators_producto();">Ver indicadores&raquo;</a></p>
        </div>
    </div>
</div>
