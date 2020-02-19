<?php require('../../controllers/clients/addClientController.php'); ?>
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

  <title>Création compte</title>
</head>

<body>
  <?php require('../header.php') ?>
  <div class="container-fluid">
    <div class="row justify_content-center">
      <div class="col-lg-6 col-sm-12 p-0">
        <!-- FORM -->
        <form method="POST" action="">
          <div class="form-group m-lg-5 m-3 p-5 borderRadiusFormLogin shadow">
            <!-- LASTNAME -->
            <label for="lastnameAdd" class="my-2"><i class="fas fa-user"></i> Nom</label>
            <input type="text" class="form-control" id="lastnameAdd" name="lastnameAdd" title="Nom" placeholder="ex: Dupont" value="<?= isset($_POST['addClientSubmit']) && !empty($arrayError) ? $_POST['lastnameAdd'] : '' ?>" />
            <p class="error"><?= isset($arrayError['lastnameAdd']) ? $arrayError['lastnameAdd'] : '' ?></p>
            <!-- FIRSTNAME -->
            <label for="firstnameAdd" class="my-2"><i class="fas fa-user"></i> Prénom</label>
            <input type="text" class="form-control" id="firstnameAdd" name="firstnameAdd" title="Prénom" placeholder="ex: Paul" value="<?= isset($_POST['addClientSubmit']) && !empty($arrayError) ? $_POST['firstnameAdd'] : '' ?>" />
            <p class="error"><?= isset($arrayError['firstnameAdd']) ? $arrayError['firstnameAdd'] : '' ?></p>
            <!-- BIRTHDATE -->
            <label for="birthdateAdd" class="my-2"><i class="fas fa-birthday-cake"></i> Date de naissance</label>
            <input type="date" class="form-control" id="birthdateAdd" name="birthdateAdd" title="Date de naissance" value="<?= isset($_POST['addClientSubmit']) && !empty($arrayError) ? $_POST['birthdateAdd'] : '' ?>" />
            <p class="error"><?= isset($arrayError['birthdateAdd']) ? $arrayError['birthdateAdd'] : '' ?></p>
            <!-- MAIL -->
            <label for="mailAdd" class="my-2"><i class="fas fa-at"></i> Mail</label>
            <input type="email" class="form-control" id="mailAdd" name="mailAdd" title="Mail" placeholder="ex: name@example.com" value="<?= isset($_POST['addClientSubmit']) && !empty($arrayError) ? $_POST['mailAdd'] : '' ?>" />
            <p class="error"><?= isset($arrayError['mailAdd']) ? $arrayError['mailAdd'] : '' ?></p>
            <!-- PASSWORD -->
            <label for="passwordAdd" class="my-2"><i class="fas fa-unlock-alt"></i> Mot de passe</label>
            <input type="password" class="form-control" id="passwordAdd" name="passwordAdd" title="Mot de passe" />
            <p class="error"><?= isset($arrayError['passwordAdd']) ? $arrayError['passwordAdd'] : '' ?></p>
            <!-- PASSWORD CONFIRME -->
            <label for="passwordConfirm" class="my-2"><i class="fas fa-unlock-alt"></i> Confirmer mot de passe</label>
            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" title="Mot de passe de confirmation" />
            <p class="error"><?= isset($arrayError['passwordConfirm']) ? $arrayError['passwordConfirm'] : '' ?></p>
            <!-- SUBMIT -->
            <button class="btn btn-outline-dark shadow my-3" type="submit" name="addClientSubmit">S'enregistrer</button>
            <p class="validate"><?= isset($_POST['addClientSubmit']) && isset($arrayError) && empty($arrayError) ? 'Compte créé avec succès !' : '' ?></p>
          </div>
        </form>
      </div>
      <div class="col-lg-6 col-sm-10 p-0">
        <!-- PICTURE -->
        <img src="../../assets/img/addClientPic.jpg" class="m-lg-5 mb-3 borderRadiusPicLogin shadow img-fluid" alt="Image illustration page connexion" title="Image illustration" />
      </div>
    </div>
  </div>

  <?php require('../footer.php') ?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>