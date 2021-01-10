

<?php include "Dashboard/style/header.php";

include "Dashboard/style/nav.php";
include "Dashboard/style/bottombar.php"

?>
      
       
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    include "Dashboard/fun/connection.php";
              
                    
                    if(isset( $_SESSION['loggedIn'] )){?>
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>color</th>
                                            <th>Total</th>
                                            <th>case</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    include 'Dashboard/fun/connection.php';
                                         $ide= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id']:0;
                                        $stmt=$coon->prepare("SELECT * FROM cart WHERE unique_user=? ");
                                        $stmt->execute([$ide]);
                                        while ($row=$stmt->fetch()) {?>

                                  <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="Dashboard/Photos/products/<?php echo $row['img_product']?>" alt="Image"></a>
                                                    <p><?php echo $row['pro_title']?></p>
                                                </div>
                                            </td>
                                            <td><?php echo $row['pro_price']?></td>
                                            <td>
                                            
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="<?php echo $row['pro_quantity'] ?>">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                                <td><?php echo $row['color']?></td>
                                            
                                            
                                            <td><?php echo $row['total_price']?></td>

                                            <td><?php echo  $row['casee']?></td>
                                            <td>
                                            <?php if($row['casee']=="not ok request") {    ?>
                                                <a id="remove" href="Dashboard/fun/cart/cart_remove.php?idcart=<?php echo $row['id']?>">
                                            <i class="fa fa-trash"></i></a>
                                            <?php
                                        }else{
                                            echo "___";
                                        }?>
                                            
                                            </td>
                                        </tr>
                                       
                                       
                                    </tbody>
                                    
                                    <?php }
                                    
                                    ?>
                                    
                                
                                
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="coupon">
                                        <input type="text" placeholder="Coupon Code">
                                        <button>Apply Code</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">

                                                <?php
                                                include 'Dashboard/fun/connection.php';
                                                $idee= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id']:0;

                                                $stmt_total=$coon->prepare("SELECT *FROM cart WHERE unique_user=?");
                                               
                                                $stmt_total->execute([$idee]);
                                                $total=0;
                                            
                                                    while($row_cart=$stmt_total->fetch()){
                                                              if($row_cart['casee']=="not ok request") {                         
                                                              $total +=$row_cart['total_price'];
                                                            }else{
                                                            $total=0;
                                                            }
                                                        }
                                               
                                           
                                               
                                                ?>
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span><?php echo $total ?></span></p>
                                            
                                            
                                        </div>
                                        <div class="cart-btn">
                                            <button onclick="window.location.href='product-list.php'">Add other Products</button>
                                            <?php
                                 $id_editt=$_SESSION['username']; 
                                 $stmt_editt=$coon->prepare("SELECT * FROM checkout WHERE unique_user=?");
                                 $stmt_editt->execute([$id_editt]);
                                 $row_editt=$stmt_editt->rowCount();
                                 $row_fet=$stmt_editt->fetch();
                                
                                        
                                        $idee= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id']:0;

                                        $stmt_total=$coon->prepare("SELECT *FROM cart WHERE unique_user=?");
                                       
                                        $stmt_total->execute([$idee]);
                                            $id=0;    
                                        while($row_total=$stmt_total->fetch()){
                                            
                                        if ($row_total['casee']=="ok request") {
                                        }elseif($row_total['casee']=="not ok request") {
                                        ?>
                                        
                                       <button onclick="window.location.href='checkout.php?idend=<?php echo  $_SESSION['username'] ?>'">Checkout</button>
                                        <?php }?>
                                     <?php 
                                    }
                                
                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php }
                 else {
                     echo "Cart is empty";
                 }
                 ?>
        
            </div>
        </div>
        <?php include "Dashboard/style/footer.php"?>
        <?php
      