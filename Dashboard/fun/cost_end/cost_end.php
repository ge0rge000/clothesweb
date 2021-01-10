<?php

include "../connection.php";

if($_SERVER['REQUEST_METHOD']=='POST'){

    $cart=$_POST['cart'];
    $ship=$_POST['ship'];
   
    $pay=$_POST['pay'];
     $user=$_POST['user'];
        $numbervisa=filter_var($_POST['numbervisa'],FILTER_SANITIZE_NUMBER_INT);


            $stmt=$coon->prepare("INSERT INTO end(cart,ship,user,total,pay,numbervisa) VALUES(:cart,:ship,:user,:total,:pay,:numbervisa) ");
            $stmt->execute([
            'cart'=>$cart,
            'ship'=>$ship,
            'user'=>$user,
            'total'=>$cart+$ship,
            'pay'=>$pay ,
            'numbervisa'=>$numbervisa
            
          
        ]);


        $stmt=$coon->prepare("UPDATE cart SET casee='ok request' ");
        $stmt->execute([]);



    header("Location:../../../index.php");



}

?>