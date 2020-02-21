<?php
require '../models/Database.php';
require '../models/Admin.php';
$AdminManager = new Admin();
$errorsMessageAdmin = [];

if (isset($_POST['connexionAdmin']))
{
    if (!empty($_POST['loginAdmin']))
    {
        $AdminManager->setLoginAdmin($_POST['loginAdmin']);
    }
    else
    {
        $errorsMessageAdmin['loginAdmin'] = 'Veuillez rentrer votre nom d\'utilisateur.';
    }

    if (!empty($_POST['passwordAdmin']))
    {
        $AdminManager->setPasswordAdmin($_POST['passwordAdmin']);
    }
    else
    {
        $errorsMessageAdmin['password'] = 'Veuillez rentrer votre mot de passe.';
    }
    if (empty($errorsMessageAdmin))
    {
        if ($AdminManager->connexionAdmin())
        {
            $_SESSION['idAdmin'] = $AdminManager->getIdAdmin();
            header('Location: ../views/admin/indexAdmin.php');
            exit();
        }
        else
        {
            $errorsMessageAdmin['connexion'] = 'Vos identifiants sont incorrects.';
        }
    }

}
if (isset($_SESSION['idAdmin']) && $_SERVER['PHP_SELF'] == '/loginAdmin/index.php' || isset($_SESSION['idAdmin']) && $_SERVER['REQUEST_URI'] == '/loginAdmin/') {
    header('Location: http://colyseumv2/views/admin/indexAdmin.php');
}
?>