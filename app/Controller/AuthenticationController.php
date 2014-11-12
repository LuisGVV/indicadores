<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Controller for the home page of the application
 */
class AuthenticationController extends AppController {

    /**
     * Name of the controller 
     */
    public $name = 'Authentication';

    /**
     * Models used by the controler 
     */
    public $uses = array('User', 'UserType', 'Access');

    /**
     * Components used
     */
    public $components = array('Session');

    /**
     * Login handler
     */
    public function login() {
        // The result
        $result = array();

        // Indicates error
        $result['success'] = false;

        // Gets the post information
        $email = $this->request->data['email'];
        $password = md5($this->request->data['password']);

        // Gets the user
        $user = $this->User->findByEmailAndPassword($email, $password);
        
        // Checks the user
        if (!empty($user)) {
            // Gets the user type
            $user_type = $this->UserType->findByIdtipo_usuario($user['User']['tipo_usuario_idtipo_usuario']);

            // Gets the access
            $access = $this->Access->findAllByTipo_usuario_idtipo_usuario($user_type['UserType']['idtipo_usuario']);

            // Destroys the session
            $this->Session->destroy();

            // Activates the session
            $this->Session->write('user', $user);
            $this->Session->write('user_type', $user_type);
            $this->Session->write('access', $access);

            // Indicates success
            $result['success'] = true;
        }

        // Sends the response
        $this->response->type('application/json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

    /**
     * Logouts the user (if any) from the system
     */
    public function logout() {
        // The result
        $result = array();

        // Destroys the session
        $this->Session->destroy();

        // Indicates success
        $result['success'] = true;

        // Sends the response
        $this->response->type('application/json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

}
