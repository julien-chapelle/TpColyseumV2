<?php
require '../../controllers/admin/addTicketsController.php';
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

    <title>Admin - Ajout ticket</title>
</head>

<body>
    <?php require '../header.php';?>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-4 borderRadiusFormLogin">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="priceTicket">Prix</label>
                            <input type="text" class="form-control form-control-sm" name="priceTicket" id="priceTicket" />
                        </div>
                        <div class="form-group col-8">
                            <label for="typesTicket">Types d'Offre</label>
                            <input type="text" class="form-control form-control-sm" name="typesTicket" id="typesTicket" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="showTicket">Spectacle</label>
                            <select class="custom-select custom-select-sm" name="showTicket">
                                <option value="0">Choisissez un spectacle</option>
                                <?php foreach ($listShows as $index => $shows):?>
                                    <option value="<?=$shows['id_Shows']?>"><?=$shows['title_Shows']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-6">
                            <button type="submit" class="btn btn-sm btn-block btn-outline-dark" name="confirmAddTicket">Ajouter le ticket</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>