<?php
require '../../models/Database.php';
require '../../models/Admin.php';
require '../../models/Contact.php';
require '../../models/Show.php';
require '../../models/Client.php';
require '../../models/Ticket.php';
$ClientManager = new Clients();
$ShowManager = new Show();
$ContactManager = new Contact();
$TicketManager = new Ticket();
$listContact = $ContactManager->getListContact();
$listShows = $ShowManager->toListAll();
$listClients = $ClientManager->listClients();
$listTickets = $TicketManager->getListTickets();
if (isset($_GET['deleteShows']))
{
    $ShowManager->deleteShows($_GET['deleteShows']);
    header('Location: indexAdmin.php');
    exit();
}
if (isset($_GET['deleteTicket']))
{
    $TicketManager->deleteTicket($_GET['deleteTicket']);
    header('Location: infoSpectacleAdmin.php?id=' . $_SESSION['idShow']);
    exit();
}
?>