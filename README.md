loaderio-php-library
====================

PHP library for the [loader.io API](http://docs.loader.io/api/intro.html)

## Installation

The loader.io API requires all calls to be authenticated with an API Key.
This key is located in your [loader.io account settings](https://loader.io/settings)

Update the LoaderIo.php file with your API Key

    const API_KEY = ''; //Your API Key here


Include LoaderIo library:

    require_once ('your/path/to/LoaderIo.php');

## Usage

Create instance of LoaderIo

    $loaderIo = new LoaderIo;

Call required functions

    //Get all apps
    $loaderIo->getAllApps();
