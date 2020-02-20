<?php require('../../controllers/clients/editClientController.php'); ?>
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

  <title>Editer compte</title>
</head>

<body>
  <?php require('../header.php') ?>
  <div class="container-fluid">
    <div class="row justify_content-center">
      <div class="col-lg-6 col-sm-12 p-0">
        <!-- FORM -->
        <form method="POST" action="">
          <div class="form-group m-lg-5 m-3 p-5 borderRadiusFormLogin shadow">
            <p class="h3">MODIFICATION DES INFORMATIONS</p>
            <!-- LASTNAME -->
            <label for="lastnameEdit" class="my-2"><i class="fas fa-user"></i> Nom</label>
            <input type="text" class="form-control" id="lastnameEdit" name="lastnameEdit" title="Nom" placeholder="ex: Dupont" value="<?= isset($_POST['editClientSubmit']) && !empty($arrayError) ? $_POST['lastnameEdit'] : $_SESSION['lastname'] ?>" />
            <p class="error"><?= isset($arrayError['lastnameEdit']) ? $arrayError['lastnameEdit'] : '' ?></p>
            <!-- FIRSTNAME -->
            <label for="firstnameEdit" class="my-2"><i class="fas fa-user"></i> Prénom</label>
            <input type="text" class="form-control" id="firstnameEdit" name="firstnameEdit" title="Prénom" placeholder="ex: Paul" value="<?= isset($_POST['editClientSubmit']) && !empty($arrayError) ? $_POST['firstnameEdit'] : $_SESSION['firstname'] ?>" />
            <p class="error"><?= isset($arrayError['firstnameEdit']) ? $arrayError['firstnameEdit'] : '' ?></p>
            <!-- BIRTHDATE -->
            <label for="birthdateEdit" class="my-2"><i class="fas fa-birthday-cake"></i> Date de naissance</label>
            <input type="date" class="form-control" id="birthdateEdit" name="birthdateEdit" title="Date de naissance" value="<?= isset($_POST['editClientSubmit']) && !empty($arrayError) ? $_POST['birthdateEdit'] : $_SESSION['birthdate'] ?>" />
            <p class="error"><?= isset($arrayError['birthdateEdit']) ? $arrayError['birthdateEdit'] : '' ?></p>
            <!-- MAIL -->
            <label for="mailEdit" class="my-2"><i class="fas fa-at"></i> Mail</label>
            <input type="email" class="form-control" id="mailEdit" name="mailEdit" title="Mail" placeholder="ex: name@example.com" value="<?= isset($_POST['editClientSubmit']) && !empty($arrayError) ? $_POST['mailEdit'] : $_SESSION['mail'] ?>" />
            <p class="error"><?= isset($arrayError['mailEdit']) ? $arrayError['mailEdit'] : '' ?></p>
            <!-- PASSWORD -->
            <label for="passwordEdit" class="my-2"><i class="fas fa-unlock-alt"></i> Nouveau mot de passe</label>
            <input type="password" class="form-control" id="passwordEdit" name="passwordEdit" title="Mot de passe" />
            <p class="error"><?= isset($arrayError['passwordEdit']) ? $arrayError['passwordEdit'] : '' ?></p>
            <!-- PASSWORD CONFIRME -->
            <label for="passwordEditConfirm" class="my-2"><i class="fas fa-unlock-alt"></i> Confirmer avec mot de passe actuel</label>
            <input type="password" class="form-control" id="passwordEditConfirm" name="passwordEditConfirm" title="Mot de passe de confirmation" />
            <p class="error"><?= isset($arrayError['passwordEditConfirm']) ? $arrayError['passwordEditConfirm'] : '' ?></p>
            <!-- SUBMIT -->
            <button class="btn btn-outline-dark shadow my-3" type="submit" name="editClientSubmit">Modifier</button>
            <p class="validate"><?= isset($_POST['editClientSubmit']) && isset($arrayError) && empty($arrayError) ? 'Compte modifié avec succès !' : '' ?></p>
          </div>
        </form>
      </div>
      <div class="col-lg-6 col-sm-10 p-0">
        <!-- PICTURE -->
        <img src="../../assets/img/editClient.jpg" class="m-lg-5 mb-3 borderRadiusPicLogin shadow img-fluid" alt="Image illustration page connexion" title="Image illustration" />
      </div>
    </div>
  </div>

  <?php require('../footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>