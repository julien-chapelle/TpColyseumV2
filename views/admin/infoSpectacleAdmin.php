<?php
require '../../controllers/admin/infoSpectacleAdminController.php';
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

    <title>Admin - détail spectacle</title>
</head>

<body>
    <?php require '../../views/header.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <h1 class="h3 text-center">Informations du spectacle</h1>
            </div>
            <div class="col-3 text-right">
                <?php if (!isset($_POST['updateShow']) && !isset($_POST['confirmUpdateShow'])) : ?>
                    <a type="button" class="btn btn-sm btn-danger" href="indexAdmin.php">Retour</a>
                <?php else : ?>
                    <a type="button" class="btn btn-sm btn-danger" href="infoSpectacleAdmin.php?id=<?= $ShowManager->getId_Shows() ?>">Retour Info</a>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!isset($_POST['updateShow']) && !isset($_POST['confirmUpdateShow'])) : ?>
            <div class="row ml-4">
                <div class="col-12">
                    <form method="POST" action="">
                        <button type="submit" class="btn btn-primary btn-sm" name="updateShow">Modifier le
                            spectacle</button>
                    </form>
                </div>
            </div>
            <div class="row justify-content-start text-center m-4 borderRadiusFormLogin p-3">
                <div class="col-2">
                    <img src="../../assets/img/<?= $ShowManager->getImg_Shows() ?>" alt="Affiche du spectacle" class="img-fluid" />
                </div>
                <div class="col-4 text-left">
                    <h2 class="font-weight-bold"><?= $ShowManager->getTitle_Shows() ?></h2>
                    <h3><?= $ShowManager->getPerformer_Shows() ?></h3>
                    <p class="m-0">Le <?= date('d/m/Y', strtotime($ShowManager->getDateHour_Shows())) ?> à
                        <?= date('H:i', strtotime($ShowManager->getDateHour_Shows())) ?> <span>(Durée :
                            <?= date('h:i', strtotime($ShowManager->getDuration_Shows())) ?>)</span></p>
                    <p><?= $ShowManager->getId_ShowTypes() ?>/<?= $ShowManager->getId_Genres() ?></p>
                    <p>Prix des billets :</p>
                </div>
                <?php if (!isset($_GET['editTickets'])) : ?>
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Offres</th>
                                    <th scope="col"></th>
                                </thead>
                                <tbody>
                                    <?php foreach ($listTickets as $index => $tickets) : ?>
                                        <tr>
                                            <td scope="row"><?= $tickets['price_Tickets'] ?></td>
                                            <td><?= $tickets['type_Tickets'] ?></td>
                                            <td><a type="button" class="btn btn-sm btn-secondary" href="?editTickets=<?= $tickets['id_Tickets'] ?>">Modifier</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="border border-dark col-4">
                        <form method="POST" action="">
                            <?php foreach ($listTickets as $index => $tickets) : ?>
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="priceTicket">Prix</label>
                                        <input type="text" class="form-control form-control-sm" name="priceTicket" id="priceTicket" value="<?= $tickets['price_Tickets'] ?>" />
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="typesTicket">Types d'Offre</label>
                                        <input type="text" class="form-control form-control-sm" name="typesTicket" id="typesTicket" value="<?= $tickets['type_Tickets'] ?>" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="showTicket">Spectacle</label>
                                        <select class="custom-select custom-select-sm" name="showTicket">
                                            <option value="0">Choisissez un spectacle</option>
                                            <?php foreach ($listShows as $index => $shows) : ?>
                                                <option <?= $shows['id_Shows'] == $tickets['id_Shows'] ? 'selected' : '' ?> value="<?= $shows['id_Shows'] ?>"><?= $shows['title_Shows'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row justify-content-center">
                                    <div class="form-group col-8">
                                        <button type="submit" class="btn btn-sm btn-block btn-success" name="confirmUpdateTicket">Confirmez</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
    </div>
<?php else : ?>
    <div class="row justify-content-center m-4 p-3 borderRadiusFormLogin">
        <div class="col-3">
            <div>
                <img src="../../assets/img/<?= $ShowManager->getImg_Shows() ?>" class="card-img-top" alt="Affiche Spectacle" />
            </div>
        </div>
        <div class="col-6">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="imgShow">Affiche du Spectacle</label>
                        <input type="file" class="form-control form-control-sm" name="imgShow" />
                    </div>
                    <div class="form-group col-2">
                        <label for="durationShow">Durée</label>
                        <input type="time" class="form-control form-control-sm" name="durationShow" id="durationShow" value="<?= date('H:i', strtotime($ShowManager->getDuration_Shows())) ?>" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="titleShow">Titre</label>
                        <input type="text" class="form-control form-control-sm" name="titleShow" id="titleShow" value="<?= $ShowManager->getTitle_Shows() ?>" />
                    </div>
                    <div class="form-group col-6">
                        <label for="performerShow">Artiste</label>
                        <input type="text" class="form-control form-control-sm" name="performerShow" id="performerShow" value="<?= $ShowManager->getPerformer_Shows() ?>" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="dateShow">Date</label>
                        <input type="date" class="form-control" name="dateShow" id="dateShow" value="<?= date('Y-m-d', strtotime($ShowManager->getDateHour_Shows())) ?>" />
                    </div>
                    <div class="form-group col-6">
                        <label for="hourShow">Heure</label>
                        <input type="time" class="form-control" name="hourShow" id="hourShow" value="<?= date('H:i', strtotime($ShowManager->getDateHour_Shows())) ?>" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="showTypes">Type de spectacle</label>
                        <select class="custom-select" name="showTypes" id="showTypes">
                            <option value="0">Choisissez un type</option>
                            <?php foreach ($listShowTypes as $showTypes) : ?>
                                <option <?= $ShowManager->getId_ShowTypes() == $showTypes['types_ShowTypes'] ? 'selected' : '' ?> value="<?= $showTypes['id_ShowTypes'] ?>"><?= $showTypes['types_ShowTypes'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="genreShow">Genre</label>
                        <select class="custom-select" name="genreShow" id="genreShow">
                            <option value="0">Choisissez un genre</option>
                            <?php foreach ($listGenres as $genres) : ?>
                                <option <?= $ShowManager->getId_Genres() == $genres['name_Genres'] ? 'selected' : '' ?> value="<?= $genres['id_Genres'] ?>"><?= $genres['name_Genres'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-6">
                        <button type="submit" class="btn btn-sm btn-block btn-outline-dark" name="confirmUpdateShow">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
<?php endif; ?>
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