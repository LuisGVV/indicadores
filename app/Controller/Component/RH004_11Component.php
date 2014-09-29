<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class RH004_11Component extends Component {

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

        // The data involved with the chart
        $d36_d50 = array();
        for ($i = 36; $i <= 50; $i++) {
            array_push($d36_d50, $this->Data->findByNombre('D' . $i));
        }

        // Does the calcultion year by year
        for ($year = $start; $year <= $end; $year++) {
            // The array of disciplines
            $disciplines = array();
            for ($i = 36; $i <= 50; $i++) {
                array_push($disciplines, 0);
            }

            // For each year does the calculation for each university
            foreach ($universities as $university) {
                $uy_d36_d50 = array();

                // Gets the data involved
                foreach ($d36_d50 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the obtained data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d36_d50, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d36_d50, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d36_d50)) {
                    foreach ($disciplines as $index => $discipline) {
                        $disciplines[$index] = $discipline + $uy_d36_d50[$index];
                    }
                }
            }

            // Saves the current year calculation
            $rh004_11 = array();
            $rh004_11['year'] = $year;
            $rh004_11['value'] = $disciplines;
            array_push($result, $rh004_11);
        }

        // Gets the ticks and series labels
        $ticks = array();
        $series_label = array();
        foreach ($d36_d50 as $data_d_) {
            $description = $data_d_['Data']['descripcion'];
            $description_split = preg_split('/ Grado /', $description);
            $tick = $description_split[0];
            $grade = $description_split[1];

            if (!in_array($tick, $ticks)) {
                array_push($ticks, $tick);
            }
            if (!in_array($grade, $series_label)) {
                array_push($series_label, $grade);
            }
        }

        // Gets the series
        $series = array();
        foreach ($result as $year_result) {
            $value_grouped = array();
            for ($i = 0; $i < count($year_result['value']); $i++) {
                $year_result_grouped = array();

                array_push($year_result_grouped, $year_result['value'][$i]);
                array_push($year_result_grouped, $year_result['value'][$i++]);
                array_push($year_result_grouped, $year_result['value'][$i++]);

                array_push($value_grouped, $year_result_grouped);
            }
            $year_result['value'] = $value_grouped;
            array_push($series, $year_result);
        }

        // Saves the complete result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = $series;
        $result['series_label'] = $series_label;
        $result['view'] = 'rh004_11';

        // Returns
        return $result;
    }

}