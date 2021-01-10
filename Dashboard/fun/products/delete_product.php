<?php
include '../connection.php';
$id= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] :0;

$stmt=$coon->prepare("DELETE  FROM products WHERE id=?");

$stmt->execute([$id]);

header("Location:../../products/products.php")
?>  