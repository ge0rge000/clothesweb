

  

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
                    if(! isset($_GET['contact'])){
                        include '../inc/contactus/view_contact.php';
                    }
                    elseif($_GET['contact'] == 'add'){
                        include '../inc/contactus/add_contact.php';
                    }
                    elseif($_GET['contact']=='edit'){
                        include '../inc/contactus/edit_contact.php';

                    }
                        ?>
                    
                </div>
            </div>
        </div>
     
    
       <?php include "../style/footer.php"?>




