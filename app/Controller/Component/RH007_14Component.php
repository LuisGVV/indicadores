<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class RH007_14Component extends Component {

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

        // Gets the values involved in the chart
        $d58_d59 = array();
        for ($i = 58; $i <= 59; $i++) {
            array_push($d58_d59, $this->Data->findByNombre('D' . $i));
        }

        // Does the year by year calculation
        for ($year = $start; $year <= $end; $year++) {
            // The grades
            $grades = array();
            for ($i = 58; $i <= 59; $i++) {
                array_push($grades, 0);
            }

            // Does the calculation for each university in the current year
            foreach ($universities as $university) {
                $uy_d58_d59 = array();

                // Gets all the data
                foreach ($d58_d59 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the obtained data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d58_d59, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d58_d59, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d58_d59)) {
                    foreach ($grades as $index => $grade) {
                        $grades[$index] = $grade + $uy_d58_d59[$index];
                    }
                }
            }

            // Saves the current year result
            $rh007_13 = array();
            $rh007_13['year'] = $year;
            $rh007_13['value'] = $grades;

            array_push($result, $rh007_13);
        }

        // Gets the series and ticks
        $series = array();
        $ticks = array();
        foreach ($result as $year_result) {
            array_push($ticks, $year_result['year']);
            array_push($series, $year_result['value']);
        }

        // Gets the grades
        $grades = array();
        foreach ($d58_d59 as $data_d_) {
            array_push($grades, $data_d_['Data']['descripcion']);
        }

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['grades'] = $grades;
        $result['view'] = 'rh007_14';

        // Returns
        return $result;
    }

}