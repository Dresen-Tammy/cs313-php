<head>
  <title>Confirm</title>
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
    </header>
    <main>
      <h2>Confirmation</h2>
      <p>Congratulations! You have purchased:</p>
      <?php
      if (isset($browseList2)) {
      echo $browseList2;
    }
    echo "<p>Total Cost: $<span>$price</span></p>";
    echo "<p>Your purchases will be sent to:</p>";
    echo "<p>$street<br>";
    echo "<p>$city, $state $zip</p>";
      ?>
      </main>


  </form>
</body>
</html>
