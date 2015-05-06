<script type="text/javascript">
    $(document).ready(function () {
        // Validates the input form
        $("#input-form").validate();

        // Validates the xml file
        $("#xml-form").validate();

        // Creates the dialog of the xml load data
        $("#xml-dialog").dialog({
            resizable: false,
            modal: true,
            draggable: false,
            show: "fold",
            hide: "fold",
            autoOpen: false,
            height: 190
        });

        // Creates the dialog to load an specific year
        $("#load-year-dialog").dialog({
            resizable: false,
            modal: true,
            draggable: false,
            show: "fold",
            hide: "fold",
            autoOpen: false,
            height: 190
        });
    });

    /**
     * Validates the form
     */
    var submitDataForm = function () {
        if ($("#input-form").valid()) {
            $("#input-form").submit();
        }
    };

    /**
     * Opens the load from xml dialog
     */
    var showXMLDialog = function () {
        $('#xml-modal').modal('show');
    };
    
    

    /**
     * Opens the load year dialog
     */
    var showLoadYearDialog = function () {
        $("#load-year-modal").modal('show');
    };
    
    var newYear = function() {
        location.href = '<?php echo $this->Html->url( array("controller" => "data", "action" => "new_year_data")) ?>' 
    };

    /**
     * Submit the xml information
     */
    var submitXML = function () {
        if ($("#xml-form").valid()) {
            $("#xml-form").submit();
        }
    };

    /**
     * Submit the load year information
     */
    var submitLoadYear = function () {
        $("#load-year-form").submit();
    };
</script>

<div id="xml-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="modal-header-XML" class="modal-title">Rango de graficación</h4>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="xml-form" name="xml-form" method="post" action="<?= $this->Html->url( array("controller" => "data", "action" => "xml_file")) ?>">
                    <div>
                        <h5>Carga de datos mediante XML:</h5>
                        <input class="file" type="file" id="xml" name="xml" accept="text/xml" class="required" />
                    </div>
                </form>
                <label class="error" id="xml-error"></label>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" onclick="submitXML();"><span class="glyphicon glyphicon-open" aria-hidden="true"></span> Cargar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="load-year-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 id="modal-header" class="modal-title">Modificar datos previamente guardados</h4>
            </div>
            <div class="modal-body">
                <form id="load-year-form" name="load-year-form-modal" method="post" 
                      action="<?= $this->Html->url(array("controller" => "data", "action" => "load_data")) ?>">
                    <div class="form-group">
                        <label>Seleccione un año:</label>
                        <select name="year" id="year" class="form-control">
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
                <button type="button" class="btn btn-primary" onclick="submitLoadYear();">Cargar datos</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<?php
if (isset($result)) {
    if (!$result) {
        ?>
        <div id="error-action" class="alert alert-danger">    
            <p><strong>Error:</strong> <?= $message ?></p>
        </div>
        <?php
    } else {
        ?>
        <div id="success-action" class="alert alert-success">    
            <p><strong>Exito!</strong> <?= $message ?></p>
        </div>
        <?php
    }
}
?>