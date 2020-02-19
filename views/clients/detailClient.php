<?php require('../../controllers/clients/detailClientController.php'); ?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <!-- Logo title -->
  <link rel="shortcut icon" href="../../assets/img/logoLhp3Arena.png" class="lhp3LogoTitle" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
  <title><?= 'Bonjour ' . $_SESSION['firstname'] . ' !' ?></title>
</head>

<body>
  <?php require('../header.php') ?>
  <div class="container-fluid heightBody">
    <div class="row justify_content-center">
      <div class="card m-5 p-2 borderRadiusFormLogin">
        <div class="row no-gutters">
          <div class="col-md-4">
            <!-- CLIENT INFO -->
            <img src="../../assets/img_avatar_choice/man_1.png" class="card-img m-lg-2 m-sm-2 img-fluid avatarPicSize" alt="Avatar" title="Avatar" />
            <div class="row">
              <div class="col">
                <a href="http://colyseumv2/views/clients/editClient.php?clientId=<?= $_SESSION['id'] ?>" class="text-dark text-right h3 mx-2" title="éditer informations"><i class="fas fa-user-edit"></i></a>
                <a href="http://colyseumv2/views/clients/deleteClient.php?clientId=<?= $_SESSION['id'] ?>" class="text-dark text-right h3 mx-2" title="Supprimer le compte"><i class="fas fa-user-times"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-5 pl-lg-3">
            <div class="card-body">
              <!-- CLIENT INFO -->
              <h5 class="card-title h3"><?= $_SESSION['lastname'] . ' ' . $_SESSION['firstname'] ?></h5>
              <p class="card-text h5"><?= 'Date de naissance : ' . $_SESSION['birthdate'] ?></p>
              <p class="card-text h5"><?= 'Mail : ' . $_SESSION['mail'] ?></p>
            </div>
          </div>
          <!-- FORM POST -->
          <form method="POST" action="">
            <div class="col-md-3">
              <!-- SUBMIT -->
              <button class="btn btn-outline-dark shadow my-3" title="Déconnexion du compte" name="logoutClient">Déconnexion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require('../footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>