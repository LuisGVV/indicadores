<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');
App::uses('PHPExcel','Vendor');

/**
 * Controller for the home page of the application
 */
class DataController extends AppController {

    /**
     * Name of the controller 
     */
    public $name = 'Data';

    /**
     * Models used by the controler 
     */
    public $uses = array('Data', 'University', 'UniversityYearData', 'Audit', 'Indicator', 'DataType');

    /**
     * The components used in this controller 
     */
    public $components = array('Session');

    /**
     * Default url
     */
    public function index() {
        // Gets the data
        $data_array = $this->Data->find('all');

        // Gets the indicators
        $dataType_array = $this->DataType->find('all');
        //FirePHP::getInstance(true)->log($indicator_array);
        //FirePHP::getInstance(true)->log($dataType_array);
        // Gets the names of the indicators
        foreach ($data_array as $index => $data) {
            foreach ($dataType_array as $dataType) { //join raro
                if ($data['Data']['indicador_idindicador'] == $dataType['DataType']['idtipodato']) {
                    $data['Data']['indicador_idindicador'] = $dataType['DataType']['tipo'];
                    $data_array[$index] = $data;
                    break;
                }
                //FirePHP::getInstance(true)->log($indicator);
            }
        }

        // Sets the data into the request
        $this->set('all_data', $data_array);

        // Renders the page
        $this->render('index', 'conare');
    }
    
    /**
     * Insert new year Data
     * /
     */
    public function new_year_data () {
        // Gets the data
        $data_array = $this->Data->find('all');

        // Gets the indicators
        $dataType_array = $this->DataType->find('all');
        //FirePHP::getInstance(true)->log($indicator_array);
        //FirePHP::getInstance(true)->log($dataType_array);
        // Gets the names of the indicators
        foreach ($data_array as $index => $data) {
            foreach ($dataType_array as $dataType) { //join raro
                if ($data['Data']['indicador_idindicador'] == $dataType['DataType']['idtipodato']) {
                    $data['Data']['indicador_idindicador'] = $dataType['DataType']['tipo'];
                    $data_array[$index] = $data;
                    break;
                }
                //FirePHP::getInstance(true)->log($indicator);
            }
        }
        // Sets the data into the request
        $this->set('all_data', $data_array);
        $this->render('newYear_data', 'conare');
    }
    

