<?php 
// Starting session
session_start();

// Including session variables
require_once('./varSession.inc.php');

// Retrieving category from GET parameter
$categorie = $_GET['cat'];

// Handling form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Checking if user is logged in
    if(isset($_SESSION['username'])){
        // Initializing the shopping cart if not already initialized
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = [
                'bulbes' => [
                    'name' => 'Bulbes',
                    'plantes' => [],
                ],
                'roses' => [
                    'name' => 'Rosiers',
                    'plantes' => [],
                ],
                'massif' => [
                    'name' => 'Plantes à massif',
                    'plantes' => [],
                ]
            ];
        }
        // Processing plant addition to cart
        if(isset($_GET['plante'])){
            $plante = $_GET['plante'];
            $quantite = $_POST['compteur-' . $plante];
            if(isset($_SESSION['panier'][$categorie]['plantes'][$plante])){
                $_quantite = $_SESSION['panier'][$categorie]['plantes'][$plante] + $quantite;
            }else{
                $_quantite = intval($quantite, 10);
            };
            $_SESSION['panier'][$categorie]['plantes'][$plante] = $_quantite;
            ?><script>alert('Votre panier a été mis à jour')</script><?php
        };
    }else{
        ?><script>alert('Vous devez être connecté pour ajouter des produits au panier.');</script><?php
    };
};

?> 

<?php require('./php/head-catalogue.php'); ?>
<body>

    <?php require('./php/header.php');?>

    <main>
        <?php require('./php/nav-bar.php'); ?>

        <div id="corp">
            <h1><?php echo $_SESSION['plantes'][$categorie]['name'] ?></h1>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th class="stock">Stock</th>
                    <th>Prix (€)</th>
                    <th>Commande</th>
                </tr>
              <?php for($i = 0; $i < count($_SESSION['plantes'][$categorie]['id']); $i++){ 
                  $plante = $_SESSION['plantes'][$categorie]['id'][$i];
 ?>
                <tr>
                    <td>
                        <img src= "<?php echo $_SESSION['plantes'][$categorie]['images'][$i] ?>" >
                      <center>
                          <!-- Using PHP variable in the button -->
                          <button class="zoom" onclick="zoom('<?php echo $_SESSION['plantes'][$categorie]['images'][$i]; ?>')">zoom</button>
                      </center>
                    </td>
                    <td><?php echo $_SESSION['plantes'][$categorie]['code'][$i] ?></td>
                    <td class="description"><?php echo $_SESSION['plantes'][$categorie]['description'][$i]; ?></td>
                    <td class="stock"><?php echo $_SESSION['plantes'][$categorie]['stock'][$i]; ?></td>
                    <td><?php echo $_SESSION['plantes'][$categorie]['prix'][$i]; ?></td>
                    <td class="commande">
                      <center>
                        <div>
                          <form action='<?php echo 'produit.php?cat=' . $categorie . '&plante=' . $plante ?>' method='post'>
                            <button type="button" id="reduit" onclick="enlever('<?php echo $plante;?>')">-</button>
                            <input id="compteur-<?php echo $plante;?>" name="compteur-<?php echo $plante;?>" class="compteur" value="0" readonly/>
                            <button type='button' id="augmente" onclick="ajouter('<?php echo $plante;?>', <?php echo $_SESSION['plantes'][$categorie]['stock'][$i] ?>)">+</button>
                            <button id="commander" type="submit">Ajoutez au panier</button>
                          </form>
                        </div>
                      </center>
                    </td>
                </tr>

                <?php } ?>

            </table>
            <br>
            <center><button onclick="affichage_stock()">Stock</button></center>
            <br>
        </div>
    </main>

    <?php require('./php/footer.php');?>

    <?php require('./php/modal.php');?>

</body>
</html>
