<?php
//this is the main controller

//create or access a session
session_start();

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
//gets the function file
require_once 'library/functions.php';


// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . 
//     "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
$navList = buildNav($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

// check if the first name cookie is available
if(isset($_COOKIE['firstname'])){
    $cookieFirstName = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

// check if the last name cookie is available
if(isset($_COOKIE['lastname'])){
    $cookieLastName = filter_input(INPUT_COOKIE, 'lastname', FILTER_SANITIZE_STRING);
}

// check if email cookie is available
if(isset($_COOKIE['email'])){
    $cookieLastName = filter_input(INPUT_COOKIE, 'email', FILTER_SANITIZE_EMAIL);
}
switch ($action) {
    case 'something':

        break;

    default:
        include 'view/home.php';
        break;
}









// var_dump($classifications);
//     exit;