<?php
require '../../models/Database.php';
require '../../models/Admin.php';
require '../../models/Contact.php';
require '../../models/Show.php';
require '../../models/Client.php';
require '../../models/Ticket.php';
$TicketManager = new Ticket();
$ShowManager = new Show();
$listShows = $ShowManager->toListAll();
if (isset($_POST['confirmAddTicket']))
{
    $TicketManager->setPriceTicket($_POST['priceTicket']);
    $TicketManager->setTypesTickets($_POST['typesTicket']);
    $TicketManager->setIdShows($_POST['showTicket']);
    $TicketManager->addTicket();
    header('Location: indexAdmin.php');
    exit();
}
?>