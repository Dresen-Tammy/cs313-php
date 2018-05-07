<?php
/*
* controller for shopping cart
*/
session_start();

// get the functions.php file
//require_once 'library/functions.php';

// Check for cart cookie. If yes, filter and sanitize
if(isset($_COOKIE['cart'])) {
  $cookieCart = filter_input(INPUT_COOKIE, 'cart', FILTER_SANITIZE_STRING);
}

// get input on which page to display. If no input, display browse page.
$action = filter_input(INPUT_POST, 'action');
if($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if($action == NULL) {
    $action = 'browse';
  }
}

switch ($action) {
  case 'browse':
      include 'view/browseItems.php';
      break;
  case 'cart':
      include 'view/viewCart.php';
      break;
  case 'checkout':
      include 'view/checkOut.php';
      break;
  case 'confirm':
      include 'view/confirmation.php';
      break;
}
?>
