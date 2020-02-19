<?php
require '../../models/Database.php';
require '../../models/Admin.php';
require '../../models/Contact.php';
require '../../models/Show.php';
require '../../models/Client.php';
$ClientManager = new Clients();
$ShowManager = new Show();
$ContactManager = new Contact();
$listContact = $ContactManager->getListContact();
$listShows = $ShowManager->toListAll();
$listClients = $ClientManager->listClients();

if(isset($_POST['logoutAdmin']) || !isset($_SESSION['idAdmin'])) {
    session_unset();
    session_destroy();
    header('Location: http://colyseumv2/views/admin/connexionAdmin.php');
};
?>