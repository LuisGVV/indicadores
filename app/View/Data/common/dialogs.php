<script type="text/javascript">
    $(document).ready(function(){
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
    var submitDataForm = function(){
        if($("#input-form").valid()){
            $("#input-form").submit();
        }
    };
    
    /**
     * Opens the load from xml dialog
     */
    var showXMLDialog = function(){
        $("#xml-dialog").dialog("open");
    };
    
    /**
     * Opens the load year dialog
     */
    var showLoadYearDialog = function(){
        $("#load-year-dialog").dialog("open");
    };
    
    /**
     * Submit the xml information
     */
    var submitXML = function(){
        if($("#xml-form").valid()){
            $("#xml-form").submit();
        }
    };
    
    /**
     * Submit the load year information
     */
    var submitLoadYear = function(){
        $("#load-year-form").submit();
    };
</script>

<div id="xml-dialog" class="hidden">
    <div class="form">
        <span>Cargar datos</span>
        <div>
            <form enctype="multipart/form-data" id="xml-form" name="xml-form" method="post" action="<?= $this->Html->url(array("controller" => "data", "action" => "xml_file")) ?>">
                <div>
                    <label>Archivo XML:</label>
                    <input type="file" id="xml" name="xml" accept="text/xml" class="required" />
                </div>
            </form>
            <label class="error" id="xml-error"></label>
            <div class="action">
                <button onclick="submitXML();">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div id="load-year-dialog" class="hidden">
    <div class="form">
        <span>Cargar datos</span>
        <div>
            <form id="load-year-form" name="load-year-form" method="post" action="<?= $this->Html->url(array("controller" => "data", "action" => "load_data")) ?>">
                <div>
                    <label>Seleccione un año:</label>
                    <select name="year" id="year" class="required">
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
            <label class="error" id="xml-error"></label>
            <div class="action">
                <button onclick="submitLoadYear();">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($result)) {
    if (!$result) {
        ?>
        <div class="ui-widget">
            <div style="margin-top: 10px; padding: 0 .7em;" class="ui-state-error ui-corner-all">
                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                    <strong>Error:</strong> <?= $message ?></p>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="ui-widget">
            <div style="margin-top: 10px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all">
                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                    <strong>Exito!</strong> <?= $message ?></p>
            </div>
        </div>
        <?php
    }
}
?>