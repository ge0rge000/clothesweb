<?php
include"../connection.php";

if($_SERVER['REQUEST_METHOD']=='POST'){


    $img=$_FILES['image'];
    $img_name=$img['name'];
    $img_size=$img['size'];
    $img_temp=$img['tmp_name'];
    $img_error=$img['error'];
    $allow_extinsion= array('jpg','jpeg','png');
    if($img_error == 4){
        echo "please check file";
        exit();
    }else{
        $img_explode=explode(".",$img_name);
        $img_extinsion=end($img_explode);

        $new_name=rand(1,1000000000).$img_extinsion;

        if(!in_array($img_extinsion,$allow_extinsion)){
            echo "this file not support";
            exit();
            
        }else{
            if($img_size>15728640){
                echo "the file is big";
                exit();
            }
        }
    }

    move_uploaded_file($img_temp,'../../Photos/slider/'.$new_name);


    $title=filter_var($_POST['titleslider'],FILTER_SANITIZE_STRING);

    $stmt_slider=$coon->prepare("INSERT INTO slider(slider_img,slider_title) VALUES(:slider_img,:slider_title)");
    $stmt_slider->execute([
        'slider_img'=>$new_name,
        'slider_title'=>$title
    ]);
    header("Location:../../slider/slider.php");
    exit();
}else{
    exit();
}
?>