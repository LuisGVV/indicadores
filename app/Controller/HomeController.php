<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Controller for the home page of the application
 */
class HomeController extends AppController {

    /**
     * Name of the controller 
     */
    public $name = 'Home';

    /**
     * Models used by the controler 
     */
    public $uses = array();

    /**
     * The components used in this controller 
     */
    public $components = array('Session');

    /**
     * Default url
     */
    public function index() {
        // Renders the page
        $this->render('index', 'conare');
    }

}
