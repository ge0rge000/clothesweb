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
    $total=0;
    if($governate=='cairo'){
        $total+=30;
    }
    elseif($governate=='alexendria'){
        $total+=100;
    }
    elseif($governate=='minya'){
        $total+=150;
    }
    elseif($governate=='Giza'){
        $total+=40;
    }

    if(!empty($firstname) && !empty($lastname) 
    &&!empty($email) && !empty($mobilephone)
     && !empty($mobilephone) && !empty($governate) && !empty($city) 
     && !empty($address) 
     ){
    $stmt_checkout=$coon->prepare("INSERT INTO 
    checkout(firstname,email,lastname,mobilenumber,address,governorate,city,code,costship,unique_user)
    VALUES(:firstname,:email,:lastname,:mobilenumber,:address,:governorate,:city,:code,:costship,:unique_user)
    ");
    $stmt_checkout->execute([
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        'mobilenumber'=>$mobilephone,
        'address'=>$address,
        'governorate'=>$governate,
        'city'=>$city,
        'code'=>$discount_code,
        'costship'=> $total,
        'unique_user'=>$uniq

    ]);
    session_start();

    $stmt_checkout=$coon->prepare("SELECT * FROM  checkout ORDER BY id DESC LIMIT 1 ");
    $stmt_checkout->execute([]);
    $row_check=$stmt_checkout->fetch();
?>
        <script>          
               window.location.href="total.php?idend=<?php echo $_SESSION['username']?>&&idcheckout=<?php echo $row_check['id']?>";
        </script>
<?php
       }else{
           echo "the data empty";
    }

        
  
    
}else{
    exit();
}

?>