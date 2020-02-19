<?php
require '../../models/Database.php';
require '../../models/Admin.php';
require '../../models/Client.php';
require '../../models/Genre.php';
require '../../models/Show.php';
require '../../models/ShowType.php';
require '../../models/Ticket.php';
$arrayError = [];
$client = new Clients();

// ERROR MAIL
$regexMail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';

if (isset($_POST['mailLogin'])) {
    if (preg_match($regexMail, $_POST['mailLogin']) == 0) {
        $arrayError['mailLogin'] = 'Veuillez respecter le format';
    };
    if (empty($_POST['mailLogin'])) {
        $arrayError['mailLogin'] = 'Veuillez remplir le champ';
    };
};
// ERROR PASSWORD
$regexPassword = '/^[a-z0-9A-Z]{1,15}$/';

if (isset($_POST['passwordLogin'])) {
    if (preg_match($regexPassword, $_POST['passwordLogin']) == 0) {
        $arrayError['passwordLogin'] = 'Veuillez respecter le format - MAX 15 CARACTERES';
    };
    if (empty($_POST['passwordLogin'])) {
        $arrayError['passwordLogin'] = 'Veuillez remplir le champ';
    };
};
// REDIRECTION SI CLIENT ACCOUNT ISSET
if (empty($arrayError) && isset($_POST['loginUser']) && !isset($e)) {
    $clientList = $client->listClients();
    foreach ($clientList as $row) {
        if ($_POST['mailLogin'] == $row['mail_Clients'] && password_verify($_POST['passwordLogin'], $row['password_Clients']) == 'true') {
            $_SESSION['id'] = $row['id_Clients'];
            $_SESSION['lastname'] = $row['lastName_Clients'];
            $_SESSION['firstname'] = $row['firstName_Clients'];
            $_SESSION['birthdate'] = $row['birthDate_Clients'];
            $_SESSION['mail'] = $row['mail_Clients'];
            $_SESSION['password'] = $row['password_Clients'];
            header('Location: http://colyseumv2/views/clients/detailClient.php?clientId=' . $_SESSION['id']);
        } else {
            $arrayError['accountNoExist'] = 'Ce compte n\'existe pas, veuillez vérifier vos données de connections ou créez un compte';
        };
    };
};
?>