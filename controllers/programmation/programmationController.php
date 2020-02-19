<?php
require '../../models/Database.php';
require '../../models/Show.php';

$show = new Show();
$months = $show->toListMonth();
$shows = $show->toListByMonth();
if(isset($_POST["search"]) && !empty($_POST["search"])){
    $search = $_POST["search"];
    $resultSearch = $show->toSearch($search);
}
?>