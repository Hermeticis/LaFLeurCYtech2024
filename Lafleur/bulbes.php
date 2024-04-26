<?php session_start() ?> 

<?php require('./php/head-catalogue.php'); ?>
<body>
  
  <?php require('./php/header.php');?>
  
  <main>
    
    <?php require('./php/nav-bar.php'); ?>

    <div id="corp">
        <h1>Bulbs</h1> <!-- Main heading for the bulbs section -->
        <table>
            <tr>
                <th>Image</th> <!-- Table header for the image column -->
                <th>Code</th> <!-- Table header for the code column -->
                <th>Description</th> <!-- Table header for the description column -->
                <th class="stock">Stock</th> <!-- Table header for the stock column -->
                <th>Price (€)</th> <!-- Table header for the price column -->
                <th>Order</th> <!-- Table header for the order column -->
            </tr>
            <tr>
                <td>
                    <img src="images/bulbes_begonia.jpg"> <!-- Image of begonias -->
                    <center><button class="zoom" onclick="zoom('begonia')">zoom</button></center> <!-- Button to zoom in on the image -->
                </td>
                <td>b01</td> <!-- Code for begonias -->
                <td class="description">3 begonia bulbs</td> <!-- Description of begonias -->
                <td class="stock">5</td> <!-- Stock count for begonias -->
                <td>5</td> <!-- Price of begonias -->
                <td class="commande">
                    <center><div>
                        <button id="reduit" onclick="enlever('begonia')">-</button> <!-- Button to reduce quantity of begonias -->
                        <input id="compteur-begonia" class="compteur" value="0" readonly/> <!-- Input field for quantity of begonias -->
                        <button id="augmente" onclick="ajouter('begonia')">+</button> <!-- Button to increase quantity of begonias -->
                    </div></center>
                    <center><button id="commander" onclick="commander('begonia')">Add to cart</button></center> <!-- Button to add begonias to cart -->
                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/bulbes_dahlia.jpg"> <!-- Image of dahlias -->
                    <center><button class="zoom" onclick="zoom('dahlia')">zoom</button></center> <!-- Button to zoom in on the image -->
                </td>
                <td>b02</td> <!-- Code for dahlias -->
                <td class="description">10 dahlia bulbs</td> <!-- Description of dahlias -->
                <td class="stock">5</td> <!-- Stock count for dahlias -->
                <td>12</td> <!-- Price of dahlias -->
                <td class="commande">
                    <center><div>
                        <button id="reduit" onclick="enlever('dahlia')">-</button> <!-- Button to reduce quantity of dahlias -->
                        <input id="compteur-dahlia" class="compteur" value="0" readonly/> <!-- Input field for quantity of dahlias -->
                        <button id="augmente" onclick="ajouter('dahlia')">+</button> <!-- Button to increase quantity of dahlias -->
                    </div></center>
                    <center><button id="commander" onclick="commander('dahlia')">Add to cart</button></center> <!-- Button to add dahlias to cart -->
                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/bulbes_glaieul.jpg"> <!-- Image of gladiolus -->
                    <center><button class="zoom" onclick="zoom('glaieul')">zoom</button></center> <!-- Button to zoom in on the image -->
                </td>
                <td>b03</td> <!-- Code for gladiolus -->
                <td class="description">50 gladiolus bulbs</td> <!-- Description of gladiolus -->
                <td class="stock">5</td> <!-- Stock count for gladiolus -->
                <td>9</td> <!-- Price of gladiolus -->
                <td class="commande">
                    <center><div>
                        <button id="reduit" onclick="enlever('glaieul')">-</button> <!-- Button to reduce quantity of gladiolus -->
                        <input id="compteur-glaieul" class="compteur" value="0" readonly/> <!-- Input field for quantity of gladiolus -->
                        <button id="augmente" onclick="ajouter('glaieul')">+</button> <!-- Button to increase quantity of gladiolus -->
                    </div></center>
                    <center><button id="commander" onclick="commander('glaieul')">Add to cart</button></center> <!-- Button to add gladiolus to cart -->
                </td>
            </tr>
  
        </table>
        <br>
        <center><button onclick="affichage_stock()">Stock</button></center> <!-- Button to display stock -->
        <br>
      </div>
    
  </main>

  <?php require('./php/footer.php');?>
  
  <?php require('./php/modal.php');?>
  
</body>
</html>
