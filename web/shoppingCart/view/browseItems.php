<!DOCTYPE html>
<!-- Tammy Dresen, CS313,
List of items to add to cart and purchase.
Button or link to add item to cart
Clicking button will store item in session, return to browseItem page  -->
<html lang="en-us">
  <head>
    <title>Browse</title>
    <?php include 'template/head.php'?>

</head>
  <body>

      <header>
        <div class="logo">
          <div class=" bigCircle"></div>
          <div class=" smallCircle"></div>
          <div class="tinyCircle"></div>
          <h1>Recyclery</h1>
        </div>
        <a  href="home.php" class="button1">CART</a>
      </header>
      <main>
        <?php
        echo $browseList;
        ?>
        </main>


    </form>
  </body>
  </html>
