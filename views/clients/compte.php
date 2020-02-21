<?php require('../../controllers/clients/compteController.php'); ?>
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

  <title>Connexion compte</title>
</head>

<body>
  <?php require('../header.php') ?>
  <div class="container-fluid">
    <div class="row justify_content-center">
      <div class="col-lg-6 col-sm-10 p-0">
        <!-- PICTURE -->
        <img src="../../assets/img/loginPic.jpg" class="m-lg-5 mt-3 borderRadiusPicLogin shadow img-fluid" alt="Image illustration page connexion" title="Image illustration" />
      </div>
      <div class="col-lg-6 col-sm-12 p-0">
        <!-- FORM LOGIN -->
        <div class="form-group m-lg-5 m-3 p-5 borderRadiusFormLogin shadow">
          <form method="POST" action="">
            <!-- MAIL -->
            <label for="mailLogin" class="my-2"><i class="fas fa-at"></i> Mail</label>
            <input type="email" class="form-control" id="mailLogin" name="mailLogin" title="Email de connexion" placeholder="ex: name@example.com" value="<?= isset($_POST['loginUser']) && !empty($arrayError) ? $_POST['mailLogin'] : '' ?>" />
            <p class="error"><?= isset($arrayError['mailLogin']) ? $arrayError['mailLogin'] : '' ?></p>
            <!-- PASSWORD -->
            <label for="passwordLogin" class="my-2"><i class="fas fa-unlock-alt"></i> Mot de passe</label>
            <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" title="Mot de passe de connexion" />
            <p class="error"><?= isset($arrayError['passwordLogin']) ? $arrayError['passwordLogin'] : '' ?></p>
            <!-- SUBMIT -->
            <button class="btn btn-outline-dark shadow my-3" title="Connexion au compte" name="loginUser">Connexion</button>
            <p class="error"><?= isset($_POST['loginUser']) && !empty($_POST['mailLogin']) && !empty($_POST['passwordLogin']) && isset($arrayError) && !empty($arrayError) ? $arrayError['accountNoExist'] : '' ?></p>
          </form>
          <!-- ADD CLIENT -->
          <a class="text-dark m-2" href="http://colyseumv2/views/clients/addClient.php" title="Lien vers création compte">Vous n'avez pas de compte ?</a>
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