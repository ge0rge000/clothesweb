<?php include "../style/header.php"?>



<?php include "../style/navsideadmin.php"?>


<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<h2>Collapsed Borders</h2>

<table style="width:100%">
  <tr>
    <th>username</th>
    <th>email</th> 
    <th>image</th>
    <th>mobilephone</th>
  </tr>


  <?php include "../fun/connection.php";
  
  $stmt_table=$coon->prepare("SELECT * FROM users ");
  $stmt_table->execute();
  
  while( $row_table=$stmt_table->fetch()){

  
?>
  <tr>
    <td><?php echo  $row_table['username'] ?></td>
    <td><?php echo  $row_table['email'] ?></td>
    <td><img src="../Photos/register/<?php echo $row_table['image_name']?>" width="50px" style=" justify-content: center;
    align-content: center;
    padding: 6px;"></td>
    <td><?php echo  $row_table['mobilephone'] ?></td>
  </tr>

<?php } ?>

 
</table>

</body>
</html>

<?php include "../style/footer.php"?>