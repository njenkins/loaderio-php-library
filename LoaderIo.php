<?php

/**
 * @file
 * Simple PHP library for interacting with the loader.io api 
 */
require ('vendor/nategood/Httpful/Bootstrap.php');

class LoaderIo {

    const API_KEY = ''; //Your API Key here
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
     * Create a new app
     * @param string $domain - the domain for the new app
     */
    public function createApp($domain) {
        $newApp = Httpful\Request::post(self::API_URL . '/apps/')
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY,
                ))
                ->body(array('app' => $domain))
                ->sendsType(Httpful\Mime::JSON)
                ->send();
        return $newApp->body;
    }

    /**
     * Delete an existing loader.io app
     * @param type $appId - The id of the app to be deleted
     */
    public function deleteApp($appId) {
        $deleteApp = Httpful\Request::delete(self::API_URL . '/apps/' . $appId)
                        ->addHeaders(array(
                            'loaderio-auth' => self::API_KEY
                        ))->send();
        return $deleteApp->body;
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
     * Get the status of an individual test
     * @param string $testId The id of the test to be retrieved
     */
    public function getTestStatus($testId) {
        $test = Httpful\Request::get(self::API_URL . '/tests/' . $testId)
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY
                ))
                ->send();
        return $test->body;
    }

    
/**
 * TODO - Send required values to get this working
    public function createTest($initial = 0, $duration = 15, $total = 60, 
            $urls = array('url' => 'domainhere.com')) {
        $newTest = Httpful\Request::post(self::API_URL . '/tests/')
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY,
                ))
                ->body(array(
                    'intial' => 0,
                    'duration' => $duration,
                    'total' => $total,
                    'urls' => $urls
                ))
                ->sendsType(Httpful\Mime::JSON)
                ->send();
        return $newTest->body;
    }
*/
    /**
     * Run a test
     * @param string $testId - the id for the test to be executed
     */
    public function runTest($testId) {
        $test = Httpful\Request::put(self::API_URL . '/tests/' . $testId . '/run')
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY
                ))
                ->send();
        return $test->body;
    }

    /**
     * Stop a test
     * @param string $testId - The id of the test to be stopped
     */
    public function stopTest($testId) {
        $test = Httpful\Request::put(self::API_URL . '/tests/' . $testId . '/stop')
                ->addHeaders(array(
                    'loaderio-auth' => self::API_KEY
                ))
                ->send();
        return $test->body;
    }

}

?>
