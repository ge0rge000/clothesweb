<?php   include"../connection.php"   ;

if($_SERVER['REQUEST_METHOD']=="POST"){


        $img=$_FILES['image'];
        $img_name=$img['name'];
        $img_size=$img['size'];
        $img_temp=$img['tmp_name'];
        $img_error=$img['error'];

        $allow_extinsion= array('jpg','jpeg','png');
        if($img_error == 4){
            echo "please cheack file";
            exit();
        }
        else{
            $img_explode = explode(".",$img_name);
            $img_extinsion = end($img_explode);

            $new_name=rand(1,10000000000).'.'.$img_extinsion;

            if(!in_array($img_extinsion,$allow_extinsion)){
                echo 'your file not support';
            }else{
                if($img_size>15728640){
                    echo "please uplad another file because big size";
                    exit();
                }
            }
        }

        move_uploaded_file($img_temp,'../../Photos/register/'.$new_name);


        $username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $mobilephone=filter_var($_POST['mobilephone'],FILTER_SANITIZE_NUMBER_INT);
        $passwword=filter_var($_POST['passwword'],FILTER_SANITIZE_STRING);
        $passwordhash=password_hash($passwword,PASSWORD_DEFAULT);


        $stmt_validate_email=$coon->prepare("SELECT * FROM users WHERE email =? ");
        $stmt_validate_email->execute([$email]);
        $row_validate_email=$stmt_validate_email->fetch();
        $count_validate_email=$stmt_validate_email->rowCount(); 


    if($count_validate_email>0){
        echo " the email is exist";

    }else{

            if(!empty($username)&& !empty($email) && !empty($mobilephone) && !empty($passwword)){ 

                if(filter_var($email,FILTER_VALIDATE_EMAIL)==!FALSE){
                       $stmt=$coon->prepare("INSERT INTO users(username,email,image_name,mobilephone,passwword) 
                            VALUES(:username,:email,:image_name,:mobilephone,:passwword)");
                            $stmt->execute([
                            'username'=>$username,
                            'email'=>$email,
                            'image_name'=>$new_name,
                            'mobilephone'=>$mobilephone,
                            'passwword'=>$passwordhash
                            ]);

                            $stmt_user=$coon->prepare("SELECT * FROM users LIMIT  1");
                            $stmt_user->execute([]);
                            $row_user=$stmt_user->fetch();
                            $_SESSION['username']=$row_user['id'];
?>
                            <script>
                         
                            window.location.href="index.php";
                            </script>
                           
        <?php

                            exit();
                }
                else{
                    echo "please check your email";
                }
                
                
            }
                else{
                    echo "please check your data";

                }
              }
            } 
            else{
        header("Location:showmsg.php");
        exit();
}

?>

