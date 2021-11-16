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


$classifications = getClassifications();

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
        $classificationResult = addclassification($classificationName);

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
        $addVehicleResult = addVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
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

        /* * ****************************************************** 
        * Get vehicles by classificationId 
        * Used for starting Update & Delete process 
        * *********************************************************/

    case 'getInventoryItems':
        //Get the classificationId
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        //Fetch the vehicles by classifictionId from the DB
        $inventoryArray = getInventoryByClassification($classificationId);
        //Convert the array to a JSON object and send it back.
        echo json_encode($inventoryArray);
        break;

        /*************************Modify Action********************/

    case 'mod':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-update.php';
        exit;
        break;

        /*********************Update Vehicle**********************/

    case 'updateVehicle':

        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);


        if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
            $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
            include '../view/vehicle-update.php';
            exit;
        }
        $updateResult = updateVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $invId);
        if ($updateResult) {
            $message = "Congratulations, the $invMake $invModel was successfully updated.";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "Error. The $invMake $invModel was not updated.";
            include '../view/vehicle-update.php';
            exit;
        }
        break;

        /************************Delete Action*******************/

    case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;

        /***********************Delete Vehicle*********************/

    case 'deleteVehicle':

        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);


        $deleteResult = deleteVehicle($invId);
        if ($deleteResult) {
            $message = "Congratulations, the $invMake $invModel was	successfully deleted.";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "Error: $invMake $invModel was not deleted.";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        }

        break;

        /*************************classification*******************/

    case 'classification':

        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
        $vehicles = getVehiclesByClassification($classificationName);
        if (!count($vehicles)) {
            $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
        } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }

        include '../view/classification.php';
        break;
        /**************************Get Vehicle Information **************/
    case 'getVehicleInfo':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $vehicleThumbnails = getThumbnailImages($invId);

        $vehicleData = getVehicleInfo($invId);



        if (!isset($vehicleData)) {
            $message = "<p class='notice'>Sorry, no $vehicleData[invMake]$vehicleData[invModel] details could be found.</p>";
        } else {
            $vehicleDetails = buildVehicleDetails($vehicleData);
            $thumbnails = buildThumbnailImages($vehicleThumbnails);

            //$vehicleThumbnails = buildThumbnailDetail($vehicleThumbnails);
        }

        include '../view/vehicle-detail.php';
        break;
        /*************************Default***********************/

    default:
        $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-man.php';

        break;
}
