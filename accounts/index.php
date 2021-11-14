<?php
//This is the Accounts Controller


//Create or access a Session
session_start();

require_once '../library/functions.php';

require_once '../library/connections.php';

require_once '../model/main-model.php';

require_once '../model/accounts-model.php';

$classifications = getClassifications();

// Build a navigation bar using the $classifications array as a parameter to the build navigation function.
$navList = buildNavigation($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
        /****************Registration Page**********************/

    case 'registration':
        include '../view/register.php';
        break;

        /**************Login Page ******************************/

    case 'Login-page':
        include '../view/login.php';
        break;

        /**************************Admin Page*******************/

    case 'admin':
        include '../view/admin.php';
        break;

        /**********************Login************************/

    case 'Login':
        //Trim,filter and sanitize the email and password
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        //Check the email and password are correct to user
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        //check no other emails are the same, being used.
        $existingEmail = checkExistingEmail($clientEmail);

        if (empty($checkPassword) || empty($clientEmail)) {
            $message = 'Please provide a valid email address and password.';
            //return to login page
            include '../view/Login.php';
            exit;
        }

        //Query the client data based on the email address.
        $clientData = getClient($clientEmail);

        //Compare the password just submitted against
        //the hashed password for the matching client.
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);

        //if the hash's don't match create an error
        // and return to the login view.
        if (!$hashCheck) {
            $message = "<span>Please check your password and try again. </span>";
            include '../view/login.php';
            exit;
        }


        //else A valid user exists, log them in.
        $_SESSION['loggedIn'] = TRUE;

        //Remove the password from the array
        //the array_pop function removes the last
        //element from an array
        array_pop($clientData);

        //Store the array into the session
        $_SESSION['clientData'] = $clientData;

        //Send them to the admin view
        include '../view/admin.php';
        exit;

        /*************************Logout********************/

    case 'Logout':

        //remove all the session variables

        session_unset();

        //destroy the session

        session_destroy();

        header('Location: /phpmotors/');
        exit;

        /***********************Registration***************************/

    case 'register-attempt':
        //Filter and store incoming values
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));

        //Check email and password to see if they are in the correct format.
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        $existingEmail = checkExistingEmail($clientEmail);
        //Check if its is an existing email.
        if ($existingEmail) {
            $_SESSION['message'] = 'That email already exists. Do you want to login instead?';
            include '../view/login.php';
            exit;
        }

        //Check incoming data to see if missing
        if (empty($checkPassword) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)) {
            $message = 'Please provide information for all empty form fields.';
            //return to register page
            include '../view/register.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // No errors found, Process and send the data to the model!
        $regResult = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        //Process if no error

        //Check result
        //$regResult should return 1 added row to the model.
        if ($regResult === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['loggedIn'] = TRUE;
            $_SESSION['message'] = 'Thank you for registering with us ' . $clientFirstname . ' ' . $clientLastname . '<br>
            Please use your email and password to login.';
            header('Location: /phpmotors/accounts/?action=Login');
            exit;
        } else {
            $_SESSION['message'] = "Sorry, " . $clientFirstname . " Please try registering again.";
            include '../view/register.php';
            exit;
        }
        break;

        /*************************client Update Page******************/

    case 'accountMod':
        include '../view/client-update.php';
        break;

        /**********************Update Account*******************/

    case 'accountUpdate':

        // Filter and store the updated data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        //Check email to see if it is in the correct format.
        $clientEmail = checkEmail($clientEmail);

        //Check if its is an existing email.

        //echo $_SESSION['clientData']['clientEmail'];
        // if the email already exists, provide response to client.
        if ($_SESSION['clientData']['clientEmail'] != $clientEmail) {
            $existingEmail = checkExistingEmail($clientEmail);
            if ($existingEmail) {
                $_SESSION['message'] = 'This email address already exists. Please try a different email address.';
                include '../view/client-update.php';
                exit;
            }
        }

        //Check incoming data to see if missing
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
            $message = 'Please provide information for all empty form fields.';
            //return to register page
            include '../view/client-update.php';
            exit;
        }

        // No errors found, Process and send the data to the model!
        $updatedResult = updateAccount($clientId, $clientFirstname, $clientLastname, $clientEmail);

        $clientData = getClientInfo($clientId);

        array_pop($clientData);

        $_SESSION['clientData'] = $clientData;

        if ($updatedResult) {
            $_SESSION['message'] = $clientFirstname . ' ' . $clientLastname . '. Your information has been updated.';
            header('Location: /phpmotors/accounts/');
            exit;
        } else {
            $_SESSION['message'] = "Sorry " . $clientFirstname . ", we could not update your account information. Please try again.";
            include '../view/client-update.php';
            exit;
        }
        break;


        /***************************Password Update ******************/

    case 'passwordUpdate':

        // Filter and store the password
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        $clientId = trim(filter_input(
            INPUT_POST,
            'clientId',
            FILTER_SANITIZE_NUMBER_INT
        ));

        //Check password to see if they are in the correct format.
        $checkPassword = checkPassword($clientPassword);

        //Check incoming password to see if missing
        if (empty($checkPassword)) {
            $message = 'Please provide a password in the empty field.';
            //return to register page
            include '../view/client-update.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($checkPassword, PASSWORD_DEFAULT);

        // No errors found, Process and send the password to the model!
        $PasswordResult = updatePassword($clientId, $hashedPassword);

        //Check result
        //PasswordResult should return 1 row adjusted from the model.

        if ($PasswordResult) {
            $_SESSION['message'] = $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname'] . '. Your Password has been updated.';
            header('Location: /phpmotors/accounts/');
            exit;
        } else {
            $_SESSION['message'] = $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname'] . '. Your Password has not been updated. Please try again.';
            header('Location: /phpmotors/accounts/');
            exit;
        }
        break;



        /********************Default**********************/

    default:
        //Send to the admin view.
        include '../view/admin.php';

        break;
}
