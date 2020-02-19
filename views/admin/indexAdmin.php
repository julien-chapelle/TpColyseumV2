<?php
require('../../controllers/admin/indexAdminController.php');
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
    <div class="container-fluid heightBody">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Interface Admin</h1>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-4 text-right">
                <form method="POST" action="">
                    <button class="btn btn-sm btn-danger" type="submit" name="logoutAdmin">Déconnexion</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center borderRadiusFormLogin mx-3">
            <div class="col-5">
                <h2>Liste des utilisateurs</h2>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Date de Naissance</th>
                                <th scope="col">Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listClients as $index => $clients) : ?>
                                <tr>
                                    <td><?= $clients['lastName_Clients'] ?></td>
                                    <td><?= $clients['firstName_Clients'] ?></td>
                                    <td><?= $clients['birthDate_Clients'] ?></td>
                                    <td><?= $clients['mail_Clients'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-5">
                <h2>Liste des messages</h2>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Objet</th>
                                <th scope="col">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listContact as $index => $contact) : ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3 borderRadiusFormLogin mx-3">
            <div class="col-10">
                <div class="row">
                    <div class="col-4">
                        <h2 class="text-center">Liste des Spectacles</h2>
                    </div>
                    <div class="col-8 text-right">
                        <a type="button" class="btn btn-sm btn-success" href="addShows.php">Ajouter un spectacle</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Artiste</th>
                                <th scope="col">Date/Heure</th>
                                <th scope="col">Durée</th>
                                <th scope="col">Type</th>
                                <th scope="col">Genre</th>
                                <th scope="col" colspan="2">Editer</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($listShows as $index => $shows) : ?>
                                <tr>
                                    <td scope="row"><img src="../<?= $shows['img_Shows'] ?>" class="img-fluid" alt="Affiche du Spectacle" height="35" width="35" /></td>
                                    <td><?= $shows['title_Shows'] ?></td>
                                    <td><?= $shows['performer_Shows'] ?></td>
                                    <td><?= $shows['dateHour_Shows'] ?></td>
                                    <td><?= $shows['duration_Shows'] ?></td>
                                    <td><?= $shows['types_ShowTypes'] ?></td>
                                    <td><?= $shows['name_Genres'] ?></td>
                                    <td><a type="button" class="btn btn-sm btn-secondary" href="infoSpectacleAdmin.php?id=<?= $shows['id_Shows'] ?>">Détails</a></td>
                                    <td><a type="button" class="btn btn-sm btn-danger">Supprimer</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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