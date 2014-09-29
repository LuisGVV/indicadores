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
    public $name = 'Pages';

    /**
     * Models used by the controler 
     */
    public $uses = array();

    /**
     * Default url
     */
    public function index() {
        // Renders the page
        $this->render('index', 'conare');
    }

}
