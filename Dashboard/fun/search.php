

<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include 'connection.php';
               
    $product=$_POST['result_search'];
    $stmt_prod=$coon->prepare("SELECT * FROM products WHERE title_product LIKE '%" . $product . "%' ");
    $stmt_prod->execute();
    $row_product=$stmt_prod->fetch();
?>

    <script>
    window.location.href="../../product-detail.php?id_product=<?php echo $row_product['id']?>";
    </script>
  

    
<?php    
}
                    ?>
                    