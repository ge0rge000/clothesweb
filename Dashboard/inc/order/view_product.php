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
</head>
<body>

<table style="width:100%">
  <tr>
    <th>product</th>
    <th>quantity</th>
    <th>pricequantity</th>
    <th>color</th>
    <th>size</th>
    <th>time</th>


  </tr>
<?php
include '../../fun/connection.php';
$id=isset($_GET['id']) && is_numeric($_GET['id'])?$_GET['id']:0; 
  $stmt=$coon->prepare("SELECT * FROM cart where id=? ");
  $stmt->execute([$id]);
  while ($row=$stmt->fetch()) {
      ?>
  <tr>
    <td><?php echo $row['pro_title']?></td>
    <td><?php echo $row['pro_quantity']?></td>
    <td><?php echo $row['total_price']?></td>
    <td><?php echo $row['color']?></td>
    <td><?php echo $row['size']?></td>
    <td><?php echo $row['time']?></td>

  </tr>
  <?php
  }?>
</table>

</body>
</html>
