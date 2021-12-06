<?php
//this is the accounts controller

//create or access a session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
//get the functions controller
require_once '../library/functions.php';


// // Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = buildNav($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'register':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));

        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);


        // checking for existing email address
        $existingEmail = checkExistingEmail($clientEmail);
        if ($existingEmail) {
            $message = "<p>This email already exists please login.</p>";
            include '../view/login.php';
            exit;
        }

        // check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="center"> Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        // time for hashing passwords
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);


        // Send the data to the model if no errors exist
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        //Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            setcookie('lastname', $clientLastname, strtotime('+1 year'), '/');
            setcookie('email', $clientEmail, strtotime('+1 year'), '/');
            $_SESSION['message'] = "<p> Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;
    case 'login':
        include '../view/login.php';
        break;
    case 'registration':
        include '../view/registration.php';
        break;
    case 'Login':
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        if (empty($clientEmail) || empty($checkPassword)) {
            $message = '<p class="center"> Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
    case 'Logout':
        session_unset();
        session_destroy();
        header('Location: ../index.php');

    case 'update':
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        if ($clientEmail != $_SESSION['clientData']['clientEmail']) {
            if (checkExistingEmail($clientEmail)) {
                $_SESSION['account-message'] = '<p>Email already exists. Try again.</p>';
                include '../view/client-update.php';
                exit;
            } else {
                $clientEmail = checkEmail($clientEmail);
            }
        }

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
            $_SESSION['account-message'] = '<p>Update did not work. Check your values and try again.</p>';
            include '../view/client-update.php';
            exit;
        }
        if (updateInfo($clientFirstname, $clientLastname, $clientEmail, $_SESSION['clientData']['clientId'])) {
            $_SESSION['account-message'] = "<p>Your account has successfully been updated.</p>";
            $clientData = getClientById($_SESSION['clientData']['clientId']);
            array_pop($clientData);
            $_SESSION['clientData'] = $clientData;
            include '../view/admin.php';
        } else {
            $_SESSION['account-message'] = "<p>I'm sorry. The update failed. Check your values and try again.</p>";
            include '../view/admin.php';
        }

        break;

    case 'updateUser':
        include '../view/client-update.php';
        break;

    case 'changePassword':
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        if (checkPassword($clientPassword)) {
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
            if (changePassword($hashedPassword, $_SESSION['clientData']['clientId'])) {
                $_SESSION['password-message'] = "<p>Your password has been changed.</p>";
                include '../view/admin.php';
            } else {
                $_SESSION['password-message'] = "<p>Password failed to change. Please try again.</p>";
                include '../view/admin.php';
            }
        } else {
            $_SESSION['password-message'] = "<p>Password does not meet requirements. Try again.</p>";
            include '../view/client-update.php';
        }
        break;

    default:
        include('../view/admin.php');
        break;
}
