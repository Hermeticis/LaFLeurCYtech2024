<?php 

// Starting session
session_start();

// Initializing error flags
$dateNaissance_error = false; 
$contenu_error = false; 
$sujet_error = false; 
$dateContact_error = false; 
$email_error = false; 
$prenom_error = false; 
$nom_error =  false; 
$genre_error = false;
$error = false;

// Initializing variables
$nom = '';
$prenom = '';
$email = '';
$dateContact = '';
$metier = '';
$sujet = '';
$contenu = '';
$dateNaissance = '';

// Handling form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Retrieving form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $dateContact = $_POST['dateContact'];
    $metier = $_POST['metier'];
    $sujet = $_POST['sujet'];
    $contenu = $_POST['contenu'];
    $dateNaissance = $_POST['dateNaissance'];

    // Checking for empty fields
    if(empty($nom)){
        $nom_error = true;
        $error = true;
    }if(empty($prenom)){
      $prenom_error = true;
      $error = true;
    }if(empty($dateContact)){
      $dateContact_error = true;
      $error = true;
    }if(empty($sujet)){
      $sujet_error = true;
      $error = true;
    }if(empty($contenu)){
      $contenu_error = true;
      $error = true;
    }if(empty($dateNaissance)){
      $dateNaissance_error = true;
      $error = true;
    }if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = true;
      $error = true;
    }if(isset($_POST['genre'])){
      $genre = $_POST['genre'];
    }else{
      $genre_error = true;  
    }

   // If no error, displaying success message and resetting form fields
   if(!$error){
      ?><script>alert("Votre message a bien été envoyé !");</script><?php

       $nom = '';
       $prenom = '';
       $email = '';
       $dateContact = '';
       $metier = '';
       $sujet = '';
       $contenu = '';
       $dateNaissance = '';
    }
}

?> 
 

<!DOCTYPE html>
<html lang="en">
  
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/style-main.css">
      <link rel="stylesheet" href="css/style-contact.css">
      <script src="js/script-contact.js"></script>
  </head>
  
  <body>

      <?php require('./php/header.php'); ?>

      <main>

          <?php require('./php/nav-bar.php');?>

          <div id="corp">

              <h1>Demande de contact</h1>

              <form action="contact.php" method="post">
                  <!--Date entry-->
                  <div>
                    <label for="dateContact">Date de Contact:</label>
                    <?php if(!$dateContact_error){ ?><input type="date" id="dateContact" name="dateContact" class="dates" value="<?php echo htmlspecialchars($dateContact) ?>"/><?php }else{ ?><input type="date" id="dateContact" name="dateContact" class="dates" style="border : 2px solid red;" /><?php } ?>
                  </div>
                  <br>
                  <!--Input fields for last name/first name-->
                  <div class="div-nom-prenom" style="display: flex;">
                      <div style="flex: 1;">
                          <label for="nom">Nom:</label>
                        <?php if(!$nom_error){?>
                          <input type="text" id="nom" name="nom" class="small-input, inputs" placeholder="entrez votre nom" value="<?php echo htmlspecialchars($nom) ?>" /><?php }else{?>  <input type="text" id="nom" name="nom" class="small-input, inputs" placeholder="entrez votre nom" style='border : 2px solid red'/>  <?php } ?>
                      </div>
                      <div style="flex: 1;">
                          <label for="prenom">Prénom:</label>
                        <?php if(!$prenom_error){?>
                        <input type="text" id="prenom" name="prenom" class="<?php echo $prenom_class?> small-input inputs" placeholder="entrez votre prénom" value="<?php echo htmlspecialchars($prenom); ?>"/><?php }else{ ?> <input type="text" id="prenom" name="prenom" class="small-input, inputs" placeholder="entrez votre nom" style='border : 2px solid red'/><?php } ?>
                      </div>
                  </div>
                  <br>
                  <!--Mail entry field-->
                  <div>
                      <label for="email">Email:</label>
                      <?php if(!$email_error){ ?><input type="email" id="email" name="email" class="small-input, inputs" placeholder="monmail@gmail.com" value="<?php echo htmlspecialchars($email) ?>"/><?php }else{ ?><input type="email" id="email" name="email" class="small-input, inputs" placeholder="monmail@gmail.com" style='border : 2px solid red;' /> <p style='color : red' >Veuillez écrire une addresse mail valide</p> <?php } ?>
                      <div id="erreur_mail"></div>
                  </div>
                  <br>
                  <!--Radio button for Genre-->
                  <div name="genre">
                      <label for="genre">Genre:</label>
                      <?php if(!$genre_error){ ?><input <?php if(isset($_POST['genre']) && $_POST['genre'] == 'Homme') echo 'checked'; ?> type="radio" name="genre" id="homme" value="Homme"/> <label for="homme">Homme</label><?php }else{ ?><input type="radio" name="genre" id="homme" value="Homme" style='color : red' /><label for="homme" style="color : red">Homme</label><?php } ?>
                    <?php if(!$genre_error){ ?><input <?php if(isset($_POST['genre']) && $_POST['genre'] == 'Femme') echo 'checked'; ?> type="radio" name="genre" id="femme" value="Femme"/> <label for="femme">Femme</label><?php }else{ ?><input type="radio" name="genre" id="femme" value="Femme" /> <label for="femme" style='color:red'>Femme</label><?php } ?>
                  </div>
                  <br>
                  <!--Enter date of birth-->
                  <div>
                      <label for="dateNaissance">Date de Naissance:</label>
                      <?php if(!$dateNaissance_error){ ?><input type="date" id="dateNaissance" name="dateNaissance" class="dates"<?php echo htmlspecialchars($dateNaissance) ?>"/><?php }else{ ?><input type="date" id="dateNaissance" name="dateNaissance" style="border : 2px solid red"> <?php } ?>
                  </div>
                  <br>
                  <!--Entering the trade date-->
                  <div>
                      <label for="metier" >Metier:</label>
                      <select id="metier" name="metier">
                          <option value="enseignant">Enseignant</option>
                          <option value="maire">Maire</option>
                          <option value="particulier">Particulier</option>
                      </select>
                  </div>
                  <br>
                  <!--Field for email subject-->
                  <div>
                      <label for="sujet">Sujet :</label>
                      <?php if(!$sujet_error){ ?><input type="text" id="sujet" name="sujet" class="inputs" placeholder="Tapez le sujet de votre mail" value="<?php echo htmlspecialchars($sujet) ?>"/><?php }else{ ?> <input type="text" id="sujet" name="sujet" class="inputs" placeholder= "Tapez le sujet de votre mail" style='border : 2px solid red'/> <?php } ?>
                  </div>
                  <br>
                  <!--Field for email body-->
                  <div>
                      <label for="contenu">Contenu:</label>
                      <?php if(!$contenu_error){ ?><textarea id="contenu" name="contenu" class="" placeholder="Votre message"><?php echo $contenu ?></textarea><?php }else{ ?> <textarea id="contenu" name="contenu" class="" placeholder="Votre message" style="border : 2px solid red"></textarea><?php } ?>
                  </div>
                  <br>
                  <div>
                    <button  id="submit">Envoyer</button>
                  </div>
                  <p id="champ_vide" class=""></p>
                  <?php if($error){ ?> <p style="color : red">Veuillez remplir tous les champs de saisie qui sont rouges</p> <?php } ?>
              </form>
          </div>

      </main>

      <?php require('./php/footer.php');?>


  </body>
</html>
