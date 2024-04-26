





<?php
// Connecting to SQLite database
$pdo = new PDO('sqlite:bdd/DATA.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Retrieving data from the products table
$stmt = $pdo->query("SELECT * FROM produits");
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Initializing an array to store data in the desired format
$tableau_produits = [];

// Browse query results and organize them in table
foreach ($resultats as $produit) {
    // Create an associative table for each product category if it does not already exist
    if (!isset($tableau_produits[$produit['categorie']])) {
        $tableau_produits[$produit['categorie']] = [
            'name' => $produit['categorie'],
            'id' => [],
            'code' => [],
            'description' => [],
            'stock' => [],
            'prix' => [],
            'images' => []
        ];
    }

    // Add product data to its category table
    $tableau_produits[$produit['categorie']]['id'][] = $produit['nom'];
    $tableau_produits[$produit['categorie']]['code'][] = $produit['code'];
    $tableau_produits[$produit['categorie']]['description'][] = $produit['description'];
    $tableau_produits[$produit['categorie']]['stock'][] = $produit['stock'];
    $tableau_produits[$produit['categorie']]['prix'][] = $produit['prix'];
    $tableau_produits[$produit['categorie']]['images'][] = $produit['image'];
}



// Read the contents of the 'produits.json' file and decode the JSON string into an associative array
$produits_json = json_encode($tableau_produits, JSON_PRETTY_PRINT);
$_plantes = json_decode($produits_json, true);

// Store the associative array in the 'plantes' session variable
$_SESSION['plantes'] = $_plantes;

?>