<?php

    // 328/Week3/pets2/index.php
    // This is my CONTROLLER!

    // Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

    // Require the autoload file
require_once ('vendor/autoload.php');

    // Instantiate the F3 Base class
$f3 = Base::instance();

    // Define a default route
    // https://ayadgari.greenriverdev.com/328/Week3/pets2/

$f3->route('GET /', function() {
    // echo "<p>Hello world!</p>";

    // Render a view page
    $view = new Template();
    echo $view->render('views/home-page.html');
});

    // Run Fat-Free
$f3->run();