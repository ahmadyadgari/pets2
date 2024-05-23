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

// Order Form
$f3->route('GET|POST /order', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the data from the form
        $typeOfPet = $f3->get('POST.typeOfPet');

        // Store the type in the session
        $f3->set('SESSION.typeOfPet', $typeOfPet);

        // Redirect to the customization page
        $f3->reroute('/petType');
    }
    $view = new Template();
    echo $view->render('views/order.html');
});

// Customization Page
$f3->route('GET|POST /petType', function($f3) {
    $view = new Template();
    echo $view->render('views/petType.html');
});

// Summary Page
$f3->route('GET|POST /summary', function($f3) {
    // Retrieve the pet object from the session
    $pet = $f3->get('SESSION.pet');

    // Render the summary view, passing the pet object to the view
    $view = new Template();
    echo $view->render('views/summary.html', ['pet' => $pet]);
});


// Run Fat-Free
$f3->run();