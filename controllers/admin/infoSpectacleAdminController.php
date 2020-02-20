<?php
require '../../models/Database.php';
require '../../models/Show.php';
require '../../models/Genre.php';
require '../../models/ShowType.php';
require '../../models/Ticket.php';
$ShowManager = new Show();
$GenreManager = new Genres();
$ShowTypesManager = new ShowTypes();
$TicketsManager = new Ticket();
$listShows = $ShowManager->toListAll();
$listGenres = $GenreManager->getListGenres();
$listShowTypes = $ShowTypesManager->getListShowTypes();
if ((isset($_GET['id']) && !empty($_GET['id'])) || isset($_SESSION['idShow']))
{
    if (isset($_GET['id']))
    {
        $_SESSION['idShow'] = $_GET['id'];
    }
    $ShowManager->getShow($_SESSION['idShow']);
    $listTickets = $TicketsManager->getTicketsByShows($_SESSION['idShow']);
}
if (isset($_POST['confirmUpdateShow']))
{
    if (!empty($_FILES['imgShow']))
    {
        $dirFile = '../../assets/img/';
        $file = $dirFile . basename($_FILES['imgShow']['name']);
        if (move_uploaded_file($_FILES['imgShow']['tmp_name'], $file))
        {
            echo 'le fichier' . basename($_FILES['imgShow']['name']) . 'à été upload.';
            $ShowManager->setImg_Shows($file);
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
    if (!empty($_POST['showTypes']) && $_POST['showTypes'] != 0)
    {
        $ShowManager->setId_ShowTypes($_POST['showTypes']);
    }
    else
    {
        $errorsMessageShows['showTypes'] =  'Veuillez indiquer le type du spectacle.';
    }
    if (!empty($_POST['genreShow']) && $_POST['genreShow'] != 0)
    {
        $ShowManager->setId_Genres($_POST['genreShow']);
    }
    else
    {
        $errorsMessageShows['genreShow'] = 'Veuillez indiquer le genre du spectacle.';
    }
    if (empty($errorsMessageShows))
    {
        $ShowManager->updateShows($_GET['id']);
    }
}
if (isset($_GET['editTickets']))
{
    if (isset($_POST['confirmUpdateTicket']))
    {
        $TicketsManager->setPriceTicket($_POST['priceTicket']);
        $TicketsManager->setTypesTickets($_POST['typesTicket']);
        $TicketsManager->setIdShows($_POST['showTicket']);
        $TicketsManager->updateTicket($_GET['editTickets']);
        header('Location: infoSpectacleAdmin.php?id=' . $_SESSION['idShow']);
        exit();
    }
}
