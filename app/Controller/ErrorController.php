<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Controller for error pages
 */
class ErrorController extends AppController {

    /**
     * Name of the controller 
     */
    public $name = 'Error';

    /**
     * Models used by the controler 
     */
    public $uses = array();

    /**
     * Access denied error page
     */
    public function access_denied() {
        // Renders the page
        $this->render('access_denied', 'conare');
    }

}
