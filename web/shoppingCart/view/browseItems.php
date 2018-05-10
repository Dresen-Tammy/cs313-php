<!DOCTYPE html>
<!-- Tammy Dresen, CS313,
List of items to add to cart and purchase.
Button or link to add item to cart
Clicking button will store item in session, return to browseItem page  -->
<html lang="en-us">
  <head>
    <title>Browse</title>
    <?php include '../template/head.php'?>

</head>
  <body>

      <header>
        <div class="logo">
          <div class=" bigCircle"></div>
          <div class=" smallCircle"></div>
          <div class="tinyCircle"></div>
          <h1>Recyclery</h1>
        </div>
        <a  href="index.php?action=cart" class="button1">CART <span><?php if (isset($sessionCart)) {
             echo count($sessionCart); }
             else {
               echo "0";}  ?></span></a>

      </header>
      <main>
        <h2>Cycling Gear</h2>
        <?php
        if (isset($browseList)) {
        echo $browseList;
      }

        ?>
        <a  href="index.php?action=cart" class="button1">Go to Cart</a>
        </main>


    </form>
  </body>
  </html>
