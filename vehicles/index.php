<?php
//This is the Accounts Controller


//Create or access a Session
session_start();


require_once '../model/uploads-model.php';

//Add database connection file
require_once '../library/connections.php';
//Add main-model file
require_once '../model/main-model.php';
//Add vehicle model file
require_once '../model/vehicle-model.php';
//Add functions file
require_once '../library/functions.php';


$classifications = getClassificationID();

// Build a navigation bar using the $classifications array

$navList = buildNavigation($classifications);

//When a specific action is initiated.

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

        /**************************Classification Page******************/

    case 'add-classification':
        include '../view/add-classification.php';
        break;

        /******************Add Classification Name Action******************/

    case 'addclassificationName':
        //Filter and store incoming values
        $classificationName = filter_input(INPUT_POST, 'classificationName');

        //Clean and return string
        checkString($classificationName);
        //Check incoming data to see if missing

        if (empty($classificationName)) {
            $message = 'Please provide correct information in the empty field.';
            include '../view/add-classification.php';
            exit;
        }
        //Process if no error
        $classificationResult = newClassification($classificationName);

        if ($classificationResult == 1) {
            header('Location: /phpmotors/vehicles/index.php');
            //include '../view/add-classification.php';
            exit;
        } else {
            $message = "It didn't work!";
            include '../view/add-classification.php';
        }
        break;

        /**********************Add Vehicle Page***********************/

    case 'addVehicle':
        include '../view/add-vehicle.php';
        break;

        /**************************Add Vehicle Action*********************/

    case 'addVehicle-attempt':
        //Filter and store incoming values
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));

        //Clean and sanitize all strings. Removing high and low anscii characters.
        checkString($invMake);
        checkString($invModel);
        checkString($invDescription);
        checkString($invImage);
        checkString($invThumbnail);
        checkString($invColor);

        //Check incoming data to see if missing
        if (
            empty($invMake) || empty($invModel) || empty($invDescription) ||
            empty($invImage) || empty($invThumbnail) || empty($invPrice)
            || empty($invStock) || empty($invColor) || empty($classificationId)
        ) {
            $message = 'Please provide correct information for all empty form fields.';
            //return to register page
            include '../view/add-vehicle.php';
            exit;
        }
        //Process if no error
        $addVehicleResult = add-Vehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        //Check result
        if ($addVehicleResult === 1) {
            $message = 'The ' . $invMake . ' ' . $invModel . ' was added successfully!';
            include '../view/add-vehicle.php';
            exit;
        } else {
            $message = "Please try again.";
            include '../view/register.php';
            exit;
        }
        break;

        
}
