<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Controller for the chart pages
 */
class ChartController extends AppController {

    /**
     * Name of the controller 
     */
    public $name = 'Chart';

    /**
     * Models used by the controler 
     */
    public $uses = array('Indicator');

    /**
     * The components used in this controller 
     */
    public $components = array('INS011_15', 'INV001_1', 'INV002_2', 'INV003_3', 'INV004_4', 'INV005_5', 'INV006_6', 'RH001_7', 'RH002_8', 'RH003_9', 'RH004_10', 'RH004_11', 'RH005_12', 'RH006_13', 'RH007_14', 'PRC001_16', 'PRC002_17', 'PRC003_18', 'PRC004_19', 'PRC005_20');

    /**
     * Get values requested from database to build up chart
     */
    public function create_chart() {
        // Get the arguments to create the chart
        $arguments = func_get_args();

        // Gets the values that represent the chart
        $name = $arguments[0];
        $idindicator = $arguments[1];

        // Gets the indicator
        $indicator = $this->Indicator->findByIdindicador($idindicator);

        // Gets the component name
        $component_name = strtoupper($name) . '_' . $idindicator;

        // Get the start and end dates
        $start = $this->request->data['start'];
        $end = $this->request->data['end'];

        // Gets the values
        $info = $this->{$component_name}->chart($start, $end);

        // Renders the view
        $this->set('indicator', $indicator);
        //FirePHP::getInstance(true)->log($indicator);
        $this->set('info', $info);
        $this->render($info['view'], 'conare');
    }

}
