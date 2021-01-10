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

<a href="?product=add">Add Product</a>
<table style="width:100%">
  <tr>
    <th>Title</th>
    <th>Price</th>
    <th>Photo</th>
    <th>desc</th>
    <th>case</th>

  </tr>
<?php
  $stmt=$coon->prepare("SELECT * FROM products ");
  $stmt->execute();
  while ($row=$stmt->fetch()) {
      ?>
  <tr>
    <td><?php echo $row['title_product']?></td>
    <td><?php echo $row['price_product']?></td>
    <td><img src="../Photos/products/<?php echo $row['img_product']?>"
     style="width: 50px;
    height: 50px;"></td>
    <td><?php echo $row['Description_product']?></td>
    <td>
    <a href="?product=edit&id=<?php echo $row['id']?>">edit</a>
    <a href="../fun/products/delete_product.php?id=<?php echo $row['id']?>">delete</a>
    </td>
  </tr>
  <?php
  }?>
</table>

</body>
</html>
