<?php

include '../connection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){

    $name=filter_var($_POST['person'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $mobilephone=filter_var($_POST['mobilephone'],FILTER_SANITIZE_NUMBER_INT);
    $message=$_POST['message'];
 
    $stmt_caon=$coon->prepare("INSERT INTO contact(person,email,mobilephone,messagee)  
    VALUES(:person,:email,:mobilephone,:messagee)");
    $stmt_caon->execute([
        'person'=>$name,
        'email'=>$email,
        'mobilephone'=>$mobilephone,
        'messagee'=>$message
    ]);


    header('Location:../../../contact.php');


}else{
    exit();
}
?>