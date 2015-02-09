<?=
$this->Html->script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js', array('inline' => false));
$this->Html->css('//cdn.datatables.net/1.10.4/css/jquery.dataTables.css', null, array('inline' => false));
?>


<script type="text/javascript">
    $(document).ready(function () {

        //Inicializar DataTable
        $('#table-indicators').DataTable({
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });

        // Additional methods for jquery validate
        jQuery.validator.addMethod("greater_than", function (value, element, param) {
            return this.optional(element) || ($(param).val() <= value);
        }, "Solo años mayores o iguales al inicial.");

        jQuery.validator.addMethod("gap_no_less_than", function (value, element, param) {
            return this.optional(element) || (value - $(param.element).val() >= param.value);
        }, "No se pueden graficar menos de 2 años");

        jQuery.validator.addMethod("gap_no_more_than", function (value, element, param) {
            return this.optional(element) || (value - $(param.element).val() <= param.value);
        }, "No se pueden graficar mas de 10 años.");

        // Validation for the date range
        $("#range-form").validate({
            rules: {
                start: {
                    required: true
                },
                end: {
                    required: true,
                    greater_than: "#start",
                    gap_no_less_than: {
                        element: "#start",
                        value: 1
                    },
                    gap_no_more_than: {
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
    var openRangeModal = function (name, idindicator) {
        // Sets the values for later ussage
        $("#name").val(name);
        $("#idindicator").val(idindicator);
        //Open modal
        $('#range-modal').modal('show');
    };

    var createChart = function () {
        if ($("#range-form").valid()) {
            $("#range-form").attr("action", $("#range-form").attr("action") +
                    "/" + $("#name").val() + "/" + $("#idindicator").val());
            $("#range-form").submit();
        }
    };
    
    var openIndicatorModal = function (code, name, indicatorId) {
        
        
        // Gets the user
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "indicators", "action" => "get_details")) ?>",
            data: {
                "indicatorId": indicatorId
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success === true) {
                    //Populate modal with received data
                    $("#code-name").html(code+" - "+name);
                    $("#description").html(data.descripcion);
                    $("#formula").html(data.formula);
                    $('#details-modal').modal('show');
                }
            }
        });
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
                      action="<?=
                      $this->Html->url(array("controller" => "chart",
                          "action" => "create_chart"))
                      ?>">
                    <input type="hidden" name="idindicator" id="idindicator" />
                    <input type="hidden" name="name" id="name"/>
                    <div class="form-group">
                        <label>Fecha de inicio:</label>
                        <select name="start" id="start" class="form-control">
                            <?php
                            for ($i = date('Y'); $i >= date('Y') - 15; $i--) {
                                ?>
                                <option value="<?= $i - 1 ?>"><?= $i - 1 ?></option>
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

<div id="details-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 id="modal-header" class="modal-title">Detalles del Indicador</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h4 id="code-name"></h4>
                </div>
                <div class="form-group">
                    <label>Descripción:</label><p id="description"></p>
                </div>
                <div class="form-group">
                    <label>Fórmula:</label><p id="formula"></p>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">
    <div id="lista-indicadores" class="starter-template">
        
        <table id="table-indicators" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripción y fórmula</th>
                    <th>Tipo</th>
                    <th>Graficar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($indicators as $indicator) {
                    ?>
                    <tr>
                        <td><?= $indicator['Indicator']['codigo'] ?></td>
                        <td><?= $indicator['Indicator']['nombre'] ?></td>
                        <td class="center">
                            <button onclick="openIndicatorModal(
                                            '<?= $indicator['Indicator']['codigo'] ?>',
                                            '<?= $indicator['Indicator']['nombre']?>',
                                            '<?= $indicator['Indicator']['idindicador'] ?>');"
                                    class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </td>
                        <td><?= $indicator['Indicator']['tipo'] ?></td>
                        <td class="center">
                            <button onclick="openRangeModal(
                                            '<?= strtolower($indicator['Indicator']['codigo']) ?>',
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

