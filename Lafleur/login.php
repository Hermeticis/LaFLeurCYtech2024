<?php 
session_start();
require_once('./varSession.inc.php');

$username_input = '';
$password_input = '';
$username_class = '';
$password_class = '';
$error = false;

// Connecting to SQLite database
try {
    $db = new PDO('sqlite:./bdd/DATA.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur : ".$e->getMessage());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Retrieve form values
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = true;
// // Search for the user in the database
    $stmt = $db->prepare('SELECT * FROM user_data WHERE username = :username AND password = :password');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($user) {
        $error = false;
        $_SESSION['username'] = $username;
        header('Location: ./index.php');
        exit();
    }
    
    // Show an error message if the username or password is incorrect
    if($error){
        $username_input = $username;
        $password_input = $password;
        $username_class = 'error-border';
        $password_class = 'error-border';
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
           <form action="login.php" method="post">
             
               <h2>Connexion</h2>
             
               <div class="input-group">
                   <label for="username">Username</label>
                   <input type="text" id="username" name="username" class="<?php echo htmlspecialchars($username_class); ?>" value="<?php echo htmlspecialchars($username_input); ?>" required>
               </div>
               <div class="input-group">
                   <label for="password">Password</label>
                   <input type="password" id="password" name="password" class="<?php echo htmlspecialchars($password_class); ?>" value="<?php echo htmlspecialchars($password_input); ?>" required>
               </div>
               <button type="submit" class="btn-submit">Login</button>
           </form>

          <?php if($error) { ?>
              <p style='color : red'>Le username ou le password est incorrect</p>
          <?php } ?>

          <br>
         <a href="register.php">Pas encore inscrit ?</a>
       </div>
   </main>

    <?php require('./php/footer.php');?>

</body>
</html>
