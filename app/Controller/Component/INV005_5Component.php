<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class INV005_5Component extends Component {

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

        // Gets the 5 data values involved in the calculation
        $data_d1 = $this->Data->findByNombre('D1');
        $data_d2 = $this->Data->findByNombre('D2');
        $data_d3 = $this->Data->findByNombre('D3');
        $data_d4 = $this->Data->findByNombre('D4');
        $data_d5 = $this->Data->findByNombre('D5');

        // Calculates year by year
        for ($year = $start; $year <= $end; $year++) {
            // The calculation of the inv001 value
            $inv001_1_universities = 0;
            
            // The calclation of d2 d4
            $d2d4_universities = 0;

            // The calculation of d5
            $d5_universities = 0;

            // For each year calculates he values for each university
            foreach ($universities as $university) {
                // Gets all the 5 values
                $uy_d1 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d1['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d2 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d2['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d3 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d3['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d4 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d4['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d5 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d5['Data']['iddato'], $university['University']['iduniversidad'], $year);

                // Verifies the values and does the calculations
                if (!empty($uy_d1) && !empty($uy_d2) && !empty($uy_d3) && !empty($uy_d4)) {
                    $uy_d1_value = $uy_d1['UniversityYearData']['valor'];
                    $uy_d2_value = $uy_d2['UniversityYearData']['valor'];
                    $uy_d3_value = $uy_d3['UniversityYearData']['valor'];
                    $uy_d4_value = $uy_d4['UniversityYearData']['valor'];
                    $uy_d5_value = $uy_d5['UniversityYearData']['valor'];

                    $inv001_1_universities += $uy_d1_value + $uy_d2_value + $uy_d3_value + $uy_d4_value;
                    /*SUBTOTAL --> Liquidaciones equipo e infraestructura
                     *  y gastos en recurso humano - EXTERNOS
                    */
                    $d2d4_universities += $uy_d2_value + $uy_d4_value;
                    $d5_universities += $uy_d5_value;
                }
            }

            // Saves the current year calculation
            $inv005_5 = array();
            $inv005_5['year'] = $year;
            if ($d2d4_universities == 0) {
                $inv005_5['value'] = 0;
            } else {
                $inv005_5['value'] = ($d5_universities / $d2d4_universities) * 100;
            }
            array_push($result, $inv005_5);
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
        $result['view'] = 'inv005_5';

        // Returns
        return $result;
    }

}