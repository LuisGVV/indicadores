<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class INS011_15Component extends Component {

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

        // Get all the universities
        $universities = $this->University->find('all');

        // The array of values that are part of this chart
        $d60_d61 = array();
        for ($i = 60; $i <= 61; $i++) {
            array_push($d60_d61, $this->Data->findByNombre('D' . $i));
        }


        // Calculates year by year the results
        for ($year = $start; $year <= $end; $year++) {
            $grades = array();
            for ($i = 60; $i <= 61; $i++) {
                array_push($grades, 0);
            }

            // Calculates for each univesity
            foreach ($universities as $university) {
                $uy_d60_d61 = array();

                // Gets the data involved
                foreach ($d60_d61 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the data obtained and saves the value
                    if (!empty($uy_d_)) {
                        array_push($uy_d60_d61, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d60_d61, 0);
                    }
                }

                // Checks all the obtained values and makes the calculation
                if (!empty($uy_d60_d61)) {
                    foreach ($grades as $index => $grade) {
                        $grades[$index] = $grade + $uy_d60_d61[$index];
                    }
                }
            }

            // Saves the calculations just done
            $ins011_15 = array();
            $ins011_15['year'] = $year;
            $ins011_15['value'] = $grades;

            array_push($result, $ins011_15);
        }

        // Series and ticks calculation
        $series = array();
        $ticks = array();
        foreach ($result as $year_result) {
            array_push($ticks, $year_result['year']);
            array_push($series, $year_result['value']);
        }

        // Grades calculation
        $grades = array();
        foreach ($d60_d61 as $data_d_) {
            array_push($grades, $data_d_['Data']['descripcion']);
        }

        // Saves all the information and prepares to render
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['grades'] = $grades;
        $result['view'] = 'ins011_15';

        // Returns
        return $result;
    }

}