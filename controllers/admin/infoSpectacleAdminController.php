<?php
require '../../models/Database.php';
require '../../models/Show.php';
$ShowManager = new Show();
if (isset($_GET['id']) && !empty($_GET['id']))
{
    $ShowManager->getShow($_GET['id']);

}
if(isset($_POST['logoutAdmin']) || !isset($_SESSION['idAdmin'])) {
    session_unset();
    session_destroy();
    header('Location: http://colyseumv2/views/admin/connexionAdmin.php');
};
?>