<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>


  

<?php include "../fun/connection.php"?>
<?php include "../style/header.php"?>
        <?php include "../style/bottombaradmin.php"?>

        <div class="header">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">
                <?php include '../style/navsideadmin.php'?>
                </div>
                <div class="col-md-6">
                
<table style="    width: 50%;
    position: relative;
    top: 0px;
    left: -74px;
">


 
  
<tr>

  <th>name</th>
  <th>email</th>
  <th>mobilenumber</th>
  <th>governate</th>
  <th>City</th>
  <th>Address</th>
 
</tr>
<?php include "../fun/connection.php";

$stmtuser=$coon->prepare("SELECT * from checkout");
$stmtuser->execute([]);

?>
<?php while($rowuser=$stmtuser->fetch()){?>

<tr>
  <th><?php echo($rowuser['firstname'])?> <?php echo(" ".$rowuser['lastname'])?></th>
  <th><?php echo $rowuser['email']?></th>
  <th>0<?php echo $rowuser['mobilenumber']?></th>
  
  <td><?php echo $rowuser['governorate']?></td>
  <td><?php echo $rowuser['city']?></td>
  <td><?php echo $rowuser['address']?></td>
</tr>
<?php
}?>
</table>
<table  class="gee" style="    width: 50%;
    position: absolute;
    left: 528px;
    top: 0px;">


 
  
<tr>

  <th>cart</th>
  <th>ship</th>
  <th>total</th>
  <th>pay</th>
  <th>numbervisa</th>
  <th>Products</th>
 
</tr>
<?php include "../fun/connection.php";

$stmtuser=$coon->prepare("SELECT * from end");
$stmtuser->execute([]);

?>
<?php while($rowuser=$stmtuser->fetch()){?>
<tr class="ge" style="height: 58px;">

  <th><?php echo($rowuser['cart'])?></th>
  <th><?php echo $rowuser['ship']?></th>
  <th><?php echo $rowuser['total']?></th>
  
  <td><?php echo $rowuser['pay']?></td>
  <td><?php echo $rowuser['numbervisa']?></td>
  <td><a href="../inc/order/view_product.php?id=<?php echo $rowuser['user'] ?>">viewProduct</a></td>
</tr>
<?php
}?>
</table>

                    
                </div>
            </div>
        </div>
     
    
       <?php include "../style/footer.php"?>

















