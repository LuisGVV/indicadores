<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class INV003_3Component extends Component {

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
        
        // Gets the 4 data involved in the chart
        $data_d1 = $this->Data->findByNombre('D1');
        $data_d2 = $this->Data->findByNombre('D2');
        $data_d3 = $this->Data->findByNombre('D3');
        $data_d4 = $this->Data->findByNombre('D4');

        // Starts the calculation year by year
        for ($year = $start; $year <= $end; $year++) {
            // The inv001 calculation
            $inv001_1_universities = 0;
            
            // The d2 d4 calculation
            $d2d4_universities = 0;
            
            // For each year calculates the values for each university
            foreach ($universities as $university) {
                // Gets the data
                $uy_d1 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d1['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d2 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d2['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d3 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d3['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d4 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d4['Data']['iddato'], $university['University']['iduniversidad'], $year);

                // Checks the data and does the calculation
                if (!empty($uy_d1) && !empty($uy_d2) && !empty($uy_d3) && !empty($uy_d4)) {
                    $uy_d1_value = $uy_d1['UniversityYearData']['valor'];
                    $uy_d2_value = $uy_d2['UniversityYearData']['valor'];
                    $uy_d3_value = $uy_d3['UniversityYearData']['valor'];
                    $uy_d4_value = $uy_d4['UniversityYearData']['valor'];

                    $inv001_1_universities += $uy_d1_value + $uy_d2_value + $uy_d3_value + $uy_d4_value;
                    $d2d4_universities += $uy_d1_value + $uy_d3_value;
                }
            }

            // Saves the year data
            $inv002_2 = array();
            $inv002_2['year'] = $year;
            if ($inv001_1_universities == 0) {
                $inv002_2['value'] = 0;
            } else {
                $inv002_2['value'] = ($d2d4_universities / $inv001_1_universities) * 100;
            }
            array_push($result, $inv002_2);
        }

        // Creates the ticks and series
        $ticks = array();
        $series = array();
        foreach ($result as $year_result) {
            array_push($ticks, $year_result['year']);
            array_push($series, $year_result['value']);
        }

        // The the result completed
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['view'] = 'inv003_3';

        // Returns
        return $result;
    }

}