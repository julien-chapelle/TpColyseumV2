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

// ERROR PASSWORD CONFIRM
$regexPasswordConfirm = '/^[a-z0-9A-Z]{1,15}$/';

if (isset($_POST['passwordDeleteConfirm'])) {
    if (preg_match($regexPasswordConfirm, $_POST['passwordDeleteConfirm']) == 0) {
        $arrayError['passwordDeleteConfirm'] = 'Veuillez respecter le format - MAX 15 CARACTERES';
    };
    if (empty($_POST['passwordDeleteConfirm'])) {
        $arrayError['passwordDeleteConfirm'] = 'Veuillez remplir le champ';
    };
    if (password_verify($_POST['passwordDeleteConfirm'], $_SESSION['password'])) {
        '';
    } else {
        $arrayError['passwordDeleteConfirm'] = 'Le mot de passe n\'est pas bon !';
    };
};
// DELETE METHOD EXECUTION
if (isset($_POST['deleteClientSubmit']) && empty($arrayError)) {
    $currentId = htmlspecialchars(intval($_SESSION['id']));
    //Hydratation
    $client->setId($currentId);
    // //Edit client method
    $client->deleteClients();
    session_unset();
    session_destroy();
    header('Location: http://colyseumv2/index.php');
}
?>
