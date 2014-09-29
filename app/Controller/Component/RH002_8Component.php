<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class RH002_8Component extends Component {

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

        // Gets the unique involved data
        $data_d26 = $this->Data->findByNombre('D26');

        // Starts the calculation year by year
        for ($year = $start; $year <= $end; $year++) {
            // The total for each university
            $university_totals = array();

            // For each yeardoes the calculation for each university
            foreach ($universities as $university) {
                // Gets the university data
                $uy_d26 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d26['Data']['iddato'], $university['University']['iduniversidad'], $year);

                // Checks the data and does the calculation
                if (!empty($uy_d26)) {
                    $uy_d26_value = $uy_d26['UniversityYearData']['valor'];
                    array_push($university_totals, $uy_d26_value);
                } else {
                    array_push($university_totals, 0);
                }
            }

            // Saves the current year calculation
            $rh002_8 = array();
            $rh002_8['year'] = $year;
            $rh002_8['value'] = $university_totals;
            array_push($result, $rh002_8);
        }

        // Gets the series and ticks
        $ticks = array();
        $series = array();
        foreach ($result as $year_result) {
            array_push($ticks, $year_result['year']);
            array_push($series, $year_result['value']);
        }

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['universities'] = $universities;
        $result['view'] = 'rh002_8';

        // Returns
        return $result;
    }

}