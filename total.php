

  

<?php include "Dashboard/fun/connection.php"?>
<?php include "Dashboard/style/header.php"?>
        <?php include "Dashboard/style/nav.php"?>
        <?php include "Dashboard/style/bottombar.php"?>

        <div class="header">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">
                <?php include 'Dashboard/style/navside.php'?>
                </div>
                <div class="col-md-6">
                
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1> Total</h1>
                              <?php
                              include "Dashboard/fun/connection.php";
                                $idr= isset($_GET['idcheckout']) && is_numeric($_GET['idcheckout']) ? $_GET['idcheckout'] :0 ;
                              $stmt=$coon->prepare("SELECT * FROM checkout WHERE id=?");
                              $stmt->execute([$idr]);
                              $row=$stmt->fetch();
                              $id= isset($_GET['idend']) && is_numeric($_GET['idend']) ? $_GET['idend'] :0 ;
                              $stmt=$coon->prepare("SELECT * FROM cart WHERE unique_user=?");
                              $stmt->execute([$id]);
                              $total=0;
                                 $id=0;
                              while ($rowcart=$stmt->fetch()) {
                                if ($rowcart['casee']=="not ok request") {
                                    $total +=$rowcart['total_price'];
                                    $id=$rowcart['id'];
                                } else {
                                    $total=0;
                                    $id=$rowcart['id'];
                                }
                            }
                              
                              ?>
                                 <?php
                                $ide= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] :0 ;
                              $stmte=$coon->prepare("SELECT * FROM checkout WHERE unique_user=?");
                              $stmte->execute([$ide]);
                              $rowe=$stmte->fetch();

                               $stmte=$coon->prepare("SELECT * FROM cart WHERE unique_user=?");
                               $stmte->execute([$ide]);
                               $totall=0;
                               $ide=0;
                               while ($rowcarte=$stmte->fetch()) {
                                   if ($rowcarte['casee']=="not ok request") {
                                       $totall +=$rowcarte['total_price'];
                                       $ide=$rowcarte['id'];
                                   } else {
                                       $totall=0;
                                       $ide=$rowcarte['id'];
                                   }
                               }
                              ?>
                             
                            <?php if(isset($_GET['idend'])){?>
                                <p class="sub-total">Cart Total:<span><?php echo $total?>$</span></p>
                                <p class="ship-cost">Shipping Cost:<span><?php echo $row['costship']?>$</span></p>
                                <h2>Grand Total:<span><?php echo ($total+$row['costship'])?>$</span></h2>
                                <form method="POST" action="Dashboard/fun/cost_end/cost_end.php" >

        <input name="cart" type="hidden" value="<?php echo $total?> "/>

        <input name="ship" type="hidden" value="<?php echo $row['costship']?> "/>
        <input name="user" type="hidden" value="<?php echo $id ?> "/>
    
     

                                <?php if($total>0){?>
      <input type="radio" name="pay" onclick="yesnoCheck()" id="payyy"value="cash"/> cash
      <input type="radio" name="pay" onclick="yesnoCheck()" id="payy" value="visa"/>visa
        <div  style="visibility:hidden 
        
        "  id="valuevisa">
                    <input type="text" name="numbervisa" />

        </div>
        <?php
    }elseif($total==0){
        
    }
    ?>
  <button type="submit" 
  style="width: 300px;
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
top: 78px;
left: -5px">
      Place Order
      </button>
 


</form>
                               <?php
                              }elseif(isset($_GET['id']))
                              {
                                ?>
                               <p class="sub-total">Cart Total:<span><?php echo $totall?>$</span></p>
                                <p class="ship-cost">Shipping Cost:<span><?php echo $rowe['costship']?>$</span></p>
                                <h2>Grand Total:<span><?php echo ($totall+$rowe['costship'])?>$</span></h2>
                                <form method="POST" action="Dashboard/fun/cost_end/cost_end.php" >

<input name="cart" type="hidden" value="<?php echo $totall?> "/>

    <input name="ship" type="hidden" value="<?php echo $rowe['costship']?> "/>
    <input name="user" type="hidden" value="<?php echo $ide=$rowcarte['id']?> "/>
      <input type="radio" name="pay" onclick="yesnoCheck()" id="payyy"value="cash"/> cash
      <input type="radio" name="pay" onclick="yesnoCheck()" id="payy" value="visa"/>visa
      <div  style="visibility:hidden 
      
      "  id="valuevisa">
                 <input type="text" name="numbervisa" />

      </div>
     

    
  <button type="submit" 
  style="width: 300px;
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
top: 78px;
left: -5px">
      Place Order
      </button>


</form>
                               <?php
                               }
                               ?>
                           
                       
                                <a href="checkout.php?id=<?php echo $_SESSION['username']?>" 
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
    top: 28px;
    /* left: 0; */
    left: 325px;">
                                       Back
                                        </a>
                            </div>
                        </div>
                    
                    
                </div>
            </div>
        </div>
     
    
       <?php include "Dashboard/style/footer.php"?>



       <script type="text/javascript">
history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
window.addEventListener('popstate', function(event) {
    window.location.assign("http://localhost/clothes/checkout.php?id=<?php echo $_SESSION['username']?>");
});
</script>