    /**
     * XML information from file
     */
    public function xml_file() {
        // Gets the data to create the form
        $data_array = $this->Data->find('all');

        $dataType_array = $this->DataType->find('all');
        //FirePHP::getInstance(true)->log($indicator_array);
        //FirePHP::getInstance(true)->log($dataType_array);
        // Gets the names of the indicators
        foreach ($data_array as $index => $data) {
            foreach ($dataType_array as $dataType) { //join raro
                if ($data['Data']['indicador_idindicador'] == $dataType['DataType']['idtipodato']) {
                    $data['Data']['indicador_idindicador'] = $dataType['DataType']['tipo'];
                    $data_array[$index] = $data;
                    break;
                }
            }
        }

        // Contains the information from the xml
        $xml_data = array();
        $save_audit_array = array();

        // The year
        $year = 0;

        // The result of the parsing
        $result = true;

        // The message to be shown
        $message = '';

        try {
            // Gets the university id
            $user = $this->Session->read('user');
            $iduniversity = $user['User']['universidad_iduniversidad'];

            // Gets the file temporal upload name
            $filename = $this->request->params['form']['xml']['tmp_name'];

            // Gets the xml information
            $xml_information = simplexml_load_file($filename);
            $xml_test = new DOMDocument();
            $xml_test->load($filename);
            $xml_schema = './xml/formatoIndicadores.xsd';
            libxml_use_internal_errors(true);
            $check_schema = $xml_test->schemaValidate($xml_schema);
            //FirePHP::getInstance(true)->log($check_schema);

            foreach ($xml_information->periodo as $periodo) {
                $year = (int) $xml_information->periodo;
            }
            
            if($check_schema){
                // Checks if the year information was already submited
                $existing_data = $this->UniversityYearData->findByAnhoAndUniversidad_iduniversidad($year, $iduniversity);
                if ($existing_data == NULL ) {
                    // Creates the data from the xml
                    if (isset($xml_information->totales) && isset($xml_information->totales->total) &&
                            isset($xml_information->periodo)) {
                        foreach ($xml_information->periodo as $periodo) {
                            $year = (int) $xml_information->periodo;
                        }
                        foreach ($xml_information->totales->total as $total) {
                            // Gets the id and the value
                            $data_name = (string) $total->id;
                            $data_value = (int) $total->valor;
                            $data = $this->Data->findByNombre($data_name);

                            $year_data = array();
                            $year_data['dato_iddato'] = $data['Data']['iddato'];
                            $year_data['universidad_iduniversidad'] = $iduniversity;
                            $year_data['anho'] = $year;
                            $year_data['valor'] = $data_value;

                            // Saves the audit information
                            $audit_data = array();
                            $audit_data['valor'] = $data_value;
                            $audit_data['anho'] = $year;
                            $audit_data['fecha'] = date("Y-m-d H:i:s");
                            $audit_data['usuario_idusuario'] = $user['User']['idusuario'];
                            $audit_data['dato_iddato'] = $data['Data']['iddato'];

                            array_push($save_audit_array, $audit_data);
                            array_push($xml_data, $year_data);
                        }
                         
                        $this->UniversityYearData->saveMany($xml_data);
                        $this->Audit->saveMany($save_audit_array);
                        $result = true;
                        $message = 'Los datos encontrados en el archivo fueron cargados correctamente. Se encontraron datos para el año '.$year;
                    } else {
                        $result = false;
                        $message = 'El formato del XML es incorrecto.';
                    }
                } else {
                    $result = false;
                    $message = 'Ya existe informacion para el año '.$year.'. Cargue los datos y modifíquelos manualmente o bien borre todos los datos para ese año.';
                }
            }else{
                $result = false;
                $message = 'El formato del XML es incorrecto. Por favor revise de nuevo el archivo. Recuerde que las mayúsculas y minúsculas son distintas';
            }
        } catch (Exception $e) {
            $errors = libxml_get_errors();
            $result = false;
            $message = 'Ooops error interno del servidor. Por favor intente de nuevo o contacte al administrador del sitio. ';
            //$message1 = $errors;
        }

        // Sets the information for the UI
        $this->set('all_data', $data_array);
        $this->set('xml_data', $xml_data);
        $this->set('year', $year);
        $this->set('result', $result);
        $this->set('message', $message);

        // Renders the page
        $this->render('xml_data', 'conare');
    }

    /**
     * Loads the specific year data
     */
    public function load_data() {
        // The result
        $result = true;

        // The message for the ser
        $message = '';

        // Gets the data
        $data_array = $this->Data->find('all');

        // Gets the indicators
        $dataType_array = $this->DataType->find('all');

        // Gets the names of the indicators
        foreach ($data_array as $index => $data) {
            foreach ($dataType_array as $dataType) { //join raro
                if ($data['Data']['indicador_idindicador'] == $dataType['DataType']['idtipodato']) {
                    $data['Data']['indicador_idindicador'] = $dataType['DataType']['tipo'];
                    $data_array[$index] = $data;
                    break;
                }
            }
        }

        // Gets the university id
        $user = $this->Session->read('user');
        $iduniversity = $user['User']['universidad_iduniversidad'];

        // Gets the year
        $year = $this->request->data['year'];

        // Checks if the year information was already submited
        $existing_data = $this->UniversityYearData->findAllByAnhoAndUniversidad_iduniversidad($year, $iduniversity);
        if ($existing_data != NULL && !empty($existing_data)) {
            // Creates an array to push it into the database
            $load_data_array = array();

            // Checks each data into the submit and add it to save the value later
            foreach ($existing_data as $data) {
                // Gets all the required information
                $university_year_data = $data['UniversityYearData'];

                // Pushes the information
                array_push($load_data_array, $university_year_data);
            }

            // Sets the message
            $message = 'Los datos para el año ' . $year . ' fueron cargados correctamente.';
        } else {
            // Sets the result
            $result = false;
            $load_data_array = null;
            $message = 'No existen datos para el año indicado.';
        }

        // Sets the information for the UI
        $this->set('all_data', $data_array);
        $this->set('load_data', $load_data_array);
        $this->set('year', $year);
        $this->set('result', $result);
        $this->set('message', $message);

        //FirePHP::getInstance(true)->log($load_data_array);

        // Renders the page
        $this->render('load_data', 'conare');
    }

