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

// ERROR LASTNAME
$regexLastname = '/^[A-Za-z0-9\ \-\à\á\â\ã\ä\å\ç\è\é\ê\ë\ì\í\î\ï\ð\ò\ó\ô\õ\ö\ù\ú\û\ü\ý\ÿ]{1,20}$/';

if (isset($_POST['lastnameEdit'])) {
    if (preg_match($regexLastname, $_POST['lastnameEdit']) == 0) {
        $arrayError['lastnameEdit'] = 'Veuillez respecter le format';
    };
    if (empty($_POST['lastnameEdit'])) {
        $arrayError['lastnameEdit'] = 'Veuillez remplir le champ';
    };
};
// ERROR FIRSTNAME
$regexFirstname = '/^[A-Za-z0-9\ \-\à\á\â\ã\ä\å\ç\è\é\ê\ë\ì\í\î\ï\ð\ò\ó\ô\õ\ö\ù\ú\û\ü\ý\ÿ]{1,20}$/';

if (isset($_POST['firstnameEdit'])) {
    if (preg_match($regexFirstname, $_POST['firstnameEdit']) == 0) {
        $arrayError['firstnameEdit'] = 'Veuillez respecter le format';
    };
    if (empty($_POST['firstnameEdit'])) {
        $arrayError['firstnameEdit'] = 'Veuillez remplir le champ';
    };
};
// ERROR BIRTHDATE

if (isset($_POST['birthdateEdit'])) {
    if (empty($_POST['birthdateEdit'])) {
        $arrayError['birthdateEdit'] = 'Veuillez remplir le champ';
    };
};
// ERROR MAIL
$regexMail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';

if (isset($_POST['mailEdit'])) {
    if (preg_match($regexMail, $_POST['mailEdit']) == 0) {
        $arrayError['mailEdit'] = 'Veuillez respecter le format';
    };
    if (empty($_POST['mailEdit'])) {
        $arrayError['mailEdit'] = 'Veuillez remplir le champ';
    };
};
// ERROR PASSWORD
$regexPassword = '/^[a-z0-9A-Z]{1,15}$/';

if (isset($_POST['passwordEdit'])) {
    if (preg_match($regexPassword, $_POST['passwordEdit']) == 0) {
        $arrayError['passwordEdit'] = 'Veuillez respecter le format - MAX 15 CARACTERES';
    };
    if (empty($_POST['passwordEdit'])) {
        $arrayError['passwordEdit'] = 'Veuillez remplir le champ';
    };
};
// ERROR PASSWORD CONFIRM
$regexPasswordConfirm = '/^[a-z0-9A-Z]{1,15}$/';

if (isset($_POST['passwordEditConfirm'])) {
    if (preg_match($regexPasswordConfirm, $_POST['passwordEditConfirm']) == 0) {
        $arrayError['passwordEditConfirm'] = 'Veuillez respecter le format - MAX 15 CARACTERES';
    };
    if (empty($_POST['passwordEditConfirm'])) {
        $arrayError['passwordEditConfirm'] = 'Veuillez remplir le champ';
    };
    if (password_verify($_POST['passwordEditConfirm'], $_SESSION['password'])) {
        '';
    } else {
        $arrayError['passwordEditConfirm'] = 'Le mot de passe n\'est pas bon !';
    };
};

if (isset($_POST['editClientSubmit']) && empty($arrayError)) {
    $currentId = htmlspecialchars(intval($_SESSION['id']));
    $lastname = htmlspecialchars(ucfirst(mb_strtolower($_POST['lastnameEdit'], 'UTF-8')));
    $firstname = htmlspecialchars(ucfirst(mb_strtolower($_POST['firstnameEdit'], 'UTF-8')));
    $birthdate = htmlspecialchars($_POST['birthdateEdit']);
    $mail = htmlspecialchars($_POST['mailEdit']);
    $password = htmlspecialchars(password_hash($_POST['passwordEdit'], PASSWORD_DEFAULT));

    //Hydratation
    $client->setId($currentId);
    $client->setLastname($lastname);
    $client->setFirstname($firstname);
    $client->setBirthdate($birthdate);
    $client->setMail($mail);
    $client->setPassword($password);
    // //Edit client method
    $client->editClientsInfo();
    $client->editClientsPassword();
    $_SESSION['lastname'] = $lastname;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['birthdate'] = $birthdate;
    $_SESSION['mail'] = $mail;
    $_SESSION['password'] = $password;
    header('refresh:2;url=http://colyseumv2/views/clients/detailClient.php?client=' . $_SESSION['id']);
}
?>
