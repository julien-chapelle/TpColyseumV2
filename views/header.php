<nav class="navbar navbar-expand-lg navbar-white bg-white sticky-top">
  <a class="navbar-brand" href="http://colyseumv2/">
    <img src="../../assets/img/logoLhp3Arena.png" alt="logo Lhp3 Arena" class="lhp3Logo" title="Retour accueil" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link text-dark" href="http://colyseumv2/">Accueil</a>
      <a class="nav-item nav-link text-dark" href="http://colyseumv2/views/programmation/programmation.php">Programmation</a>
      <a class="nav-item nav-link text-dark" href="<?= isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['firstname']) ? 'http://colyseumv2/views/clients/detailClient.php?clientId=' . $_SESSION['id'] : 'http://colyseumv2/views/clients/compte.php' ?>"><?= isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['firstname']) ? '<i class="fas fa-user-check"></i> ' . $_SESSION['firstname'] : 'Mon compte' ?></a>
    </div>
  </div>
</nav>