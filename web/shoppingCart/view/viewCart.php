<html lang="en-us">
  <head>
    <title>Cart</title>
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
        <a  href="index.php?action=browse" class="button1">CONTINUE SHOPPING</a>


      </header>
      <main>
        <h2>Cart</h2>
        <?php
        if (isset($browseList2)) {
        echo $browseList2;
      }
        ?>
        <p>Total Price: <span>$<?php echo $price; ?></span></p>
        <a  href="index.php?action=checkout" class="button1">CHECKOUT</a>
        </main>


    </form>
  </body>
  </html>
