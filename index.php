<?php

// 328/Week7/pets3/pets2/index.php
// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Instantiate the F3 Base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home-page.html');
});

// Order Form route
$f3->route('GET|POST /order', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve and sanitize the type of pet from the form submission
        $typeOfPet = filter_var($f3->get('POST.typeOfPet'), FILTER_SANITIZE_STRING);

        // Ensure the type of pet is not empty
        if (empty($typeOfPet)) {
            // Display an error message or redirect back to the form with an error
            $f3->set('error', 'Please select a type of pet.');
            $view = new Template();
            echo $view->render('views/order.html');
            return;
        }

        // Store the type in the session and redirect to the customization page
        $f3->set('SESSION.typeOfPet', $typeOfPet);
        $f3->reroute('/petType');
    } else {
        // Just render the order form if it's a GET request
        $view = new Template();
        echo $view->render('views/order.html');
    }
});

// petType route
$f3->route('GET|POST /petType', function($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $f3->reroute('/summary');
    } else {
        // Display customization options
        $view = new Template();
        echo $view->render('views/petType.html');
    }
});

// Summary page to display the final order summary
$f3->route('GET /summary', function($f3) {

    $pet = $f3->get('SESSION.pet');
    $view = new Template();
    echo $view->render('views/summary.html');
});


// Run Fat-Free
$f3->run();