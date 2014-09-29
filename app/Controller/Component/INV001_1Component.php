<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class INV001_1Component extends Component {

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

        // Gets the 4 values involved in the chart
        $data_d1 = $this->Data->findByNombre('D1');
        $data_d2 = $this->Data->findByNombre('D2');
        $data_d3 = $this->Data->findByNombre('D3');
        $data_d4 = $this->Data->findByNombre('D4');

        // Starts the calculation year by year
        for ($year = $start; $year <= $end; $year++) {
            // Calculation array to save results
            $calculation = array();

            // Calculates on each year for each university
            foreach ($universities as $university) {
                // Total for the final summatory
                $university_total = 0;

                // Gets the 4 values
                $uy_d1 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d1['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d2 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d2['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d3 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d3['Data']['iddato'], $university['University']['iduniversidad'], $year);
                $uy_d4 = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d4['Data']['iddato'], $university['University']['iduniversidad'], $year);

                // Checks the valus and obtain do the math
                if (!empty($uy_d1) && !empty($uy_d2) && !empty($uy_d3) && !empty($uy_d4)) {
                    $uy_d1_value = $uy_d1['UniversityYearData']['valor'];
                    $uy_d2_value = $uy_d2['UniversityYearData']['valor'];
                    $uy_d3_value = $uy_d3['UniversityYearData']['valor'];
                    $uy_d4_value = $uy_d4['UniversityYearData']['valor'];

                    $university_total = $uy_d1_value + $uy_d2_value + $uy_d3_value + $uy_d4_value;
                }

                // Saves the calculation per university
                $university_calculation = array();
                $university_calculation['university'] = $university['University']['acronimo'];
                $university_calculation['total'] = $university_total;

                array_push($calculation, $university_calculation);
            }

            // Saves the information
            $inv001_1 = array();
            $inv001_1['year'] = $year;
            $inv001_1['data'] = $calculation;

            array_push($result, $inv001_1);
        }

        // Ticks and series arrays (including labels)
        $ticks = array();
        $series_labels = array();
        $series = array();

        // Gets the labels
        foreach ($result as $year_result) {
            array_push($ticks, $year_result['year']);
            foreach ($year_result['data'] as $year_data) {
                if (!in_array($year_data['university'], $series_labels)) {
                    array_push($series_labels, $year_data['university']);
                }
            }
        }

        // Gets the series
        foreach ($series_labels as $label) {
            $university_series = array();
            foreach ($result as $year_result) {
                foreach ($year_result['data'] as $year_data) {
                    if (strcmp($year_data['university'], $label) == 0) {
                        array_push($university_series, $year_data['total']);
                    }
                }
            }
            $series[$label] = $university_series;
        }

        // Sets the results
        $result = array();
        $result['ticks'] = $ticks;
        $result['series_labels'] = $series_labels;
        $result['series'] = $series;
        $result['view'] = 'inv001_1';

        // Returns
        return $result;
    }

}