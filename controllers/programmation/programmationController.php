<?php
require '../../models/Database.php';
require '../../models/Show.php';

$show = new Show();
$months = $show->toListByMonth();
$shows = $show->toListByMonth();
if(isset($_POST["search"]) && !empty($_POST["search"])){
    $search = $_POST["search"];
    $resultSearch = $show->toSearch($search);
}
if(isset($_POST["returnListProgrammation"])) {
    header('Refresh: 0');
}
?>