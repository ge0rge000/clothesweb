<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<style>
#show_up{
	width: 200px;
	height: 200px;
	border: 1px solid #ddd;
	display: none;
}
#show_up a{
	border-bottom: 1px solid #ddd;
	display: block;
	padding: 5px;
}
</style>
<div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                

         
                     <form class="search" id="search" method="POST" action="Dashboard/fun/search.php">
                         <input  type="text" name="result_search" />
                         
                         <button><i class="fa fa-search"></i></button>
                     </form>
                       
                  
                   
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart.html" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>

                                <?php
                                
                                include 'Dashboard/fun/connection.php';

                               
                                    $ide=$_SESSION['username'];

                                    $stmt =$coon->prepare("SELECT * FROM cart WHERE unique_user=? ") ;
                                    $stmt->execute([$ide]);
                                    $rows=$stmt->rowCount(); 
                                    ?>
                                <span><?php echo $rows ?></span>
                             
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  