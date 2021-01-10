<?php
include '../connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $person=filter_var($_POST['person'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $mobilephone=filter_var($_POST['mobilephone'],FILTER_SANITIZE_NUMBER_INT);
    $message=$_POST['message'];
    $idcontact=$_POST['id_contact'];
    $stmt=$coon->prepare("UPDATE contact SET person=?, email=?, mobilephone=? ,messagee=? WHERE id=?");
    $stmt->execute([$person,$email,$mobilephone,$message,$idcontact]);

    header('Location:../../contactus/contactus.php');




}else{
    exit();
}

?>