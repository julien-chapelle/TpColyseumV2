<?php
require '../../controllers/admin/indexAdminController.php';
?>
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

    <title>Admin - tableau de bord</title>
</head>

<body>
    <?php require '../header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <h1 class="text-center">Interface Admin</h1>
            </div>
            <div class="col-4">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-11">
                <div class="row">
                    <div class="col-4 text-left">
                        <h2>Liste des Spectacles</h2>
                    </div>
                    <div class="col-4 text-center">
                        <form method="POST" action="">
                            <button class="btn btn-sm btn-success" type="submit" name="logoutAdmin" title="Déconnexion admin" >Déconnexion</button>
                        </form>
                    </div>
                    <div class="col-4 text-right">
                        <a type="button" class="btn btn-sm btn-success" href="addShows.php">Ajouter un
                            spectacle</a>
                    </div>
                </div>
                <div class="table-responsive borderRadiusFormLogin">
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
                                    <td scope="row"><img src="../../assets/img/<?= $shows['img_Shows'] ?>" class="img-fluid" alt="Affiche du Spectacle" height="100" width="100" /></td>
                                    <td><?= $shows['title_Shows'] ?></td>
                                    <td><?= $shows['performer_Shows'] ?></td>
                                    <td><?= date('d/m/Y', strtotime($shows['dateHour_Shows'])) ?> /
                                        <?= date('H:i', strtotime($shows['dateHour_Shows'])) ?></td>
                                    <td><?= date('H:i', strtotime($shows['duration_Shows'])) ?></td>
                                    <td><?= $shows['types_ShowTypes'] ?></td>
                                    <td><?= $shows['name_Genres'] ?></td>
                                    <td><a type="button" class="btn btn-sm btn-secondary" href="infoSpectacleAdmin.php?id=<?= $shows['id_Shows'] ?>">Détails</a>
                                    </td>
                                    <td><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteShows<?= $shows['id_Shows'] ?>">Supprimer</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="row">
                    <div class="col-10">
                        <h2>Liste des utilisateurs</h2>
                    </div>
                </div>
                <div class="table-responsive borderRadiusFormLogin">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col" class="text-nowrap">Date de Naissance</th>
                                <th scope="col">Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listClients as $index => $clients) : ?>
                                <tr>
                                    <td><?= $clients['lastName_Clients'] ?></td>
                                    <td><?= $clients['firstName_Clients'] ?></td>
                                    <td><?= date('d/m/Y', strtotime($clients['birthDate_Clients'])) ?></td>
                                    <td><?= $clients['mail_Clients'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-11">
                <div class="row">
                    <div class="col-10">
                        <h2>Tickets en vente</h2>
                    </div>
                    <div class="col-2">
                        <a type="button" class="btn btn-sm btn-success mt-2" href="addTickets.php">+</a>
                    </div>
                </div>
                <div class="table-responsive borderRadiusFormLogin">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Prix</th>
                                <th scope="col">Offre</th>
                                <th scope="col">Spectacle</th>
                                <th scope="col">Edition</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listTickets as $index => $tickets) : ?>
                                <tr>
                                    <td><?= $tickets['price_Tickets'] ?> €</td>
                                    <td><?= $tickets['type_Tickets'] ?></td>
                                    <td><?= $tickets['title_Shows'] ?></td>
                                    <td><a type="button" class="btn btn-sm btn-danger" href="?deleteTicket=<?= $tickets['id_Tickets'] ?>">Suppr</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($listShows as $index => $shows) : ?>
        <!-- Modal -->
        <div class="modal fade" id="deleteShows<?= $shows['id_Shows'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteShowsTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteShowsTitle">Suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer ce spectacle ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-outline-danger" href="?deleteShows=<?= $shows['id_Shows'] ?>">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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