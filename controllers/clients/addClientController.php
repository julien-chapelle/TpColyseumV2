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

if (isset($_POST['lastnameAdd'])) {
    if (preg_match($regexLastname, $_POST['lastnameAdd']) == 0) {
        $arrayError['lastnameAdd'] = 'Veuillez respecter le format';
    };
    if (empty($_POST['lastnameAdd'])) {
        $arrayError['lastnameAdd'] = 'Veuillez remplir le champ';
    };
};
// ERROR FIRSTNAME
$regexFirstname = '/^[A-Za-z0-9\ \-\à\á\â\ã\ä\å\ç\è\é\ê\ë\ì\í\î\ï\ð\ò\ó\ô\õ\ö\ù\ú\û\ü\ý\ÿ]{1,20}$/';

if (isset($_POST['firstnameAdd'])) {
    if (preg_match($regexFirstname, $_POST['firstnameAdd']) == 0) {
        $arrayError['firstnameAdd'] = 'Veuillez respecter le format';
    };
    if (empty($_POST['firstnameAdd'])) {
        $arrayError['firstnameAdd'] = 'Veuillez remplir le champ';
    };
};
// ERROR BIRTHDATE

if (isset($_POST['birthdateAdd'])) {
    if (empty($_POST['birthdateAdd'])) {
        $arrayError['birthdateAdd'] = 'Veuillez remplir le champ';
    };
};
// ERROR MAIL
$regexMail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';

if (isset($_POST['mailAdd'])) {
    if (preg_match($regexMail, $_POST['mailAdd']) == 0) {
        $arrayError['mailAdd'] = 'Veuillez respecter le format';
    };
    if (empty($_POST['mailAdd'])) {
        $arrayError['mailAdd'] = 'Veuillez remplir le champ';
    };
};
// ERROR PASSWORD
$regexPassword = '/^[a-z0-9A-Z]{1,15}$/';

if (isset($_POST['passwordAdd'])) {
    if (preg_match($regexPassword, $_POST['passwordAdd']) == 0) {
        $arrayError['passwordAdd'] = 'Veuillez respecter le format - MAX 15 CARACTERES';
    };
    if (empty($_POST['passwordAdd'])) {
        $arrayError['passwordAdd'] = 'Veuillez remplir le champ';
    };
};
// ERROR PASSWORD CONFIRM
$regexPasswordConfirm = '/^[a-z0-9A-Z]{1,15}$/';

if (isset($_POST['passwordConfirm'])) {
    if (preg_match($regexPasswordConfirm, $_POST['passwordConfirm']) == 0) {
        $arrayError['passwordConfirm'] = 'Veuillez respecter le format - MAX 15 CARACTERES';
    };
    if (empty($_POST['passwordConfirm'])) {
        $arrayError['passwordConfirm'] = 'Veuillez remplir le champ';
    };
    if ($_POST['passwordAdd'] != $_POST['passwordConfirm']) {
        $arrayError['passwordConfirm'] = 'Les mots de passes ne sont pas identiques !';
    };
};

if (isset($_POST['addClientSubmit']) && empty($arrayError)) {
    $lastname = htmlspecialchars(ucfirst(mb_strtolower($_POST['lastnameAdd'], 'UTF-8')));
    $firstname = htmlspecialchars(ucfirst(mb_strtolower($_POST['firstnameAdd'], 'UTF-8')));
    $birthdate = htmlspecialchars($_POST['birthdateAdd']);
    $mail = htmlspecialchars($_POST['mailAdd']);
    $password = htmlspecialchars(password_hash($_POST['passwordAdd'], PASSWORD_DEFAULT));

    //Hydratation
    $client->setLastname($lastname);
    $client->setFirstname($firstname);
    $client->setBirthdate($birthdate);
    $client->setMail($mail);
    $client->setPassword($password);
    // //Add new client and return last insert id for login auto after add
    $lastId = $client->addClients();
    //Clients list for Foreach session create
    $clientList = $client->listClients();
    //Foreach session connection auto after create
    foreach ($clientList as $row) {
        $_SESSION['lastname'] = $row['lastName_Clients'];
        $_SESSION['firstname'] = $row['firstName_Clients'];
        $_SESSION['birthdate'] = $row['birthDate_Clients'];
        $_SESSION['mail'] = $row['mail_Clients'];
        $_SESSION['password'] = $row['password_Clients'];
    }
    $_SESSION['id'] = $lastId;
    header('refresh:2;url=http://colyseumv2/views/clients/detailClient.php?client=' . $_SESSION['id']);
}
?>
