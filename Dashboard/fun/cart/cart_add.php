<?php

include '../connection.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $pro_title=$_POST['title_productcart'];
    $color=$_POST['color'];
    $size=$_POST['size'];
    $price=$_POST['price_productcart'];
    $quantity=filter_var($_POST['quantity'],FILTER_SANITIZE_NUMBER_INT);
    $img_prod=$_POST['img_productcart'];
    $uniqueuser=$_POST['unique_productcart'];

    $stmt_end=$coon->prepare("SELECT * FROM end WHERE user=?");
    $stmt_end->execute([$ideee]);
    $row_end=$stmt_end->rowCount();
    if( $row_end>0){
        $string ="ok request";
    }elseif($row_end==0){
        $string ="not ok request";  
    }
 
    $stmt_cart=$coon->prepare("INSERT INTO 
    cart(pro_title,pro_quantity,pro_price,color,size,img_product,total_price,unique_user,casee)
     VALUES(:pro_title,:pro_quantity,:pro_price,:color,:size,:img_product,:total_price,:unique_user,:casee)");
    $stmt_cart->execute([
        'pro_title'=>$pro_title,
        'pro_quantity'=>$quantity,
        'pro_price'=>$price,
        'color'=>$color,
        'size'=>$size,
        'img_product'=>$img_prod,
        'total_price'=>$price*$quantity,
        'unique_user'=>$uniqueuser,
        'casee'=>$string
    ]);
 


    header('Location:../../../cart.php?id='.$uniqueuser);
}else{
    exit();
}
?>
