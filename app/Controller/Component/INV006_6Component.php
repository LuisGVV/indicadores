<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class INV006_6Component extends Component {

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

        // Gets the list of universities
        $universities = $this->University->find('all');

        // Gets the values involved in the process
        $d6_d23 = array();
        for ($i = 6; $i <= 26; $i++) {
            array_push($d6_d23, $this->Data->findByNombre('D' . $i));
        }

        // Starts the calculation year by year
        for ($year = $start; $year <= $end; $year++) {
            // Array to save values related to each discipline
            $disciplines = array();
            for ($i = 6; $i <= 26; $i++) {
                array_push($disciplines, 0);
            }

            // For each year gets the values for each university
            foreach ($universities as $university) {
                // The array with the specific values for the univesity being analyzed
                $uy_d6_d23 = array();

                // Gets all the values
                foreach ($d6_d23 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the obtained value
                    if (!empty($uy_d_)) {
                        array_push($uy_d6_d23, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d6_d23, 0);
                    }
                }

                // Checks all the values and does the calculation
                if (!empty($uy_d6_d23)) {
                    foreach ($disciplines as $index => $discipline) {
                        $disciplines[$index] = $discipline + $uy_d6_d23[$index];
                    }
                }
            }

            // Saves the current year calculation
            $inv006_6 = array();
            $inv006_6['year'] = $year;
            $inv006_6['value'] = $disciplines;
            array_push($result, $inv006_6);
        }

        // Gets the ticks
        $ticks = array();
        foreach ($d6_d23 as $data_d_) {
            array_push($ticks, $data_d_['Data']['descripcion']);
        }

        // Gets the series
        $series = $result;

        // Saves the complete result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['view'] = 'inv006_6';

        // Returns
        return $result;
    }

}