<?php
require '../../models/Database.php';
require '../../models/Show.php';
require '../../models/ShowType.php';
require '../../models/Genre.php';
$ShowManager = new Show();
$ShowTypesManager = new ShowTypes();
$GenresManager = new Genres();
$listGenres = $GenresManager->getListGenres();
$listShowsTypes = $ShowTypesManager->getListShowTypes();
$errorsMessageShows = [];
if (isset($_POST['confirmAddShow']))
{
    if (!empty($_FILES['imgShow']))
    {
        $dirFile = '../../assets/img/';
        $file = $dirFile . basename($_FILES['imgShow']['name']);
        if (move_uploaded_file($_FILES['imgShow']['tmp_name'], $file))
        {
            echo 'le fichier' . basename($_FILES['imgShow']['name']) . 'à été upload.';
            $ShowManager->setImg_Shows($_FILES['imgShow']['name']);
        }
    }
    if (!empty($_POST['titleShow']))
    {
        $ShowManager->setTitle_Shows($_POST['titleShow']);
    }
    else
    {
        $errorsMessageShows['titleShow'] = 'Veuillez indiquer le titre du spectacle.';
    }
    if (!empty($_POST['performerShow']))
    {
        $ShowManager->setPerformer_Shows($_POST['performerShow']);
    }
    else
    {
        $errorsMessageShows['performerShow'] = 'Veuillez indiquer l\'artiste du spectacle.';
    }
    if (!empty($_POST['dateShow']))
    {
        $dateShow = $_POST['dateShow'];
    }
    else
    {
    }
    if (!empty($_POST['hourShow']))
    {
        $hourShow = $_POST['hourShow'];
        $ShowManager->setDateHour_Shows($dateShow . ' ' . $hourShow);
    }
    if (!empty($_POST['durationShow']))
    {
        $ShowManager->setDuration_Shows($_POST['durationShow']);
    }
    else
    {
        $errorsMessageShows['durationShow'] = 'Veuillez indiquer la durée du spectacle.';
    }
    if (!empty($_POST['showTypes']))
    {
        $ShowManager->setId_ShowTypes($_POST['showTypes']);
    }
    else
    {
        $errorsMessageShows['showTypes'] =  'Veuillez indiquer le type du spectacle.';
    }
    if (!empty($_POST['genreShow']))
    {
        $ShowManager->setId_Genres($_POST['genreShow']);
    }
    else
    {
        $errorsMessageShows['genreShow'] = 'Veuillez indiquer le genre du spectacle.';
    }
    if (empty($errorsMessageShows))
    {

        $ShowManager->addShows();
        header('Location: indexAdmin.php');
        exit();
    }
}
?>