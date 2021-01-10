 <!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>
</head>
<body>


<a href="?slider=add">AddSlider</a>
<table style="width:100%">
  <tr>
    <th>slidertitle</th>
    <th>sliderImg</th> 
    <th>Case</th>
    </tr>
    <?php
$stmt_slide=$coon->prepare("SELECT * FROM slider  ");
$stmt_slide->execute();
while ($row_slide=$stmt_slide->fetch()) {
    ?>
  <tr>
    <td><?php echo $row_slide['slider_title'] ?></td>
    <td><img src="../Photos/slider/<?php echo $row_slide['slider_img']?> "style="height: 50px;
    width: 104px;
    position: relative;
    right: -109px;"></td>
    <td>
    <a href="?slider=edit&id=<?php echo $row_slide['id']?>">EDIT</a>
    <a href="../fun/slider/delete_slider.php?id=<?php echo $row_slide['id']?>">DELETE</a>
</td>
  </tr>
  <?php
}?>

</table>


</body>
</html>
