<?php

/**
 * Model for url access
 */
class Audit extends AppModel {

    public $useTable = 'auditoria';
    public $primaryKey = 'idauditoria';
    public $belongsTo = array(
        'Data' => array(
            'className' => 'Data',
            'foreignKey' => 'dato_iddato'
        )
    );
}