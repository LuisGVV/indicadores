<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class PRC001_16Component extends Component {

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

        // Gets the values involved with the chart
        $d62_d65 = array();
        for ($i = 62; $i <= 65; $i++) {
            array_push($d62_d65, $this->Data->findByNombre('D' . $i));
        }

        // Does the year by year calcuation
        for ($year = $start; $year <= $end; $year++) {
            // The grades list
            $grades = array();
            for ($i = 62; $i <= 65; $i++) {
                array_push($grades, 0);
            }

            // Does the calculation for each university in the current year
            foreach ($universities as $university) {
                $uy_d62_d65 = array();

                // Get the data involved
                foreach ($d62_d65 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Check the obtained data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d62_d65, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d62_d65, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d62_d65)) {
                    foreach ($grades as $index => $grade) {
                        $grades[$index] = $grade + $uy_d62_d65[$index];
                    }
                }
            }

            // Saves the current year calculation
            $prc001_16 = array();
            $prc001_16['year'] = $year;
            $prc001_16['value'] = $grades;
            array_push($result, $prc001_16);
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
        foreach ($d62_d65 as $data_d_) {
            array_push($grades, $data_d_['Data']['descripcion']);
        }

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['grades'] = $grades;
        $result['view'] = 'prc001_16';

        // Returns
        return $result;
    }

}