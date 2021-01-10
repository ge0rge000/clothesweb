<?php
include '../connection.php';
session_start();
$id_cart= isset($_GET['idcart']) && is_numeric($_GET['idcart']) ?  $_GET['idcart']:0;

$stmt=$coon->prepare("DELETE FROM cart where id=?");
$stmt->execute([$id_cart]);



header('Location:../../../cart.php?id='.$_SESSION['username']);

?>