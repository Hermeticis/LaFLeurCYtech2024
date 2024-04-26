<?php 
// Starting session
session_start();

// Function to search for an element in an array
function recherche($tab, $id) {
    // Loop through the array
    for($i = 0; $i < count($tab); $i++){
        // Check if the current element matches the target id
        if( $tab[$i] == $id ){
            // Return the index if found
            return $i;
        };
    };
};

// Handling POST request to unset the 'panier' session variable
if($_SERVER["REQUEST_METHOD"] == "POST"){
    unset($_SESSION['panier']);
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-catalogues.css">
    <link rel="stylesheet" href="css/style-main.css">
</head>
<body>
<?php require('./php/header.php'); ?>
<main>
    <?php require('./php/nav-bar.php'); ?>
    <div id="corp">
      <h1>Votre Panier</h1>
      <?php if(isset($_SESSION['panier'])){?>
        <br>
        <table>
            <tr>
                <th>Images</th>
                <th>Code</th>
                <th>Description</th>
                <th>Quantité</th>
                <th>Prix (€)</th>
            </tr>
          <?php
          $prix_total = 0;
          // Check if 'panier' session variable is set and is an array
          if(isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
              foreach($_SESSION['panier'] as $categorie => $plantes) { ?>
                      <tr><th colspan="5"><?php echo $_SESSION['panier'][$categorie]['name']; ?></th></tr>
                      <?php foreach($_SESSION['panier'][$categorie]['plantes'] as $plante => $quantite) {
                          // Find the index of the plant in the session data
                          $i = recherche($_SESSION['plantes'][$categorie]['id'], $plante);
                          // Calculate total price for the plant
                          $prix_total += $_SESSION['plantes'][$categorie]['prix'][$i] * $quantite; ?>
                          <tr>
                            <td><center><img style="max-width : 100px" src="<?php echo $_SESSION['plantes'][$categorie]['images'][$i] ?>"></center></td>
                            <td><?php echo $_SESSION['plantes'][$categorie]['code'][$i] ?></td>
                            <td><?php echo $_SESSION['plantes'][$categorie]['description'][$i] ?></td>
                            <td><?php echo $quantite ?></td>
                            <td><?php echo $_SESSION['plantes'][$categorie]['prix'][$i] * $quantite ?></td>
                          </tr>
                      <?php }
              }
          }
          ?>
            </table>
            <br>
            <form action='panier.php' method='post'>
              <button type='submit'>Acheter</button>
            </form>
          <?php
          }else{?><center><h2>votre panier est vide.</h2></center><?php } ?>
      <br>
    </div>
</main>
<?php require('./php/footer.php'); ?>
</body>
</html>
