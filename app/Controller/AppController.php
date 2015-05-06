<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * The components used in this controller 
     */
    public $components = array('Session', 'URLCheck');

    /**
     * Models used by the controler 
     */
    public $uses = array('User', 'UserType', 'Access');

    /**
     * Handles the access system
     */
    public function beforeFilter() {
        parent::beforeFilter();

        // Verifies the access
        $this->verifyAccess();
    }

    /**
     * Verifies the url access for the application
     */
    private function verifyAccess() {
        // Sets the url check component
        $this->set('URLCheck', $this->URLCheck);

        // Gets the session information
        $access = $this->Session->read('access');
        if (empty($access)) {
            $access = $this->Access->findAllByTipo_usuario_idtipo_usuario(1);
            $this->Session->write('access', $access);
        }
        
        // Sets the access
        $this->set('access', $access);

        // Gets the user information
        $user = $this->Session->read('user');

        // Sets the user for later
        if (!empty($user)) {
            $this->set('user', $user);
        }
        //FirePHP::getInstance(true)->log($user);

        // Gets the current url
        $url = $this->request->url;
        if (strlen($url) == 0) {
            $url = 'home';
        }
        
        /*
        FirePHP::getInstance(true)->log($access);
        FirePHP::getInstance(true)->log($url);
        */    
        // Checks the access
        $success = $this->URLCheck->analizeAccess($access, $url);

        // Checks the success
        if (!$success) {
            // Access denied
            $this->redirect('/error/access_denied');
        }
    }

}
