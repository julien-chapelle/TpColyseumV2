<?php
require 'connexionAdminController.php';
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <!-- Logo title -->
    <link rel="shortcut icon" href="../../assets/img/logoLhp3Arena.png" class="lhp3LogoTitle" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>LHP3 Arena</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Connexion Administrateur</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 borderRadiusFormLogin">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="loginAdmin">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="loginAdmin" id="loginAdmin" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="passwordAdmin">Mot de Passe</label>
                            <input type="password" class="form-control" name="passwordAdmin" id="passwordAdmin" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-sm btn-block btn-outline-dark" name="connexionAdmin">Connexion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>