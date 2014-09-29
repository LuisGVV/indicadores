<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class RH004_10Component extends Component {

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

        // Gets the data related with the chart
        $d30_d35 = array();
        for ($i = 30; $i <= 35; $i++) {
            array_push($d30_d35, $this->Data->findByNombre('D' . $i));
        }

        // Does the year by year calculation
        for ($year = $start; $year <= $end; $year++) {
            //The list of disciplines
            $disciplines = array();
            for ($i = 30; $i <= 35; $i++) {
                array_push($disciplines, 0);
            }

            // For each years does the calculation for each university
            foreach ($universities as $university) {
                // The array of values
                $uy_d30_d35 = array();

                // Gets the values
                foreach ($d30_d35 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the obtained value and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d30_d35, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d30_d35, 0);
                    }
                }

                // Checks all the values and oes the calculation
                if (!empty($uy_d30_d35)) {
                    foreach ($disciplines as $index => $discipline) {
                        $disciplines[$index] = $discipline + $uy_d30_d35[$index];
                    }
                }
            }

            // Saves the year result
            $rh004_10 = array();
            $rh004_10['year'] = $year;
            $rh004_10['value'] = $disciplines;
            array_push($result, $rh004_10);
        }

        // Gets the ticks
        $ticks = array();
        foreach ($d30_d35 as $data_d_) {
            array_push($ticks, $data_d_['Data']['descripcion']);
        }

        // Gets the series
        $series = $result;

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['view'] = 'rh004_10';

        // Returns
        return $result;
    }

}