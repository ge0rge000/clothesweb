<?php
include "../connection.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
       $firstname=filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
    $lastname=filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $mobilephone=filter_var($_POST['mobilephone'],FILTER_SANITIZE_NUMBER_INT);
    $governate=$_POST['governate'];
    $city=$_POST['city'];
    $address=filter_var($_POST['address'],FILTER_SANITIZE_STRING);
    $discount_code=filter_var($_POST['discount_code'],FILTER_SANITIZE_NUMBER_INT);
    $uniq=$_POST['unique_user'];
    $ship=$_POST['ship_price'];
    $ship=0;
    if($governate==='cairo'){
        $ship+=30;
    }
    elseif($governate==='alexendria'){
        $ship+=100;
    }
    elseif($governate==='minya'){
        $ship+=150;
    }
    elseif($governate==='Giza'){
        $ship+=40;
    }
   if(!empty($firstname) && !empty($lastname) 
   &&!empty($email) && !empty($mobilephone)
    && !empty($mobilephone) && !empty($governate) && !empty($city) 
    && !empty($address) 
    ){
        $stmt_checkout=$coon->prepare("UPDATE checkout SET  firstname=?,email=?,lastname=?,mobilenumber=?,address=?,governorate=?,city=?,code=?,costship=?,unique_user=? ");
        $stmt_checkout->execute([
        $firstname,$email,$lastname,
        $mobilephone,$address,$governate,
        $city,$discount_code,$ship,$uniq ]);
       
        session_start();
        header('Location:../../../total.php?id='. $_SESSION['username']);
    }else{
        echo "the some data empty";
    }
}else{
    exit();
}

?>