<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class PRC003_18Component extends Component {

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

        // Gets the values for the chart
        $d67_d73 = array();
        for ($i = 67; $i <= 73; $i++) {
            array_push($d67_d73, $this->Data->findByNombre('D' . $i));
        }

        // Does the year by year calculation
        for ($year = $start; $year <= $end; $year++) {
            // The list of disciplines
            $disciplines = array();
            for ($i = 67; $i <= 73; $i++) {
                array_push($disciplines, 0);
            }

            // Does the calculation for each university in the current year
            foreach ($universities as $university) {
                $uy_d67_d73 = array();

                // Obtains all the related data
                foreach ($d67_d73 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d67_d73, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d67_d73, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d67_d73)) {
                    foreach ($disciplines as $index => $discipline) {
                        $disciplines[$index] = $discipline + $uy_d67_d73[$index];
                    }
                }
            }

            // Saves the current year calculation
            $prc003_18 = array();
            $prc003_18['year'] = $year;
            $prc003_18['value'] = $disciplines;
            array_push($result, $prc003_18);
        }

        // Gets the ticks
        $ticks = array();
        foreach ($d67_d73 as $data_d_) {
            array_push($ticks, $data_d_['Data']['descripcion']);
        }

        // Gets the series
        $series = $result;

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['view'] = 'prc003_18';

        // Returns
        return $result;
    }

}