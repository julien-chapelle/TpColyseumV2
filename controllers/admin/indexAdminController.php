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
if (isset($_GET['deleteShows'])) {
    $ShowManager->deleteShows($_GET['deleteShows']);
    header('Location: indexAdmin.php');
    exit();
}
if (isset($_GET['deleteTicket'])) {
    $TicketManager->deleteTicket($_GET['deleteTicket']);
    header('Location: indexAdmin.php');
    exit();
}
if (isset($_POST['logoutAdmin'])) {
    session_unset();
    session_destroy();
    header('Location: http://colyseumv2/loginAdmin/');
}
if ($_SERVER['PHP_SELF'] == '/views/admin/indexAdmin.php' && !isset($_SESSION['idAdmin'])) {
    header('Location: http://colyseumv2/loginAdmin/');
}
?>
