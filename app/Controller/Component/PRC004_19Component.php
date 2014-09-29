<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Calculates a specific chart information
 */
class PRC004_19Component extends Component {

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

        // Gets the chart related values for central
        $d74_d80 = array();
        for ($i = 74; $i <= 80; $i++) {
            array_push($d74_d80, $this->Data->findByNombre('D' . $i));
        }

        // Gets the chart related values for regional
        $d81_d87 = array();
        for ($i = 81; $i <= 87; $i++) {
            array_push($d81_d87, $this->Data->findByNombre('D' . $i));
        }

        // Does the year by year calculation for central
        $central = array();
        for ($year = $start; $year <= $end; $year++) {
            // The responsibles list
            $responsibles = array();
            for ($i = 74; $i <= 80; $i++) {
                array_push($responsibles, 0);
            }

            // Does the calculation for each university
            foreach ($universities as $university) {
                $uy_d74_d80 = array();

                // Gets all the related data
                foreach ($d74_d80 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks he obtained data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d74_d80, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d74_d80, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d74_d80)) {
                    foreach ($responsibles as $index => $responsible) {
                        $responsibles[$index] = $responsible + $uy_d74_d80[$index];
                    }
                }
            }

            // Saves the current year calculation for central
            $prc004_19 = array();
            $prc004_19['year'] = $year;
            $prc004_19['value'] = $responsibles;
            array_push($central, $prc004_19);
        }

        // Does the year by year calculation for regional
        $regional = array();
        for ($year = $start; $year <= $end; $year++) {
            // The list of responsibles
            $responsibles = array();
            for ($i = 81; $i <= 87; $i++) {
                array_push($responsibles, 0);
            }

            // Does the each university calculation
            foreach ($universities as $university) {
                $uy_d81_d87 = array();

                // Gets all the related data
                foreach ($d81_d87 as $data_d_) {
                    $uy_d_ = $this->UniversityYearData->findByDato_iddatoAndUniversidad_iduniversidadAndAnho($data_d_['Data']['iddato'], $university['University']['iduniversidad'], $year);

                    // Checks the data and saves it
                    if (!empty($uy_d_)) {
                        array_push($uy_d81_d87, $uy_d_['UniversityYearData']['valor']);
                    } else {
                        array_push($uy_d81_d87, 0);
                    }
                }

                // Checks all the data and does the calculation
                if (!empty($uy_d81_d87)) {
                    foreach ($responsibles as $index => $responsible) {
                        $responsibles[$index] = $responsible + $uy_d81_d87[$index];
                    }
                }
            }

            // Saves the current year data for regional
            $prc004_19 = array();
            $prc004_19['year'] = $year;
            $prc004_19['value'] = $responsibles;
            array_push($regional, $prc004_19);
        }

        // Gets the ticks
        $ticks = array();
        foreach ($d81_d87 as $data_d_) {
            $description = $data_d_['Data']['descripcion'];
            $description_split = preg_split('/ de la /', $description);
            $tick = $description_split[0];

            array_push($ticks, $tick);
        }

        // Gets the series labels
        $series_label = array('Central', 'Regional');

        // Gets the grades
        $grades = array();
        foreach ($d74_d80 as $data_d_) {
            array_push($grades, $data_d_['Data']['descripcion']);
        }

        // Saves the final result
        $result = array();
        $result['ticks'] = $ticks;
        $result['series'] = array('central' => $central, 'regional' => $regional);
        $result['series_label'] = $series_label;
        $result['view'] = 'prc004_19';

        // Returns
        return $result;
    }

}