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


<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>email</th> 
    <th>mobilephone</th>
    <th>message</th>
    <th>Case</th>
  </tr>

  <?php
  
  $stmt=$coon->prepare("SELECT * FROM contact");
  $stmt->execute();
  while ($row=$stmt->fetch()) {
      ?>
  <tr>
    <td><?php echo $row['person']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['mobilephone']?></td>
    <td><?php echo $row['messagee']?></td>
    <td>
    <a href="?contact=edit&idcontact=<?php echo $row['id']?>">edit</a>
    <a href="../fun/contactus/delete_contact.php?idcontact=<?php echo $row['id']?>">Delete</a>

    </td>
  </tr>
  <?php
  }?>
  
</table>

</body>
</html>
