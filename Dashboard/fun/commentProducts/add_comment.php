<?php

include '../connection.php';


if ($_SERVER['REQUEST_METHOD']=='POST') {

    $nameperson=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_STRING);
    $desc=$_POST['review'];
    $productid=$_POST['productid'];

    $stmt_comment=$coon->prepare("INSERT INTO products_comments(namePerson,email,review,product_id)
     VALUES(:namePerson,:email,:review,:product_id)");
    $stmt_comment->execute([
        'namePerson'=>$nameperson,
        'email'=>$email,
        'review'=>$desc,
        'product_id'=>$productid

    ]);

    echo $desc .'<br>' ;
    echo $nameperson;
}

?>