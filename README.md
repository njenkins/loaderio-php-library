loaderio-php-library
====================

PHP library for the [loader.io API](http://docs.loader.io/api/intro.html)

## Installation

Include LoaderIo library:

    require_once ('your/path/to/LoaderIo.php');

## Usage

Create instance of LoaderIo

    $loaderIo = new LoaderIo;

Call required functions

    //Get all apps
    $loaderIo->getAllApps();
