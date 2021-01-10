            <?php include "../connection.php";
                
                session_start();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email         =  filter_var($_POST['email'],FILTER_SANITIZE_STRING);
            $passwword       =  filter_var($_POST['passwword'],FILTER_SANITIZE_STRING); 
            $stmt     =  $coon->prepare("SELECT *  FROM users WHERE email = ? ");
            $stmt->execute([$email]); 
            $row    =  $stmt->fetch(); 
            $count      =  $stmt->rowCount();  


            if($count>0){
            if(password_verify($passwword,$row['passwword'])){
                $_SESSION['username']=$row['id'];
                $_SESSION['email'] = $row['email'];
            
                $_SESSION['loggedIn'] = true;

                ?>
                <script>
                window.location.href="index.php";
                </script>
                <?php
                exit();
            }else{

               echo "Password Wrong";
                exit();
            }
            }
            else{
                echo "the Data are empty";

            exit();
            }
            }
            else{
            header("Location:showmsg.php");
            exit();
            }
