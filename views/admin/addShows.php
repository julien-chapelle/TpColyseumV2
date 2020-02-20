<?php
require '../../controllers/admin/addShowsController.php';
?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Logo title -->
    <link rel="shortcut icon" href="../../assets/img/logoLhp3Arena.png" class="lhp3LogoTitle" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />

    <title>Admin - Ajout spectacle</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Ajouter un spectacle</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <div class="card borderRadiusFormLogin">
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="imgShow">Affiche du Spectacle</label>
                                    <input type="file" class="form-control form-control-sm" name="imgShow" />
                                </div>
                                <div class="form-group col-4">
                                    <label for="durationShow">Durée</label>
                                    <input type="time" class="form-control" name="durationShow" id="durationShow" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="titleShow">Titre</label>
                                    <input type="text" class="form-control" name="titleShow" id="titleShow" />
                                </div>
                                <div class="form-group col-6">
                                    <label for="performerShow">Artiste</label>
                                    <input type="text" class="form-control" name="performerShow" id="performerShow" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="dateShow">Date</label>
                                    <input type="date" class="form-control" name="dateShow" id="dateShow" />
                                </div>
                                <div class="form-group col-6">
                                    <label for="hourShow">Heure</label>
                                    <input type="time" class="form-control" name="hourShow" id="hourShow" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="showTypes">Type de spectacle</label>
                                    <select class="custom-select" name="showTypes" id="showTypes">
                                        <?php foreach ($listShowsTypes as $index => $showtypes) : ?>
                                            <option value="<?= $showtypes['id_ShowTypes'] ?>"><?= $showtypes['types_ShowTypes'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="genreShow">Genre</label>
                                    <select class="custom-select" name="genreShow" id="genreShow">
                                        <?php foreach ($listGenres as $index => $genres) : ?>
                                            <option value="<?= $genres['id_Genres'] ?>"><?= $genres['name_Genres'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 text-center">
                                    <button type="submit" class="btn btn-sm btn-outline-dark" name="confirmAddShow">Ajouter
                                        le spectacle</button>
                                </div>
                            </div>
                        </form>
                    </div>
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