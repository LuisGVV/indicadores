<?php include_once('common/dialogs.php'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#input-form").formaccordion();
        $("#accordion-container").accordion({
            heightStyle: "content"
        });
    });
</script>

<div>
    <h1>Ingreso de datos</h1>
    <div class="data-actions">
        <button onclick="showXMLDialog();">Cargar datos de archivo XML</button>
        <button onclick="showLoadYearDialog();">Modificar datos de un año especifico</button>
    </div>
    <div id="input-data" class="form ui-widget ui-widget-content ui-corner-all">
        <div>
            <form name="input-form" id="input-form" method="post" action="<?= $this->Html->url(array("controller" => "data", "action" => "update_data")) ?>">
                <div group="Año">
                    <label>Año</label>
                    <select name="year" id="year">
                        <?php
                        for ($i = date('Y'); $i >= date('Y') - 50; $i--) {
                            ?>
                            <option 
                                value="<?= $i ?>"
                                <?= isset($year) && $i == $year ? 'selected="selected"' : '' ?>><?= $i ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <?php
                foreach ($all_data as $index => $data) {
                    ?>
                    <div group="<?= $data['Data']['indicador_idindicador'] ?>">
                        <label><?= $data['Data']['nombre'] ?> - <?= $data['Data']['descripcion'] ?></label>
                        <input id="iddato_<?= $data['Data']['iddato'] ?>" name="iddato_<?= $data['Data']['iddato'] ?>" 
                               value="<?= isset($load_data) && !empty($load_data) ? $load_data[$index]['valor'] : '' ?>"
                               class="required number" min="0" max="10"/>
                    </div>
                    <?php
                }
                ?>
            </form>
            <label class="error" id="login-error"></label>
            <div class="action">
                <button onclick="submitDataForm();">Actualizar</button>
            </div>
        </div>
    </div>
</div>