

  

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
                    if(! isset($_GET['slider'])){
                        include "../inc/slider/slider_view.php";
                        } 
                        else if($_GET['slider'] == 'add'){
                            include "../inc/slider/add_slider.php";
                        }elseif($_GET['slider'] == 'edit'){
                            include "../inc/slider/edit_slider.php";
                        }
                        
                        ?>
                    
                </div>
            </div>
        </div>
     
    
       <?php include "../style/footer.php"?>




