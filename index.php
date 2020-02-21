<?php require('controllers/home/accueilController.php'); ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <!-- Logo title -->
    <link rel="shortcut icon" href="assets/img/logoLhp3Arena.png" class="lhp3LogoTitle" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <title>LHP3 Arena</title>
</head>

<body>
    <?php require('views/header.php') ?>
    <div class="container-fluid heightBody p-0 m-0">
        <div class="row justify-content-center m-0">
            <div class="col p-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/img/joker-banniere.jpg" class="carouselPicSize" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/foresti.jpg" class="carouselPicSize" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/humour.jpg" class="carouselPicSize" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div id="carouselExampleCaptionsMedia" class="carousel slide my-2 carouselSpeed" data-ride="carousel" title="Avis clients">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptionsMedia" data-slide-to="active"></li>
                                <li data-target="#carouselExampleCaptionsMedia" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptionsMedia" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <?php foreach ($list as $comment) : ?>
                                    <div class="carousel-item <?= $comment['id_Clients'] == 1 ? 'active' : '' ?>">
                                        <div class="media p-3 m-3 shadow borderRadiusFormLogin rounded">
                                            <img src="assets/img_avatar_choice/man_1.png" class="mr-3 sizeAvatarView" alt="<?= 'imageAvatar' . $comment['firstName_Clients'] ?>">
                                            <div class="media-body">
                                                <h5 class="mt-0"><?= $comment['firstName_Clients'] . ':' ?></h5>
                                                <?= $comment['text_Comment'] ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptionsMedia" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleCaptionsMedia" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- carousel media object avis fin -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php require('views/footer.php') ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
</body>

</html>