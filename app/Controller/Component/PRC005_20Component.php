<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class PRC005_20Component extends Component {

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

        // Gets the values involved in the calculation
        $d88_d97 = array();
        for ($i = 88; $i <= 97; $i++) {
            array_push($d88_d97, $this->Data->findByNombre('D' . $i));
        }

        // Does the year by year calcultion
        for ($year = $start; $year <= $end; $year++) {
            // The list of disciplines
            $disciplines = array();
            for ($i = 88; $i <= 97; $i++) {
                array_push($disciplines, 0);
            }

            // Does the calculation for each university in the current year
            foreach ($universities as $university) {
                $uy_d88_d97 = array();

                // Gets all th related data
                foreach ($d88_d97 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the obtained data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d88_d97, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d88_d97, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d88_d97)) {
                    foreach ($disciplines as $index => $discipline) {
                        $disciplines[$index] = $discipline + $uy_d88_d97[$index];
                    }
                }
            }

            // Saves the current year calculation
            $prc005_20 = array();
            $prc005_20['year'] = $year;
            $prc005_20['value'] = $disciplines;
            array_push($result, $prc005_20);
        }

        // Gets the ticks
        $ticks = array();
        foreach ($d88_d97 as $data_d_) {
            array_push($ticks, $data_d_['Data']['descripcion']);
        }

        // Gets the series
        $series = $result;

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['view'] = 'prc005_20';

        // Returns
        return $result;
    }

}