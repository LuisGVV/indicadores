<?=
$this->Html->script('//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js', array('inline' => false));
$this->Html->css('//cdn.datatables.net/1.10.4/css/jquery.dataTables.css', null, array('inline' => false));
?>

<script>
    $(document).ready(function () {
        //Inicializar DataTable
        $('#table-audit').DataTable({
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });

    var showAuditDetails = function (auditId) {
        // Cleans the dialog 
        $("#audit-details-modal").modal('show');

        // Gets the user
        $.ajax({
            type: "post",
            url: "<?= $this->Html->url(array("controller" => "audit", "action" => "get_audit")) ?>",
            data: {
                "auditId": auditId
            },
            dataTypeString: "json",
            success: function (data) {
                if (data.success === true) {
                    //set data response inside modal
                    $("#nombre-apellido").html(data.nombre+" "+data.apellido);
                    $("#universidad").html(data.universidad);
                    $("#fecha").html(data.fecha);
                    $("#anho").html(data.anho);
                    $("#codigo-descripcion").html(data.dato+" - "+data.descripcionDato);
                    $("#valor").html(data.valor);
                }
            }
        })
    }
</script>

<div class="container">
    <h1>Auditorias</h1>
    <div id="lista-indicadores" class="starter-template">
        <table id="table-audit" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Dato</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Año</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($audit as $auditoria) {
                    ?>
                    <tr>
                        <td><?= $auditoria['Data']['nombre'] ?></td>
                        <td><?= $auditoria['Data']['descripcion'] ?></td>
                        <td><?= $auditoria['Audit']['valor'] ?></td>
                        <td><?= $auditoria['Audit']['anho'] ?></td>
                        <td class="center">
                            <button class="btn btn-default btn-sm" onclick="showAuditDetails(
                                                '<?= $auditoria['Audit']['idauditoria'] ?>');">
                                <span class="glyphicon glyphicon-list-alt"></span>
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

<div id="audit-details-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="modal-header" class="modal-title">Detalles de la Auditoría</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nombre y apellido:</label><p id="nombre-apellido"></p>
                </div>
                <div class="form-group">
                    <label>Universidad:</label><p id="universidad"></p>
                </div>
                <div class="form-group">
                    <label>Fecha que se ingresó valor:</label><p id="fecha"></p>
                </div>
                <div class="form-group">
                    <label>Año:</label><p id="anho"></p>
                </div>
                <div class="form-group">
                    <label>Código y descripción:</label><p id="codigo-descripcion"></p>
                </div>
                <div class="form-group">
                    <label>Valor ingresado:</label><p id="valor"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
