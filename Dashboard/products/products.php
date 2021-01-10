

  

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
                    <?php 
                    if(! isset($_GET['product'])){
                        include '../inc/products/products_view.php';
                    }
                    elseif($_GET['product'] == 'add'){
                        include '../inc/products/products_add.php';
                    }
                    elseif($_GET['product']=='edit'){
                        include '../inc/products/products_edit.php';

                    }
                        ?>
                    
                </div>
            </div>
        </div>
     
    
       <?php include "../style/footer.php"?>




