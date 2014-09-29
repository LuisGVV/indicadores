<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class RH003_9Component extends Component {

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

        // Gets the data involved with the chart
        $d27_d29 = array();
        for ($i = 27; $i <= 29; $i++) {
            array_push($d27_d29, $this->Data->findByNombre('D' . $i));
        }

        // Calculates for each year
        for ($year = $start; $year <= $end; $year++) {
            // The grades
            $grades = array();
            for ($i = 27; $i <= 29; $i++) {
                array_push($grades, 0);
            }

            // For each year does the calculation for each university
            foreach ($universities as $university) {
                // The array o the data of the university
                $uy_d27_d29 = array();

                // Gets all the data
                foreach ($d27_d29 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the data obtained and save it
                    if (!empty($uy_d_)) {
                        array_push($uy_d27_d29, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d27_d29, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d27_d29)) {
                    foreach ($grades as $index => $grade) {
                        $grades[$index] = $grade + $uy_d27_d29[$index];
                    }
                }
            }

            // Saves the year calculation
            $rh003_9 = array();
            $rh003_9['year'] = $year;
            $rh003_9['value'] = $grades;
            array_push($result, $rh003_9);
        }

        // Calculates the series and ticks
        $series = array();
        $ticks = array();
        foreach ($result as $year_result) {
            array_push($ticks, $year_result['year']);
            array_push($series, $year_result['value']);
        }

        // Calculates the grades
        $grades = array();
        foreach ($d27_d29 as $data_d_) {
            array_push($grades, $data_d_['Data']['descripcion']);
        }

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['grades'] = $grades;
        $result['view'] = 'rh003_9';

        // Returns
        return $result;
    }

}