<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#indicators-table").dataTable({
            "bJQueryUI": true,
            "bAutoWidth": true,
            "bPaginate": false,
            "aoColumns": [
                null,
                null,
                null,
                { "sWidth": "25px", "bSortable": false }
            ]
        });
        
        //Creates the dialog for the date range
        $("#range-dialog").dialog({
            resizable: false,
            modal: true,
            draggable: false,
            show: "fold",
            hide: "fold",
            autoOpen: false,
            height: 250
        });
        
        // Additional methods for jquery validate
        jQuery.validator.addMethod("greater_than", function(value, element, param) {
            return this.optional(element) || ($(param).val() <= value); 
        }, "Solo años mayores o iguales al inicial.");
        
        jQuery.validator.addMethod("gap_no_less_than", function(value, element, param) {
            return this.optional(element) || (value - $(param.element).val() >= param.value); 
        }, "No se pueden graficar menos de 2 años");
        
        jQuery.validator.addMethod("gap_no_more_than", function(value, element, param) {
            return this.optional(element) || (value - $(param.element).val() <= param.value); 
        }, "No se pueden graficar mas de 10 años.");
        
        // Validation for the date range
        $("#range-form").validate({
            rules: {
                start:{
                    required: true
                },
                end:{
                    required: true,
                    greater_than: "#start",
                    gap_no_less_than : {
                        element: "#start",
                        value: 1
                    },
                    gap_no_more_than : {
                        element: "#start",
                        value: 10
                    }
                }
            }
        });
    });
    
    /**
     * Opens the range dialog
     */
    var openRangeDialog = function(name, idindicator){
        // Sets the values for later ussage
        $("#name").val(name);
        $("#idindicator").val(idindicator);
        // Opens the dialog
        $("#range-dialog").dialog("open");
    };
    
    /**
     * Creates the indicated chart in the indicated range
     */
    /*
    var createChart = function(){
        if($("#range-form").valid()){
            $("#range-form").attr("action", $("#range-form").attr("action") + 
                    "/" + $("#name").val() + "/" + $("#idindicator").val());
            $("#range-form").submit();
        }
    };*/
    
    var openRangeModal = function(name, idindicator){
        // Sets the values for later ussage
        $("#name").val(name);
        $("#idindicator").val(idindicator);
        //Open modal
        $('#range-modal').modal('show');
    };
    
    var createChart = function(){
        if($("#range-form").valid()){
            $("#range-form").attr("action", $("#range-form").attr("action") + 
                    "/" + $("#name").val() + "/" + $("#idindicator").val());
            $("#range-form").submit();
        }
    };
        
    
</script>

<div id="range-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="modal-header" class="modal-title">Rango de graficación</h4>

            </div>
            <div class="modal-body">
                <form id="range-form" name="range-modal" method="post" 
                      action="<?= $this->Html->url(array("controller" => "chart", 
                          "action" => "create_chart")) ?>">
                    <input type="hidden" name="idindicator" id="idindicator" />
                    <input type="hidden" name="name" id="name"/>
                    <div class="form-group">
                        <label>Fecha de inicio:</label>
                        <select name="start" id="start" class="form-control">
                            <?php
                            for ($i = date('Y'); $i >= date('Y') - 15; $i--) {
                                ?>
                                <option value="<?= $i-1 ?>"><?= $i-1 ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha de finalizacion:</label>
                        <select name="end" id="end" class="form-control">
                            <?php
                            for ($i = date('Y'); $i >= date('Y') - 15; $i--) {
                                ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="createChart();">Graficar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="container">
    <div id="lista-indicadores" class="starter-template">
        <div class="panel panel-default">
            <div id="table-panel" class="panel-heading"><strong>Lista de indicadores</strong></div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Tipo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($indicators as $indicator) {
                        ?>
                        <tr>
                            <td><?= $indicator['Indicator']['nombre'] ?></td>
                            <td><?= $indicator['Indicator']['descripcion'] ?></td>
                            <td><?= $indicator['Indicator']['tipo'] ?></td>
                            <td class="center">
                                <button onclick="openRangeModal(
                                            '<?= strtolower($indicator['Indicator']['nombre']) ?>',
                                            '<?= $indicator['Indicator']['idindicador'] ?>');"
                                        class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-stats"></span>
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--
<div id="range-dialog" class="hidden">
    <div class="form">
        <span>Rango de graficacion</span>
        <div>
            <form id="range-form" name="range-form" method="post" action="<?= $this->Html->url(array("controller" => "chart", "action" => "create_chart")) ?>">
                <input type="hidden" name="idindicator" id="idindicator" />
                <input type="hidden" name="name" id="name"/>
                <div>
                    <label>Fecha de inicio:</label>
                    <select name="start" id="start">
                        <?php
                        for ($i = date('Y'); $i >= date('Y') - 15; $i--) {
                            ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Fecha de finalizacion:</label>
                    <select name="end" id="end">
                        <?php
                        for ($i = date('Y'); $i >= date('Y') - 15; $i--) {
                            ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </form>
            <label class="error" id="range-error"></label>
            <div class="action">
                <button onclick="createChart();">Aceptar</button>
            </div>
        </div>
    </div>
</div>-->

