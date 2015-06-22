<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Controller for the home page of the application
 */
class IndicatorsController extends AppController {

    /**
     * Name of the controller 
     */
    public $name = 'Indicators';

    /**
     * Models used by the controler 
     */
    public $uses = array('Indicator');

    /**
     * The components used in this controller 
     */
    public $components = array('Session', 'URLCheck');

    /**
     * Displays the list of indicators available to the user
     */
    public function indicators_list() {
        // Gets the session information
        $access = $this->Session->read('access');
        
        // Gets all the indicators
        $indicators = $this->Indicator->find('all');

        // Checks the access to view every indicator
        foreach ($indicators as $index => $indicator) {
            // Forms the indicator url
            $url = 'chart/create_chart/' . $indicator['Indicator']['codigo'] . '/' . $indicator['Indicator']['idindicador'];

            // Checks the access
            if (!$this->URLCheck->analizeAccess($access, $url)) {
                unset($indicators[$index]);
            }
        }

        // Sets the list of indicators
        $this->set('indicators', $indicators);

        // Renders the list
        $this->render('indicators_list', 'conare');
    }
    
    public function indicators_insumo() {
        // Gets the session information
        $access = $this->Session->read('access');
        
        // Gets all the indicators
        $indicators = $this->Indicator->findAllBytipo('Insumo');
        FirePHP::getInstance(true)->log($indicators);
        // Checks the access to view every indicator
        foreach ($indicators as $index => $indicator) {
            // Forms the indicator url
            $url = 'chart/create_chart/' . $indicator['Indicator']['codigo'] . '/' . $indicator['Indicator']['idindicador'];

            // Checks the access
            if (!$this->URLCheck->analizeAccess($access, $url)) {
                unset($indicators[$index]);
            }
        }

        // Sets the list of indicators
        $this->set('indicators', $indicators);

        // Renders the list
        $this->render('indicators_list', 'conare');
    }
    public function indicators_proceso() {
        // Gets the session information
        $access = $this->Session->read('access');
        
        // Gets all the indicators
        $indicators = $this->Indicator->findAllBytipo('Proceso');
        FirePHP::getInstance(true)->log($indicators);
        // Checks the access to view every indicator
        foreach ($indicators as $index => $indicator) {
            // Forms the indicator url
            $url = 'chart/create_chart/' . $indicator['Indicator']['codigo'] . '/' . $indicator['Indicator']['idindicador'];

            // Checks the access
            if (!$this->URLCheck->analizeAccess($access, $url)) {
                unset($indicators[$index]);
            }
        }

        // Sets the list of indicators
        $this->set('indicators', $indicators);

        // Renders the list
        $this->render('indicators_list', 'conare');
    }
    public function indicators_producto() {
        // Gets the session information
        $access = $this->Session->read('access');
        
        // Gets all the indicators
        $indicators = $this->Indicator->findAllBytipo('Producto');
        FirePHP::getInstance(true)->log($indicators);
        // Checks the access to view every indicator
        foreach ($indicators as $index => $indicator) {
            // Forms the indicator url
            $url = 'chart/create_chart/' . $indicator['Indicator']['codigo'] . '/' . $indicator['Indicator']['idindicador'];

            // Checks the access
            if (!$this->URLCheck->analizeAccess($access, $url)) {
                unset($indicators[$index]);
            }
        }

        // Sets the list of indicators
        $this->set('indicators', $indicators);

        // Renders the list
        $this->render('indicators_list', 'conare');
    }
    
    public function get_details() {
        // The result
        $result = array();

        // Indicates error
        $result['success'] = false;

        // Gets the indicator
        $indicatorId = $this->request->data['indicatorId'];
        $indicator = $this->Indicator->findByidindicador($indicatorId);
        
        // Saves the details to display about indicator
        $result['descripcion'] = $indicator['Indicator']['descripcion'];
        $result['formula'] = $indicator['Indicator']['formula'];
        
        // Sets result success as true
        $result['success'] = true;

        // Sends the response
        $this->response->type('application/json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

}
