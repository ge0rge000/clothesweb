<?php
$id= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] :0;
$stmt=$coon->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$row=$stmt->fetch();
?>



<form id="product" method="POST" action="../fun/products/update_product.php" class="register-form" enctype="multipart/form-data">
    
    <input type="hidden" name="product_id" value="<?php echo $row['id']?>">
    <img src="../Photos/products/<?php echo $row['img_product']?>" style="width:250px; height:300px;">

                <div class="row">
                <div class="col-md-6">
                <label> Title</label>
                <input class="form-control" type="text" placeholder="Name" name="titleproduct" value="<?php echo $row['title_product']?>">
                </div>
                <div class="col-md-6">
                <label> Price</label>
                <input class="form-control" type="text" placeholder="Name" name="priceproduct"value="<?php echo $row['price_product']?>" >
                </div>
                <label> Description</label>
            <textarea rows="4" cols="50" name="DESC_PROD"  >
            <?php echo $row['Description_product']?>
                </textarea>
                <div class="col-md-6">
                <label>Img</label>
                <input  type="file"  name="image">
                </div>

                <input type="hidden" name="oldimage" value="<?php echo $row['img_product']?>">


                <div class="col-md-12">

                <button class="btn">Submit</button>
                </div>
                </div>
                </form>