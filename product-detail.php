<?php include "Dashboard/style/header.php"?>
<?php include "Dashboard/style/nav.php"?>
<?php include "Dashboard/style/bottombar.php"?>
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        



        
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">


    <div class="col-md-5">
        <div class="product-slider-single normal-slider"><?php
        
        include 'Dashboard/fun/connection.php';
       
        $id=isset($_GET['id_product']) && is_numeric($_GET['id_product'])  ? $_GET['id_product'] :0 ;
        $stmtmainn=$coon->prepare("SELECT * FROM products WHERE id=? ");

        $stmtmainn->execute([$id]);

        $rowproductwid=$stmtmainn->fetch();
        ?>
            <img src="Dashboard/Photos/products/<?php echo $rowproductwid['img_product']?>" alt="Product Image">
       
           
            
        </div>
        
        <div class="product-slider-single-nav normal-slider">
            
            <div class="slider-nav-img"><img src="Dashboard/Photos/products/<?php echo $rowproductwid['img_product']?>" alt="Product Image"></div>
        
        </div>
        
        
    </div>
    <?php

    $id=isset($_GET['id_product']) && is_numeric($_GET['id_product'])  ? $_GET['id_product'] :0 ;
             $stmtmain=$coon->prepare("SELECT * FROM products WHERE id=? ");

             $stmtmain->execute([$id]);

             $rowproductwid=$stmtmain->fetch();
             ?>
    
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?php echo $rowproductwid['title_product']?></h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p><?php echo $rowproductwid['price_product']?> <span>$149</span></p>
                                        </div>
                                        <?php   if(isset( $_SESSION['loggedIn'] )){ 
                                            
                                            ?>
                                            <form method="POST" action="Dashboard/fun/cart/cart_add.php">
                                            <input type="hidden" name="title_productcart" value="<?php echo $rowproductwid['title_product']?>">
                                            <input type="hidden" name="price_productcart" value="<?php echo $rowproductwid['price_product']?>">
                                            <input type="hidden" name="img_productcart" value="<?php echo $rowproductwid['img_product']?>">
                                            <input type="hidden" name="unique_productcart" value="<?php  echo $_SESSION['username']?>">

                                            <div class="quantity">
                                                <h4>Quantity:</h4>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1" name="quantity">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="p-size">
                                                <h4>Size:</h4>
                                                
                                                <select name="size" class="btn"/> 
                                                <option>Small </option> 
                                                <option>Medium </option> 
                                                <option>Large </option>
                                                    </select>
                                            </div>
                                            <div class="p-color">
                                                <h4>Color:</h4>
                                                <div class="btn-group btn-group-sm">

                                                <select name="color" class="btn"/> 
                                                <option>White </option> 
                                                <option>Black </option> 
                                                <option>Red </option>
                                                    </select>
                                                  

                                                </div> 
                                            </div>
                                            <div class="action">
                                                <button class="btn" type="submit" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                                
                                            </div>
                                        </form>
                                        <?php
                                    }else{?>
                                         <form method="POST" action="login.php">
                                            <input type="hidden" name="title_productcart" value="<?php echo $rowproductwid['title_product']?>">
                                            <input type="hidden" name="price_productcart" value="<?php echo $rowproductwid['price_product']?>">
                                            <div class="quantity">
                                                <h4>Quantity:</h4>
                                                <div class="qty">
                                                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="1" name="quantity">
                                                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="p-size">
                                                <h4>Size:</h4>
                                                
                                                <select name="size" class="btn"/> 
                                                <option>Small </option> 
                                                <option>Medium </option> 
                                                <option>Large </option>
                                                    </select>
                                            </div>
                                            <div class="p-color">
                                                <h4>Color:</h4>
                                                <div class="btn-group btn-group-sm">

                                                <select name="color" class="btn"/> 
                                                <option>White </option> 
                                                <option>Black </option> 
                                                <option>Red </option>
                                                    </select>
                                                  

                                                </div> 
                                            </div>
                                            <div class="action">
                                                <button class="btn" type="submit" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                                
                                            </div>
                                        </form>
                                     <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                            <?php echo $rowproductwid['Description_product']?>
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">

                                            <?php
                                            $stmt_comment=$coon->prepare("SELECT * FROM products_comments WHERE product_id=?");
                                            $stmt_comment->execute([$id]);
                                            while ($row_comment=$stmt_comment->fetch()) {
                                                ?>


  
                                        <div class="reviews-submitted">
                                            <div class="reviewer"><?php echo $row_comment['namePerson']?> <span>01 Jan 2020</span></div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                            <?php echo $row_comment['review']?>
                                            </p>
                                        </div>
                                        <?php
                                            }?>

                                        <span class="show-msg"></span>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <div class="ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                    <form class="row form" id="comment">
                        <div class="col-sm-6">
                           
                            <input type="text" placeholder="Name" name="name">
                            <input type="hidden"  name="productid"  value="<?php echo $rowproductwid['id']?>" > 
                        </div>
                        <div class="col-sm-6">
                            <input type="email" placeholder="Email" name="email">
                        </div>
                        <div class="col-sm-12">
                            <textarea placeholder="Review" name="review"></textarea>
                        </div>
                        <div class="col-sm-12">
                            <button>Submit</button>
                        </div>
                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">

                            <?php
                        $stmt_product=$coon->prepare("SELECT * FROM products ");
                        $stmt_product->execute();
                        while ($row_product=$stmt_product->fetch()) {
                            ?>
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#"><?php echo $row_product['img_product']?> </a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="Dashboard/Photos/products/<?php echo $row_product['img_product']?>" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>$</span>99</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                        }?>
                               
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                            <?php
                        $stmt_product=$coon->prepare("SELECT * FROM products ");
                        $stmt_product->execute();
                        while ($row_product=$stmt_product->fetch()) {
                            ?>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?php echo $row_product['title_product']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="Dashboard/Photos/products/<?php echo $row_product['img_product']?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <?php
                        }?>
                              
                            </div>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="#">Nulla </a><span>(45)</span></li>
                                <li><a href="#">Curabitur </a><span>(34)</span></li>
                                <li><a href="#">Nunc </a><span>(67)</span></li>
                                <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                                <li><a href="#">Fusce </a><span>(89)</span></li>
                                <li><a href="#">Sagittis</a><span>(28)</span></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                                <p><i class="fa fa-envelope"></i>email@example.com</p>
                                <p><i class="fa fa-phone"></i>+123-456-7890</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="img/godaddy.svg" alt="Payment Security" />
                            <img src="img/norton.svg" alt="Payment Security" />
                            <img src="img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="Dashboard/AjaxFolder/comment.js"></script>
    </body>
</html>
