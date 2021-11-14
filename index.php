<?php

//Create or access a Session
session_start();



//This is the main controller
// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
//Get the accounts model
require_once 'model/accounts-model.php';

//Get functions file
require_once 'library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

//var_dump($classifications);
//exit;

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);


$action = trim(filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING));
if ($action == NULL) {
   $action = trim(filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING));
}

//Check if the firstname cookie exists, get its value.
if (isset($_COOKIE['firstname'])){
   $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}




//switch statement used to send to the 'home.php'  page. 
switch ($action) {
   case 'template':
      include './view/template.php';
      break;

   default:
   include './view/home.php';
      break;
}
