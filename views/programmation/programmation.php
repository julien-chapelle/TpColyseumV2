<?php require '../../controllers/programmation/programmationController.php'; ?>
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

    <title>Programmation</title>
</head>

<body>
    <?php require "../header.php" ?>
    <div class="container">
        <h1>Liste des spectacles</h1>
        <form class="form-inline my-2 my-lg-0" action="" method="POST">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <?php if (isset($_POST["search"])) : ?>
            <?php foreach ($resultSearch as $search) : ?>
                <div class="card mb-3 mt-3 borderRadiusFormLogin">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="../../assets/img/<?= $search['img_Shows']; ?>" class="card-img" alt="Image spectacle">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><small class="text-muted"><?= $search['types_ShowTypes']; ?></small></p>
                                <h5 class="card-title h3"><?= $search['title_Shows']; ?></h5>
                                <p class="card-text">
                                    <?= utf8_encode(strftime('%d %B %Y', strtotime($search['dateHour_Shows']))) . ' (' . strftime('%HH%M', strtotime($search['duration_Shows'])) . ')' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <hr>
        <?php foreach ($months as $month) : ?>
            <h3><?= ucfirst(utf8_encode(strftime('%B', strtotime($month["month"])))) ?></h3>
            <?php foreach ($shows as $content) : ?>
                <?php if (strftime('%B', strtotime($month["month"])) == strftime('%B', strtotime($content['dateHour_Shows']))) : ?>
                    <div class="card mb-3 borderRadiusFormLogin">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="../../assets/img/<?= $content['img_Shows']; ?>" class="card-img" alt="Image spectacle">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text"><small class="text-muted"><?= $content['types_ShowTypes']; ?></small></p>
                                    <h5 class="card-title h3"><?= $content['title_Shows']; ?></h5>
                                    <p class="card-text">
                                        <?= utf8_encode(strftime('%d %B %Y', strtotime($content['dateHour_Shows']))) . ' (' . strftime('%HH%M', strtotime($content['duration_Shows'])) . ')' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>


    <?php require "../footer.php" ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>