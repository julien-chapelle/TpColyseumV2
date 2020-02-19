<?php require('../../controllers/clients/deleteClientController.php'); ?>
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

  <title>Supprimer compte</title>
</head>

<body>
  <?php require('../header.php') ?>
  <div class="container-fluid heightBody">
    <div class="row justify_content-center">
      <div class="col-lg-6 col-sm-12 p-0">
        <!-- FORM -->
        <form method="POST" action="">
          <div class="form-group m-lg-5 m-3 p-5 borderRadiusFormLogin shadow">
            <p class="h3 error"><?= isset($_SESSION) ? '<i class="fas fa-exclamation-triangle"></i> ATTENTION ' . $_SESSION['firstname'] . ' !' : '' ?></p>
            <p class="h5 error">Vous êtes sur le point de supprimer définitivement votre compte</p>
            <!-- PASSWORD CONFIRME -->
            <label for="passwordDeleteConfirm" class="my-2"><i class="fas fa-unlock-alt"></i> Confirmer avec mot de passe actuel</label>
            <input type="password" class="form-control" id="passwordDeleteConfirm" name="passwordDeleteConfirm" title="Mot de passe de confirmation" />
            <p class="error"><?= isset($arrayError['passwordDeleteConfirm']) ? $arrayError['passwordDeleteConfirm'] : '' ?></p>
            <!-- SUBMIT -->
            <button class="btn btn-outline-dark shadow my-3" type="submit" name="deleteClientSubmit">Supprimer</button>
          </div>
        </form>
      </div>
      <div class="col-lg-6 col-sm-10 p-0">
        <!-- PICTURE -->
        <img src="../../assets/img/deleteClient.jpg" class="m-lg-5 mb-3 borderRadiusPicLogin shadow img-fluid" alt="Image illustration page connexion" title="Image illustration" />
      </div>
    </div>
  </div>

  <?php require('../footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>