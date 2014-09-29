<?= $this->Html->css('datatables/jquery.dataTables_themeroller.css') ?>
<?= $this->Html->script('datatables/jquery.dataTables.js') ?>

<script type="text/javascript">
    $(document).ready(function(){
        // Sets the buttons
        $("button").button();
        
        // Creates the table
        $("#audit-table").dataTable({
            "bJQueryUI": true,
            "bAutoWidth": true,
            "bPaginate": true
        });
        
        // Removes the hidden class of the table
        $("#audit-table").removeClass("hidden"); 
    });
</script>

<h1>Auditoria</h1>

<table id="audit-table" class="hidden">
    <thead>
        <tr>
            <th>Dato</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Valor</th>
            <th>Año</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($audit as $audit_data) {
            ?>
            <tr>
                <td><?= $audit_data['Audit']['dato_iddato'] ?></td>
                <td><?= $audit_data['Audit']['usuario_idusuario'] ?></td>
                <td><?= $audit_data['Audit']['fecha'] ?></td>
                <td><?= $audit_data['Audit']['valor'] ?></td>
                <td><?= $audit_data['Audit']['anho'] ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>