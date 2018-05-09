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
      // list of items for sale on browseItems page
      $items = array
      (
        "RU" => array("Specialized Ruby Bike 52cm Teal", 1299.99),
        "RO" => array("Specialized Roubaix Bike 61cm Mint", 3099.00 ),
        "CH" => array("Trek Checkpoint ALR Bike 48cm Blue", 1789.99),
        "PR" => array("Giant Propel Advanced Bike 59cm Red", 3775.00 ),
        "LA" => array("Lazer 02 Helmet Orange Sm", 89.96 ),
        "PI" => array("Pearl Izumi Cycling Kit Sm", 89.95 ),
        "SI" => array("Sidi Level Carbon Shoes Mens 8", 119.99 ),
        "PR"=> array("Giant Propel Advanced 59cm Red", 3775.00 ),
        "BG" => array("Specialized Body Geometry Gel Gloves Lg", 35.00 )
      );
      // create browse list for browseItem page
      $browseList = "<ul>";
      foreach ($items as $key => $value) {
        $browseList += "<li>$value[0], $value[1]<button name='browse' value='$key'>Add To Cart</button><br>"
      }
      $browseList += "</ul>"


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
