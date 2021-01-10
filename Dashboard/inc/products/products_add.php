    <form id="product" method="POST" action="../fun/products/add_product.php" class="register-form" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-6">
    <label> Title</label>
    <input class="form-control" type="text" placeholder="Name" name="titleproduct" >
    </div>
    <div class="col-md-6">
    <label> Price</label>
    <input class="form-control" type="text" placeholder="Name" name="priceproduct" >
    </div>
    <label> Description</label>
    <textarea rows="4" cols="50" name="DESC_PROD" >
    </textarea>
 

    <div class="col-md-6">
    <label>Img</label>
    <input  type="file"  name="image">
    </div>


    <div class="col-md-12">

    <button class="btn">Submit</button>
    </div>
    </div>
    </form>