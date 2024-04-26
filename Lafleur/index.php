<?php
session_start();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-main.css">
    <link rel="stylesheet" href="css/style-index.css">
</head>
<body>
  <?php require('./php/header.php'); ?>
  <main>

    <?php require('./php/nav-bar.php'); ?>
  
      <div id="corp">
        <div style="margin: 1rem;">
          <center><h1>"Dites-le avec Lafleur"</h2></center>
          <center><h4>Appeler notre service commercial au 03.22.84.65.74 pour recevoir un bon de commande</h4></center>
        </div>
        <center><img class="centered-image" src="images/rosier.png" alt="Image de rosier" style="align-self: center;"></center>
        <br>
    </div>
  </main>
  <?php require('./php/footer.php'); ?>
</body>
</html>
