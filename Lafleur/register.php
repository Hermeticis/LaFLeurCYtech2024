<?php 
session_start();
require_once('./varSession.inc.php');

// Connexion à la base de données SQLite
try {
    $db = new PDO('sqlite:./bdd/DATA.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur : ".$e->getMessage());
}

//définit les valeurs du username et du mail si il y a eu une erreur
$username_input = '';
$mail_input = '';
$username_class = '';
$mail_class = '';
$error_username = false;
$error_mail = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //get the form values
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $error_username = false;
    $error_mail = false;
    
//check that the username and email are not already used
    $stmt = $db->prepare('SELECT * FROM user_data WHERE username = :username OR email = :email');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $mail);
    $stmt->execute();
    $existing_user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($existing_user) {
        if($existing_user['username'] == $username) {
            $error_username = true;
        }
        if($existing_user['email'] == $mail) {
            $error_mail = true;
        }
    }
    //check that the email is valid
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error_mail = true;
    }
    
  //show error if username and email are already used  
    if($error_username){
        $username_input = $username;
        $username_class = 'error-border';
    }
    if($error_mail){
        $mail_input = $mail;
        $mail_class = 'error-border';
    }
    
    if(!$error_mail && !$error_username){
        //add the username and email into the database
        $stmt = $db->prepare('INSERT INTO user_data (username, password, email) VALUES (:username, :password, :email)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $mail);
        $stmt->execute();
        
        //add username into session
        $_SESSION['username'] = $username;
        header('Location: ./index.php');
        exit();
    }
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-main.css">
    <link rel="stylesheet" href="css/style-login.css">
</head>

<?php require('./php/header.php'); ?>
<body>

   <main>
       <div class="login-container">
           <form action="register.php" method="post">

               <h2>S'inscrire</h2>

               <div class="input-group">
                   <label for="username">Username</label>
                 <input type="text" id="username" name="username" class="<?php echo htmlspecialchars($username_class); ?>" value="<?php echo htmlspecialchars($username_input); ?>" required>
               </div>
               <?php if($error_username){ ?> <p style='color : red'>Cet username est déjà utilisé</p> <?php } ?>

              <div class="input-group">
                   <label for="mail">Mail</label>
                   <input type="text" id="mail" name="mail" class="<?php echo htmlspecialchars($mail_class); ?>" value="<?php echo htmlspecialchars($mail_input); ?>" required>
               </div>
               <?php if($error_mail){?> <p style='color : red'>Cet mail est déjà utilisé ou n'est pas valide</p> <?php } ?>
             
               <div class="input-group">
                   <label for="password">Password</label>
                   <input type="password" id="password" name="password" required>
               </div>
               <button type="submit" class="btn-submit">S'inscrire</button>
           </form>

          <br>
         <a href="login.php">Déjà inscrit ?</a>
       </div>
   </main>

    <?php require('./php/footer.php');?>

</body>
</html>
