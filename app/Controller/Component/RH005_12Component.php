<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class RH005_12Component extends Component {

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

        // Gets the data involved with the chart calculation for male
        $d51_d53 = array();
        for ($i = 51; $i <= 53; $i++) {
            array_push($d51_d53, $this->Data->findByNombre('D' . $i));
        }

        // Gets the data involved with the chart calculation for female
        $d54_d56 = array();
        for ($i = 54; $i <= 56; $i++) {
            array_push($d54_d56, $this->Data->findByNombre('D' . $i));
        }

        // Does the calculation for male year by year
        $male = array();
        for ($year = $start; $year <= $end; $year++) {
            // The responsibles list
            $responsibles = array();
            for ($i = 51; $i <= 56; $i++) {
                array_push($responsibles, 0);
            }

            // For each year does the caculation for each university
            foreach ($universities as $university) {
                $uy_d51_d53 = array();

                // Gets the data involved
                foreach ($d51_d53 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d51_d53, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d51_d53, 0);
                    }
                }

                // Checks all the data and oes the calculation
                if (!empty($uy_d51_d53)) {
                    foreach ($responsibles as $index => $responsible) {
                        $responsibles[$index] = $responsible + $uy_d51_d53[$index];
                    }
                }
            }

            // Saves the year male calculation
            $rh005_12 = array();
            $rh005_12['year'] = $year;
            $rh005_12['value'] = $responsibles;
            array_push($male, $rh005_12);
        }

        // Does the female calculation year by year
        $female = array();
        for ($year = $start; $year <= $end; $year++) {
            // The list of responsibles
            $responsibles = array();
            for ($i = 54; $i <= 56; $i++) {
                array_push($responsibles, 0);
            }

            // For each year makes the calculation for each university
            foreach ($universities as $university) {
                $uy_d54_d56 = array();

                // Gets all the data involved
                foreach ($d54_d56 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the recently obtained data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d54_d56, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d54_d56, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d54_d56)) {
                    foreach ($responsibles as $index => $responsible) {
                        $responsibles[$index] = $responsible + $uy_d54_d56[$index];
                    }
                }
            }

            // Saves the year calculation for female
            $rh005_12 = array();
            $rh005_12['year'] = $year;
            $rh005_12['value'] = $responsibles;
            array_push($female, $rh005_12);
        }

        // Gets the ticks
        $ticks = array();
        foreach ($d54_d56 as $data_d_) {
            $description = $data_d_['Data']['descripcion'];
            $description_split = preg_split('/ grado /', $description);
            $tick = $description_split[1];

            array_push($ticks, $tick);
        }

        // Gets the series label
        $series_label = array('Hombres', 'Mujeres');

        // Gets all the grades
        $grades = array();
        foreach ($d51_d53 as $data_d_) {
            array_push($grades, $data_d_['Data']['descripcion']);
        }

        // Saves the complete result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = array('male' => $male, 'female' => $female);
        $result['series_label'] = $series_label;
        $result['view'] = 'rh005_12';

        // Returns
        return $result;
    }

}