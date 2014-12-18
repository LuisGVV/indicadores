<?php

App::uses('AppController', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Controller for the system page
 */
class SystemController extends AppController {

    /**
     * Name of the controller 
     */
    public $name = 'System';

    /**
     * Models used by the controler 
     */
    public $uses = array('User', 'UserType', 'University', 'Audit', 'Data');

    /**
     * Default url
     */
    public function index() {
        // Renders the page
        // Gets the list of all users
        $users = $this->User->find('all');

        // Gets the user types
        $user_types = $this->UserType->find('all');
        unset($user_types[0]);

        // Gets all the universities
        $universities = $this->University->find('all');

        // Sets the user information
        $this->set('users', $users);
        $this->set('user_types', $user_types);
        $this->set('universities', $universities);
        $this->render('index', 'conare');
    }

    /**
     * Users handle of the system
     */
    public function users() {
        // Gets the list of all users
        $users = $this->User->find('all');

        // Gets the user types
        $user_types = $this->UserType->find('all');
        unset($user_types[0]);

        // Gets all the universities
        $universities = $this->University->find('all');

        // Sets the user information
        $this->set('users', $users);
        $this->set('user_types', $user_types);
        $this->set('universities', $universities);

        // Renders the page
        $this->render('index', 'conare');
    }
    
    /**
     * Handles the audit information (just shows the information)
     */
    public function audit(){
        // Gets the list of all users
        $audit = $this->Audit->find('all');
        
        // Gets the data and user
        foreach($audit as $index => $audit_data){
            $user = $this->User->findByIdusuario($audit_data['Audit']['usuario_idusuario']);
            $audit_data['Audit']['usuario_idusuario'] = $user['User']['email'];
            
            $data = $this->Data->findByIddato($audit_data['Audit']['dato_iddato']);
            $audit_data['Audit']['dato_iddato'] = $data['Data']['nombre'];
            
            $audit[$index] = $audit_data;
        }

        // Sets the user information
        $this->set('audit', $audit);

        // Renders the page
        $this->render('audit', 'ajax');
    }

    /**
     * Deletes a user from the system
     */
    public function delete_user() {
        // The result
        $result = array();

        // Gets the user id
        $user_id = $this->request->data['user_id'];

        // Eliminates the user
        $this->User->delete($user_id, true);

        // Indicates success
        $result['success'] = true;

        // Sends the response
        $this->response->type('application/json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

    /**
     * Gets the user information
     */
    public function get_user() {
        // The result
        $result = array();

        // Indicates error
        $result['success'] = false;

        // Gets the id
        $idusuario = $this->request->data['id'];

        // Gets the user
        $user = $this->User->findByIdusuario($idusuario);

        // Saves the user and indicates success
        $result['user'] = $user;
        $result['success'] = true;

        // Sends the response
        $this->response->type('application/json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

    /**
     * Creates a new user
     */
    public function create_user() {
        // The result
        $result = array();

        // Indicates error
        $result['success'] = false;

        // Gets the value
        $first_name = $this->request->data['first_name'];
        $last_name = $this->request->data['last_name'];
        $email = $this->request->data['email'];
        $password = md5($this->request->data['password']);
        $type = $this->request->data['usertype_id'];
        $university = $this->request->data['university_id'];

        // Checks the user type and university association
        if ($type == 2 && $university == NULL) {
            $result['errorMessage'] = 'Un editor debe estar asociado a una universidad.';
        } else if ($type == 3 && $university != NULL) {
            $result['errorMessage'] = 'Un administrador no debe estar asociado a ninguna universidad.';
        } else {
            // Creates the user array
            $user = array();
            $user['nombre'] = $first_name;
            $user['apellido'] = $last_name;
            $user['email'] = $email;
            $user['password'] = $password;
            $user['tipo_usuario_idtipo_usuario'] = $type;
            $user['universidad_iduniversidad'] = $university;

            // Saves the user
            $this->User->save($user);

            // Indicates success
            $result['success'] = true;
        }

        // Sends the response
        $this->response->type('application/json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

    /**
     * Updates the user
     */
    public function update_user() {
        // The result
        $result = array();

        // Indicates error
        $result['success'] = false;

        // Gets the value
        $id_user = $this->request->data['id'];
        $first_name = $this->request->data['first_name'];
        $last_name = $this->request->data['last_name'];
        $email = $this->request->data['email'];
        $password = md5($this->request->data['password']);
        $type = $this->request->data['usertype_id'];
        $university = $this->request->data['university_id'];

        // Checks the user type and university association
        if ($type == 2 && $university == NULL) {
            $result['errorMessage'] = 'Un editor debe estar asociado a una universidad.';
        } else if ($type == 3 && $university != NULL) {
            $result['errorMessage'] = 'Un administrador no debe estar asociado a ninguna universidad.';
        } else {
            // Creates the user array
            $user = array();
            $user['idusuario'] = $id_user;
            $user['nombre'] = $first_name;
            $user['apellido'] = $last_name;
            $user['email'] = $email;
            $user['password'] = $password;
            $user['tipo_usuario_idtipo_usuario'] = $type;
            $user['universidad_iduniversidad'] = $university;

            // Saves the user
            $this->User->save($user);

            // Indicates success
            $result['success'] = true;
        }

        // Sends the response
        $this->response->type('application/json');
        $this->response->body(json_encode($result));
        return $this->response;
    }

    /**
     * Groups handle of the system
     */
    public function groups() {
        // Renders the page
        $this->render('groups', 'ajax');
    }

    /**
     * Users handle of the system
     */
    public function access() {
        // Renders the page
        $this->render('access', 'ajax');
    }

}
