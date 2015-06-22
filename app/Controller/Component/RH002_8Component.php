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

        // Gets the 2 values related
        $data_d24 = $this->Data->findByNombre('D24');
        $data_d25 = $this->Data->findByNombre('D25');

        // Does the calculation year by year
        for ($year = $start; $year <= $end; $year++) {
            // Calculation for male per university
            $university_male = 0;

            // Calculation for female per university
            $university_female = 0;

            // For each year does the calculation of male and female per university
            foreach ($universities as $university) {
                // Gets the values involved
                $uy_d24 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d24['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d25 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d25['Data']['iddato'], $university['University']['iduniversidad'], $year);

                // Checks the values and does the calculation
                if (!empty($uy_d24) && !empty($uy_d25)) {
                    $uy_d24_value = $uy_d24['UniversityYearData']['valor'];
                    $uy_d25_value = $uy_d25['UniversityYearData']['valor'];

                    $university_male += $uy_d24_value;
                    $university_female += $uy_d25_value;
                }
            }

            // Saves the year calculation
            $rh001_7 = array();
            $rh001_7['year'] = $year;
            $rh001_7['value'] = array();
            array_push($rh001_7['value'], $university_male);
            array_push($rh001_7['value'], $university_female);
            array_push($result, $rh001_7);
        }

        // Gets the ticks and series
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
        $result['view'] = 'rh001_7';

        // Returns
        return $result;
    }

}