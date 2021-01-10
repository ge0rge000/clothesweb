<?php
 session_start();
 unset($_SESSION['loggedIn']);
 unset($_SESSION['email']);
 unset($_SESSION['username']);
 session_destroy();
 
 header('Location:../../index.php');
 exit();
 ?>