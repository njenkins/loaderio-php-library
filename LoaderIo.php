<?php
/**
 * @file
 * Simple PHP library for interacting with the loader.io api 
*/
  require ('vendor/nategood/Httpful/Bootstrap.php');


class LoaderIo {
    
    const API_KEY = '';//Your API Key here
    const API_URL = 'https://api.loader.io/v2';


    /**
     * Get all apps
     */
    public function getAllApps() {

        $allApps = Httpful\Request::get(self::API_URL . '/apps')
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY
                ))
                ->send();
        return $allApps->body;
    }

    /**
     * Get the details of an individual app
     * @param string $appId The unique app id
     */
    public function getApp($appId) {
        $app = Httpful\Request::get(self::API_URL . '/apps/' . $appId)
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY
                ))
                ->send();
        return $app->body;
    }

    /**
     * Get all existing tests
     */
    public function getAllTests() {
        $allTests = Httpful\Request::get(self::API_URL . '/tests')
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY
                ))
                ->send();
        return $allTests->body;
    }

    /**
     * Get the details of an individual test
     * @param string $testId The id of the test to be retrieved
     */
    public function getTest($testId) {
        $test = Httpful\Request::get(self::API_URL . '/tests/' . $testId)
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY
                ))
                ->send();
        return $test->body;
    }
    

}

?>
