<!DOCTYPE html>
<!-- Tammy Dresen, CS313,
List of items to add to cart and purchase.
Button or link to add item to cart
Clicking button will store item in session, return to browseItem page  -->
<html lang="en-us">
  <head>
    <title>CheckOut</title>
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

        <a  href="index.php?action=cart" class="button1">RETURN TO CART</a>

      </header>
      <main>
        <h2>Checkout</h2>
        <?php
          echo "<p>Total Cost: $<span>$price</span></p>"

        ?>
        <form method="post" action="/cs313-php/web/shoppingCart/index.php">
          <fieldset>
          </legend class="error">* required field</legend><br>
          <?php if (isset($error)) {echo $error;} ?>
          <label for name class="label">Street Address:</label>
          <input type="text" name="street" value="<?php echo $street;?>" required><span class="error">*</span><br>
          <label for name class="label">City:</label>
          <input type="text" name="city" value="<?php echo $city;?>" required><span class="error" >*</span><br>
          <label for name class="label">State:</label>
          <input type="text" name="state" value="<?php echo $state;?>" required><span class="error">*</span><br>
          <label for name class="label">ZIP Code:</label>
          <input type="number" name="zip" value="<?php echo $zip;?>" required><span class="error">*</span><br>
          <input type="submit" name="submit" value="COMPLETE PURCHASE">
          <input type="hidden" name="action" value="confirm">
        </fieldset>
      </form>


        </main>


    </form>
  </body>
  </html>