    /**
     * Saves the data
     */
    public function save_data() {
        // The result
        $result = false;

        // Gets the data
        $data_array = $this->Data->find('all');

        // Gets the university id
        $user = $this->Session->read('user');
        $iduniversity = $user['User']['universidad_iduniversidad'];

        // Gets the year
        $year = $this->request->data['year'];
        //FirePHP::getInstance(true)->log($this->request->data);
        // Checks if the year information was already submited
        $existing_data = $this->UniversityYearData->findByAnhoAndUniversidad_iduniversidad($year, $iduniversity);
        if ($existing_data == NULL) {
            // Creates an array to push it into the database
            $save_data_array = array();
            $save_audit_array = array();

            // Checks each data into the submit and add it to save the value later
            foreach ($data_array as $data) {
                // Gets all the required information
                if($this->request->data['iddato_' . $data['Data']['iddato']] != null){
                    $university_year_data = array();
                    $university_year_data['dato_iddato'] = $data['Data']['iddato'];
                    $university_year_data['universidad_iduniversidad'] = $iduniversity;
                    $university_year_data['anho'] = $year;
                    $university_year_data['valor'] = $this->request->data['iddato_' . $data['Data']['iddato']];

                    // Saves the audit information
                    $audit_data = array();
                    $audit_data['valor'] = $university_year_data['valor'];
                    $audit_data['anho'] = $university_year_data['anho'];
                    $audit_data['fecha'] = date("Y-m-d H:i:s");
                    $audit_data['usuario_idusuario'] = $user['User']['idusuario'];
                    $audit_data['dato_iddato'] = $university_year_data['dato_iddato'];

                    // Pushes the information
                    array_push($save_data_array, $university_year_data);
                    array_push($save_audit_array, $audit_data);
                }
            }
            //FirePHP::getInstance(true)->log($save_data_array);
            //FirePHP::getInstance(true)->log($save_audit_array);
            // Saves the information
            $this->UniversityYearData->saveMany($save_data_array);
            $this->Audit->saveMany($save_audit_array);
            
            // The result is success
            $result = true;
            $message = 'Los datos fueron subidos correctamente';
        }else{
            
        }
        

        // Sets the result
        $this->set('result', $result);
        $this->set('message', $message);

        // Renders the page
        $this->render('save_data', 'conare');
    }

    /**
     * Updates the data
     */
    public function update_data() {
        // The result
        $result = false;

        // Gets the data
        $data_array = $this->Data->find('all');

        // Gets the university id
        $user = $this->Session->read('user');
        $iduniversity = $user['User']['universidad_iduniversidad'];

        // Gets the year
        $year = $this->request->data['year'];

        // Deletes the existing data
        $this->UniversityYearData->deleteAll(array('UniversityYearData.anho' => $year, 'UniversityYearData.universidad_iduniversidad' => $iduniversity), false);

        // Checks if the year information was deleted
        $existing_data = $this->UniversityYearData->findByAnhoAndUniversidad_iduniversidad($year, $iduniversity);
        if ($existing_data == NULL) {
            // Creates an array to push it into the database
            $save_data_array = array();
            $save_audit_array = array();

            // Checks each data into the submit and add it to save the value later
            foreach ($data_array as $data) {
                // Gets all the required information
                $university_year_data = array();
                $university_year_data['dato_iddato'] = $data['Data']['iddato'];
                $university_year_data['universidad_iduniversidad'] = $iduniversity;
                $university_year_data['anho'] = $year;
                $university_year_data['valor'] = $this->request->data['iddato_' . $data['Data']['iddato']];

                // Saves the audit information
                $audit_data = array();
                $audit_data['valor'] = $university_year_data['valor'];
                $audit_data['anho'] = $university_year_data['anho'];
                $audit_data['fecha'] = date("Y-m-d H:i:s");
                $audit_data['usuario_idusuario'] = $user['User']['idusuario'];
                $audit_data['dato_iddato'] = $university_year_data['dato_iddato'];

                // Pushes the information
                array_push($save_data_array, $university_year_data);
                array_push($save_audit_array, $audit_data);
            }

            // Saves the information
            $this->UniversityYearData->saveMany($save_data_array);
            $this->Audit->saveMany($save_audit_array);

            // The result is success
            $result = true;
            $message = 'Los datos del para el año <strong>'.$year.'</strong> fueron actualizados.';
        }else{
            $message = 'Ooops al parecer hay un error interno.';
        }

        // Sets the result
        $this->set('result', $result);
        $this->set('message', $message);

        // Renders the page
        $this->render('save_data', 'conare');
    }

}
