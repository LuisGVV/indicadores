<div class="container">
    
        <h1 class="page-header">Ingreso de datos</h1>
        <?php include_once('common/actions.php'); ?>
        <?php include_once('common/dialogs.php'); ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <form id="input-form" method="post" action="<?= $this->Html->url(array("controller" => "data", "action" => "save_data")) ?>">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Año
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <select name="year" id="year" class="form-control">
                            <?php for ($i = date('Y'); $i >= date('Y') - 15; $i--) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        <!--Aquí es donde van todos los datos para el año-->
        <?php
        $heading = '';
        foreach ($all_data as $data) { 
            if($heading != $data['Data']['indicador_idindicador']){ 
                if($heading != ''){ ?>
                    </div>
                    </div>
                    </div>

                <?php
                } 
                ?>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?= $data['Data']['iddato'] ?>">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $data['Data']['iddato'] ?>" aria-expanded="true" aria-controls="collapse<?= $data['Data']['iddato'] ?>">
                        <?= $data['Data']['indicador_idindicador'] ?>
                    </a>
                </h4>
            </div>
            <div id="collapse<?= $data['Data']['iddato'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $data['Data']['iddato'] ?>">
                <div class="panel-body">
                    <div class="form-group">
                        <input id="iddato_<?= $data['Data']['iddato'] ?>" name="iddato_<?= $data['Data']['iddato'] ?>" type="text" placeholder="<?= $data['Data']['nombre'] ?> - <?= $data['Data']['descripcion'] ?>" class="form-control">
                    </div>
                    <?php
                $heading = $data['Data']['indicador_idindicador'];
            }else{
            ?>
                <div class="form-group">
                    <input id="iddato_<?= $data['Data']['iddato'] ?>" name="iddato_<?= $data['Data']['iddato'] ?>" type="text" placeholder="<?= $data['Data']['nombre'] ?> - <?= $data['Data']['descripcion'] ?>" class="form-control">
                </div>
    <?php   } ?>
        <?php } ?>
            </form>
             
        </div>
    
            
</div>
<button type="button" class="btn btn-primary"  onclick="submitDataForm();">Guardar</button>

