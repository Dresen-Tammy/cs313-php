<?php
/*
* controller for shopping cart
*/
session_start();

// get the functions.php file
//require_once 'library/functions.php';
$sessionCart = array();
// Check for cart cookie. If yes, filter and sanitize

if(isset($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $key => $value) {
    array_push($sessionCart, $value);
  }
}

// list of items for sale on browseItems page
$items = array(
  "RU" => array("Specialized Ruby Bike 52cm Teal", 1299.99, "images/ruby.png"),
  "RO" => array("Specialized Roubaix Bike 61cm Mint", 3099.99, "images/roubaix.png" ),
  "CH" => array("Trek Checkpoint ALR Bike 48cm Blue", 1789.99, "images/checkpoint.png"),
  "PR" => array("Giant Propel Advanced Bike 59cm Blue", 3775.15, "images/giant.png" ),
  "LA" => array("Lazer 02 Helmet Orange Sm", 89.96, "images/lazer.png" ),
  "GI" => array("Giro Savant Helmet Red Lg", 49.97, "images/giro.png"),
  "PI" => array("Pearl Izumi Cycling Kit Sm", 89.95, "images/pearl.png" ),
  "CM"=> array("Sesame Street Cycling Jersey Md", 75.49, "images/cookie.png" ),
  "SI" => array("Sidi Level Carbon Shoes Mens 8", 119.99, "images/sidi.png" ),
  "BG" => array("Specialized Body Geometry Gel Gloves Lg", 35.59, "images/geometry.png" )
);

// get input on which page to display. If no input, display browse page.
$action = filter_input(INPUT_POST, 'action');
if($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if($action == NULL) {
    $action = 'browse';
  }
}
// get input on items being added or deleted from cart.
$item = filter_input(INPUT_POST, 'item');
if($item == NULL) {
  $item = filter_input(INPUT_GET, 'item');
}

switch ($action) {
  case 'browse';

      // if item is set, add item to $cookieCart and update $cookieCart

      if (isset($item)) {
          array_push($sessionCart, $item);

      $_SESSION["cart"] = $sessionCart;
      }
      // create browse list for browseItem page
      $browseList = "<ul>";
      foreach ($items as $key => $value) {
        $browseList .= "<li><span class='item'> $value[0] </span> <span class='price'>\$$value[1]</span>
        <a href='index.php?action=browse&item=$key'
        title='$value[0]'>Add to Cart</a></li>";

        //echo $value[1];
        //echo $value[0];
        //echo "<br>";
        //foreach ($value as $b) {
        //$browseList += "<li>$value[0], $value[1]<button name='browse' value='$key'>Add To Cart</button><br>"
      }
      $browseList .= "</ul>";


      include 'view/browseItems.php';
      break;




  case 'cart':

     // get item, find it in array,
      if (isset($item)) {
        array_splice($sessionCart, $item, 1);
        $_SESSION['cart'] = $sessionCart;
        }
      $price = 0;
      $browseList2 = "<ul>";
      foreach ($sessionCart as $key => $value) {
        $browseList2 .= "<li><span class='item'>" . $items[$value][0] . "</span><span class='price'>\$" . $items[$value][1] . "</span>
        <a href='index.php?action=cart&item=" . $key ."'>Remove</a></li>";
        $price += $items[$value][1];
      }


        //$browseList2 .= "<li>$items[$sessionCart[i]][0] <span>\$$items[$sessionCart[i]][1]</span>
        //<a href='/cs313-php/web/shoppingCart/index.php?action=cart&item=$i'
        //title='$items[$sessionCart[i]][0]'>Remove From Cart</a></li>";

      $browseList2 .= "</ul>";
      include 'view/viewCart.php';
      break;




  case 'checkout':
      $price = 0;
      $browseList2 = "<ul>";
          foreach ($sessionCart as $key => $value) {
              $price += $items[$value][1];
          }
      $browseList2 .= "</ul>";
      include 'view/checkOut.php';
      break;



  case 'confirm':
    // variables
    $street = $city = $state = $zip = $error = "";

    $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT);
    if (empty($street) || empty($city) || empty($state) || empty($zip)) {
    $error = "<p class='error'>Please fill in empty form fields</p>";
    include 'view/checkOut.php';
    break;
    }
    if (!preg_match("/^[a-zA-Z1-9 ]*$/",$street)) {
      $error = "<p class='error'>Street Address can only have letters, numbers, and white spaces.</p>";
      include 'view/checkOut.php';
      break;
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
      $error = "<p class='error'>City can only have letters and white spaces.</p>";
      include 'view/checkOut.php';
      break;
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
      $error = "<p class='error'>State can only have letters and white spaces.</p>";
      include 'view/checkOut.php';
      break;
    }
    if (!preg_match("/^\d{5}$/",$zip)) {
      $error = "<p class='error'>Please enter 5 digit ZIP Code.</p>";
      include 'view/checkOut.php';
      break;
    }
    $price = 0;
    $browseList2 = "<ul>";
        foreach ($sessionCart as $key => $value) {
          $browseList2 .= "<li><span class='item'>" . $items[$value][0] . "</span><span class='price'>\$" . $items[$value][1] . "</span></li>";
            $price += $items[$value][1];
        }
    $browseList2 .= "</ul>";
      include 'view/confirmation.php';
      session_destroy();
      break;
}
?>
