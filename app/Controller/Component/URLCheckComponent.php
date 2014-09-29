<?php

App::uses('Component', 'Controller');
App::uses('FirePHP', 'Vendor');

/**
 * Handles the access to different pages
 */
class URLCheckComponent extends Component {

    /**
     * Analizes the current url access
     * @param type $user
     * @param type $url
     */
    public function analizeAccess($access, $url) {
        //FirePHP::getInstance(true)->log($access);
        //FirePHP::getInstance(true)->log($url);

        // The result
        $result = false;

        // Checks the user urls
        foreach ($access as $access_info) {
            if (strcmp($access_info['Access']['url'], strtolower($url)) == 0) {
                $result = true;
                break;
            }
        }

        // Returns
        return $result;
    }

}