<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class PRC002_17Component extends Component {

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

        // Gets the universities
        $universities = $this->University->find('all');

        // Gets the 5 values related to the chart
        $data_d62 = $this->Data->findByNombre('D62');
        $data_d63 = $this->Data->findByNombre('D63');
        $data_d64 = $this->Data->findByNombre('D64');
        $data_d65 = $this->Data->findByNombre('D65');
        $data_d66 = $this->Data->findByNombre('D66');

        // Does the year by year calculatio
        for ($year = $start; $year <= $end; $year++) {
            // The calculation of prc002
            $prc002_17_universities = 0;

            // The calculation of d66
            $d66_university = 0;

            // Does the calculation for each university on each year
            foreach ($universities as $university) {
                // Gets the related data
                $uy_d62 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d62['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d63 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d63['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d64 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d64['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d65 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d65['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d66 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d66['Data']['iddato'], $university['University']['iduniversidad'], $year);

                // Checks the obtained data and does the calculation
                if (!empty($uy_d62) && !empty($uy_d63) && !empty($uy_d64) && !empty($uy_d65) && !empty($uy_d66)) {
                    $uy_d62_value = $uy_d62['UniversityYearData']['valor'];
                    $uy_d63_value = $uy_d63['UniversityYearData']['valor'];
                    $uy_d64_value = $uy_d64['UniversityYearData']['valor'];
                    $uy_d65_value = $uy_d65['UniversityYearData']['valor'];
                    $uy_d66_value = $uy_d66['UniversityYearData']['valor'];

                    $prc002_17_universities += $uy_d62_value + $uy_d63_value + $uy_d64_value + $uy_d65_value;
                    $d66_university += $uy_d66_value;
                }
            }

            // Saves the current year calculation
            $prc002_17 = array();
            $prc002_17['year'] = $year;
            if ($prc002_17_universities == 0) {
                $prc002_17['value'] = 0;
            } else {
                $prc002_17['value'] = ($uy_d66_value / $prc002_17_universities) * 100;
            }
            array_push($result, $prc002_17);
        }

        // Gets the ticks and series
        $ticks = array();
        $series = array();
        foreach ($result as $year_result) {
            array_push($ticks, $year_result['year']);
            array_push($series, $year_result['value']);
        }

        // Gets the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['view'] = 'prc002_17';

        // Returns
        return $result;
    }

}