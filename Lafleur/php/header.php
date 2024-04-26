<script>
function logout() {
  // Effectuer une requête AJAX vers logout.php
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'php/logout.php', true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      // La session a été supprimée avec succès
      alert('Vous avez été déconnecté.');
      // Actualiser la page
      window.location.reload();
    } else {
      // Erreur lors de la suppression de la session
      alert('Une erreur est survenue lors de la déconnexion.');
    }
  };
  xhr.send();
}
</script>

<header style="display: flex; align-items: center;">
  <img src='./images/rosier.png' alt='logo' class='logo'>
  <div style="flex: 1;">
    <h1>Société Lafleur</h1>
    <nav class="header-nav">
      <ul class="header-ul">
        <li class="header-il"><a href="index.php">Accueil</a></li>
        <li class="header-il"><a href="produit.php?cat=bulbes">Bulbes</a></li>
        <li class="header-il"><a href="produit.php?cat=roses">Rosiers</a></li>
        <li class="header-il"><a href="produit.php?cat=massif">Plantes à massif</a></li>
        <li class="header-il"><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </div>
  <!-- Conteneur de l'avatar -->
  <div style="display: flex; align-items: center; margin-right: 10%; flex-direction : column; ">
    <?php if(isset($_SESSION['username'])){ ?>
        <a href="panier.php" class="header-il" style="margin-bottom: 5px;">Panier</a>
        <a href="#" onclick="logout()" class="header-il" style="margin-top: 5px;">Déconnexion</a>
    <?php }else{ ?>
        <a href="login.php" class="header-il" style="margin-bottom: 5px;">Connexion</a>
        <a href="register.php" class="header-il" style="margin-top: 5px;">Inscription</a>
    <?php } ?>
  </div>
</header>