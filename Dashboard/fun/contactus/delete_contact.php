<?php
include '../connection.php';
$idcontact= isset($_GET['idcontact']) && is_numeric($_GET['idcontact']) ? $_GET['idcontact']:0;

$stmt=$coon->prepare("DELETE FROM contact where id=?");
$stmt->execute([$idcontact]);

header('Location:../../contactus/contactus.php');

?>