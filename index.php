<?php

// 328/Week7/pets3/pets2/index.php
// This is my CONTROLLER!

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');

// Class files here
require_once('classes/Pet.php');
require_once('classes/RoboticPet.php');
require_once('classes/StuffedPet.php');

// Instantiate the F3 Base
$f3 = Base::instance();

// Default route
$f3->route('GET /', function($f3) {
    $view = new Template();
    echo $view->render('views/home-page.html');
});

// Order Form route
$f3->route('GET|POST /order', function($f3) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve
        $typeOfPet = filter_var($f3->get('POST.typeOfPet'));
        $animal = filter_var($f3->get('POST.petType'));
        $color = filter_var($f3->get('POST.petColor'));
        $age = filter_var($f3->get('POST.petAge'));

        // Check if not empty
        if (empty($typeOfPet) || empty($animal) || empty($color)) {
            echo "Please fill in all required fields.";
            return;  // Stop
        }

        // Store
        $f3->set('SESSION.typeOfPet', $typeOfPet);
        $f3->set('SESSION.animal', $animal);
        $f3->set('SESSION.color', $color);
        $f3->set('SESSION.age', $age);

        // Redirect
        if ($typeOfPet == 'robotic') {
            $f3->reroute('/robotic');
        } elseif ($typeOfPet == 'stuffed') {
            $f3->reroute('/stuffed');
        }
    } else {
        $view = new Template();
        echo $view->render('views/order.html');
    }
});

// Robotic Pets page
$f3->route('GET|POST /robotic', function($f3) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve
        $accessories = $f3->get('POST.accessories');

        // Create RoboticPet object and store it in session
        $roboticPet = new RoboticPet($f3->get('SESSION.animal'), $f3->get('SESSION.color'));
        if ($accessories) {
            foreach ($accessories as $accessory) {
                $roboticPet->addAccessory($accessory);
            }
        }

        $f3->set('SESSION.pet', $roboticPet);
        $f3->reroute('/summary');
    } else {
        $view = new Template();
        echo $view->render('views/robotic.html');
    }
});

// Stuffed Pets Page
$f3->route('GET|POST /stuffed', function($f3) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve
        $size = $f3->get('POST.size');
        $stuffingType = $f3->get('POST.stuffingType');
        $material = $f3->get('POST.material');

        // StuffedPet object
        $stuffedPet = new StuffedPet(
            $f3->get('SESSION.animal'),
            $f3->get('SESSION.color'),
            $size,
            $stuffingType,
            $material
        );

        $f3->set('SESSION.pet', $stuffedPet);
        $f3->reroute('/summary');
    } else {
        $view = new Template();
        echo $view->render('views/stuffed.html');
    }
});

// Summary Page
$f3->route('GET /summary', function($f3) {
    $pet = $f3->get('SESSION.pet');
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();