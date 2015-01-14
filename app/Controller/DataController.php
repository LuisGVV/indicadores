<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');

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
    public $uses = array('Data', 'University', 'UniversityYearData', 'Audit', 'Indicator');

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
        $indicator_array = $this->Indicator->find('all');
        //FirePHP::getInstance(true)->log($indicator_array);
        // Gets the names of the indicators
        foreach ($data_array as $index => $data) {
            foreach ($indicator_array as $indicator) { //join raro
                if ($data['Data']['indicador_idindicador'] == $indicator['Indicator']['idindicador']) {
                    $data['Data']['indicador_idindicador'] = $indicator['Indicator']['descripcion'];
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
     * XML information from file
     */
    public function xml_file() {
        // Gets the data to create the form
        $data_array = $this->Data->find('all');

        // Gets the indicators
        $indicator_array = $this->Indicator->find('all');

        // Gets the names of the indicators
        foreach ($data_array as $index => $data) {
            foreach ($indicator_array as $indicator) {
                if ($data['Data']['indicador_idindicador'] == $indicator['Indicator']['idindicador']) {
                    $data['Data']['indicador_idindicador'] = $indicator['Indicator']['descripcion'];
                    $data_array[$index] = $data;
                    break;
                }
            }
        }

        // Contains the information from the xml
        $xml_data = array();

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

            // Gets the year
            $year = (int) isset($xml_information->periodo) ? $xml_information->periodo : 0;

            // Checks if the year information was already submited
            $existing_data = $this->UniversityYearData->findByAnhoAndUniversidad_iduniversidad($year, $iduniversity);
            if ($existing_data == NULL) {
                // Creates the data from the xml
                if (isset($xml_information->totales) && isset($xml_information->totales->total)) {
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

                        array_push($xml_data, $year_data);
                    }

                    $message = 'Los datos fueron cargados correctamente.';
                } else {
                    $result = false;
                    $message = 'El formato del XML es incorrecto.';
                }
            } else {
                $result = false;
                $message = 'Ya existe informacion para el año indicado.';
            }
        } catch (Exception $e) {
            $result = false;
            $message = 'Ocurrio un error al leer el XML.  Por favor intente de nuevo.';
        }

        // Sets the information for the UI
        $this->set('all_data', $data_array);
        $this->set('xml_data', $xml_data);
        $this->set('year', $year);
        $this->set('result', $result);
        $this->set('message', $message);

        // Renders the page
        $this->render('index', 'conare');
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
        $indicator_array = $this->Indicator->find('all');

        // Gets the names of the indicators
        foreach ($data_array as $index => $data) {
            foreach ($indicator_array as $indicator) {
                if ($data['Data']['indicador_idindicador'] == $indicator['Indicator']['idindicador']) {
                    $data['Data']['indicador_idindicador'] = $indicator['Indicator']['descripcion'];
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
        
        FirePHP::getInstance(true)->log($load_data_array);

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
        FirePHP::getInstance(true)->log($this->request->data);
        // Checks if the year information was already submited
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
        }

        // Sets the result
        $this->set('result', $result);

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
        }

        // Sets the result
        $this->set('result', $result);

        // Renders the page
        $this->render('save_data', 'conare');
    }

}
