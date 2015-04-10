<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class RH006_13Component extends Component {

    /**
     * Constructor
     */
    public function __construct() {
        $this->University = ClassRegistry::init('University');
        $this->Data = ClassRegistry::init('Data');
        $this->UniversityYearData = ClassRegistry::init('UniversityYearData');
    }

    /**
     * Gets the chart information
     * @param type $start
     * @param type $end
     */
    public function chart($start, $end) {
        // The result array
        $result = array();

        // Gets all the universities
        $universities = $this->University->find('all');

        // Gets the value related to the chart
        $data_d57 = $this->Data->findByNombre('D57');
        
        // Does the calculation for each year
        for ($year = $start; $year <= $end; $year++) {
            $calculation = 0;

            // This seems kind of redundant as it isn't necessary to access data university by university...
            // For each year does the calculation for each university
            foreach ($universities as $university) {
                $uy_d57 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d57['Data']['iddato'], $university['University']['iduniversidad'], $year);
                
                // Checks the obtained data and does the calculation
                if (!empty($uy_d57)) {
                    $calculation += $uy_d57['UniversityYearData']['valor'];
                }
            }

            // Finishes the calculation according to the formula
            $total = $calculation / 40;

            // Saves the year value
            $rh006_13 = array();
            $rh006_13['year'] = $year;
            $rh006_13['total'] = $total;
            array_push($result, $rh006_13);
        }

        // Adds the view to the result
        $result['view'] = 'rh006_13';

        

        // Returns
        return $result;
    }
}