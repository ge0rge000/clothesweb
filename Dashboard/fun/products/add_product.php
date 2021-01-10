<?php

include"../connection.php";
if($_SERVER['REQUEST_METHOD']=='POST'){

    $img=$_FILES['image'];
    $img_name=$img['name'];
    $img_size=$img['size'];
    $img_tmp=$img['tmp_name'];
    $img_error=$img['error'];

    $allowextinsion=array('jpg','jpeg','png');
    if($img_error == 4){
        echo "check the file";
        exit();
    }else{
        $img_explode=explode('.',$img_name);
        $img_extinsion=end($img_explode);
        $new_name=rand(1,100000000).$img_extinsion;

        if(!in_array($img_extinsion,$allowextinsion)){
            echo "check the file type";
            exit();
        }else{
            if($img_size>15728640){
                echo "the file is big";
                exit();
            }
        }
    }
move_uploaded_file($img_tmp,'../../Photos/products/'.$new_name);


$tileProduct=filter_var($_POST['titleproduct'],FILTER_SANITIZE_STRING);
$priceProduct=filter_var($_POST['priceproduct'],FILTER_SANITIZE_NUMBER_INT);
$desc_prod=$_POST['DESC_PROD'];


$stmtProd=$coon->prepare("INSERT INTO 
products(title_product,price_product,img_product,Description_product)
 VALUES(:title_product,:price_product,:img_product,:Description_product)");
$stmtProd->execute([
    'title_product'=>$tileProduct,
    'price_product'=>$priceProduct,
    'img_product'=>$new_name,
    'Description_product'=>$desc_prod,

]);

header('Location:../../products/products.php');



}else{
    exit();
}


?>