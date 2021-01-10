<?php
include 'Dashboard/style/header.php';
include 'Dashboard/style/nav.php';
include 'Dashboard/style/bottombar.php';
?>
   
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
       

        <div class="checkout">
            <div class="container-fluid"> 
                <div class="row">


              

                    
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Billing Address</h2>
                                <div class="row">
                         
                                   <?php
                                   if(isset($_GET['idend'])){?>
                                                         <form class="row" id="checkout" >
                                                
                                      <?php 
                                     include "Dashboard/fun/connection.php";
                                $idcart=isset($_GET['idend']) && is_numeric($_GET['idend']) ? $_GET['idend']:0;
                                $stmt_total=$coon->prepare("SELECT *FROM cart WHERE unique_user=?");
                                               
                                                $stmt_total->execute([$idcart]);
                                               
                                                
                                                $total=0;
                                                while($row_cart1=$stmt_total->fetch()){
                                                    $total +=$row_cart1['total_price'];
                                                }
                                   ?>

                                    <input type="hidden" name="unique_user" value="<?php echo $_SESSION['username']?>">

                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" name="firstname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input class="form-control" name="lastname" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input class="form-control" name="email" type="text" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input class="form-control" name="mobilephone" type="text" placeholder="Mobile No">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label>Governate</label>
                                        <select name="governate" class="custom-select">
                                            <option>cairo</option>
                                            <option>alexendria</option>
                                            <option>minya</option>
                                            <option>Giza</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input name="city" class="form-control" type="text" placeholder="City">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input class="form-control" name="address" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Discount Code</label>
                                        <input class="form-control" name="discount_code"type="text" placeholder="Discount Code">
                                    </div>
                                    <span class="show-msggg"></span>
                                    <div class="checkout-btn">
                                    <button   type="submit" name="submit"
                                    style="    width: 300px;
    height: 50px;
    padding: 2px 10px;
    font-family: 'Source Code Pro', monospace;
    font-weight: 700;
    font-size: 25px;
    text-align: center;
    color: #000000;
    background: #FF6F61;
    border: none;
    border-radius: 4px;
    transition: all .3s;
    position: relative;
    left: 71px;
    top: 24px;">Confirm</button>
                                </div>
                                    </form>
                                   <?php
                                   }else if($_GET['id'])
                                   
                                   {
                                       ?>



                                   <form class="row" action="Dashboard/fun/checkout/checkout_edit.php" method="POST" id="checkoutttt" >
                                   
                                 <?php
                                 $id_edit=isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] :0; 
                                 $stmt_edit=$coon->prepare("SELECT * FROM checkout WHERE unique_user=?");
                                 $stmt_edit->execute([$id_edit]);
                                 $row_edit=$stmt_edit->fetch();
                                 
                                 
                                 ?>
                                  <input type="hidden" name="unique_user" value="<?php echo $row_edit['unique_user'] ?>">

                             <input type="hidden" name="ship_price" value="<?php echo $row_edit['costship']?>">

                                   <div class="col-md-6">
                                       <label>First Name</label>
                                       <input class="form-control" type="text" name="firstname" value="<?php echo $row_edit['firstname']?>" placeholder="First Name">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Last Name"</label>
                                       <input class="form-control" name="lastname" value="<?php echo $row_edit['lastname']?>" type="text" placeholder="Last Name">
                                   </div>
                                   <div class="col-md-6">
                                       <label>E-mail</label>
                                       <input class="form-control" name="email" value="<?php echo $row_edit['email']?>" type="text" placeholder="E-mail">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Mobile No</label>
                                       <input class="form-control" name="mobilephone" value="<?php echo $row_edit['mobilenumber']?>" type="text" placeholder="Mobile No">
                                   </div>
                                   
                                   <div class="col-md-6">
                                       <label>Governate</label>
                                       <select name="governate"    class="custom-select">
                                           <option selected><?php echo $row_edit['governorate']?></option>
                                           <?php if($row_edit['governorate']==='cairo'){?>
                                           
                                            <option>alexendria</option>
                                            <option>minya</option>
                                            <option >Giza</option>
                                            <?php
                                        }elseif($row_edit['governorate']==='alexendria'){?>
                                       <option>cairo</option>
                                            <option>minya</option>
                                            <option >Giza</option>
                                            <?php
                                        }elseif($row_edit['governorate']==='minya'){?>
                                             <option>cairo</option>
                                            <option>alexendria</option>
                                            <option >Giza</option>
                                            <?php
                                        }elseif($row_edit['governorate']==='Giza'){?>
                                       <option>cairo</option>
                                            <option>alexendria</option>
                                            <option >Minya</option>
                                            <?php
                                        }?>
                                        
                                       </select>
                                   </div>
                                   <div class="col-md-6">
                                       <label>City</label>
                                       <input   value="<?php echo $row_edit['city']?>" name="city" class="form-control" type="text" placeholder="City">
                                   </div>
                                   <div class="col-md-12">
                                       <label>Address</label>
                                       <input class="form-control" name="address"  value="<?php echo $row_edit['address']?>" type="text" placeholder="Address">
                                   </div>
                                   <div class="col-md-6">
                                       <label>Discount Code</label>
                                       <input class="form-control" value="<?php echo $row_edit['code']?>" name="discount_code"type="text" placeholder="Discount Code">
                                   </div>
                                  
                                   <div class="checkout-btn">
                                   <input type="submit"
                                   style="    width: 300px;
   height: 50px;
   padding: 2px 10px;
   font-family: 'Source Code Pro', monospace;
   font-weight: 700;
   font-size: 25px;
   text-align: center;
   color: #000000;
   background: #FF6F61;
   border: none;
   border-radius: 4px;
   transition: all .3s;
   position: relative;
   left: 71px;
   top: 24px;">edit</input>
                               </div>
                                   </form>
                                   
                                   
                                   
                                   <?php
                                }?>
                                 
                                   
              
                                    
                                </div>
                            </div>

                          
                        </div>
                    </div>
                   
                 
              
          </div>

            </div>
        </div>


     <?php  include 'Dashboard/style/footer.php'?>