<div class="top-bar">
            <div class="container-fluid">
                <div class="row">

                    <?php
                    include "Dashboard/fun/connection.php";
                    session_start();
                    
                    if(isset( $_SESSION['loggedIn'] )){
             
                    $stmt=$coon->prepare("SELECT * FROM users ");
                    $stmt->execute();
                    $row=$stmt->fetch();
                    ?>
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                       <?php echo $_SESSION['email']?>
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        <?php echo $row['mobilephone']?>
                        <?php
                         }elseif(!isset( $_SESSION['loggedIn'] )){
                             ?>
                             <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                       YOUR EMAIL
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        Your number


                        <?php }
                         
                         ?>
                    </div>
                    <div class="col-sm-3">
                        <a href="Dashboard/fun/endsession.php" 
    style=" position: absolute;
    top: -23px;
    right: -1068px;
    opacity: 0.7;
    border: aqua;
    border-radius: 5px;
    background-color: antiquewhite;">exit</a>
                    </div>
                </div>
            </div>
        </div>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Products</a>
                           
                            <a href="cart.php?id=<?php echo $_SESSION['username'] ?>" class="nav-item nav-link">Cart</a>
                            <a href="my-account.php" class="nav-item nav-link active">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                    <a href="login.php" class="dropdown-item">Login & Register</a>
                                    <a href="contact.php" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Login</a>
                                    <a href="#" class="dropdown-item">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>