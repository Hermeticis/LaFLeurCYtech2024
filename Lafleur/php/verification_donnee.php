<?php
// Vérifier si des données ont été envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    foreach( $_POST as $key => $value){

      if(empty($value)){
        echo "Vous n'avez pas rempli le champs: $key";
        echo "<br>";
      }
      
    }

  
} else {
    // Si aucune donnée n'a été envoyée via POST, afficher un message d'erreur
    ?> <p><?php echo "Erreur : Aucune donnée reçue."; ?> </p> <?php
}
?>
