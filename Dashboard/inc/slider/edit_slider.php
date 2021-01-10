
<?php
$id= isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;

$stmt=$coon->prepare("SELECT * FROM slider WHERE id = ?");

$stmt->execute([$id]);

$row=$stmt->fetch();

?>
<h1>Edit Slider</h1>

<form id="slider" method="POST" action="../fun/slider/update_slider.php" class="register-form" enctype="multipart/form-data">

            <input type="hidden" name="slider_id" value="<?php echo $row['id']?>">

                <img src="../Photos/slider/<?php echo $row['slider_img']?>" style="width:250px; height:300px;">

                            <div class="row">
                                <div class="col-md-6">
                                    <label> Title</label>
                                    <input class="form-control" type="text" name="titleslider" value="<?php echo $row['slider_title']?>">
                                </div>
                                
                                 <div class="col-md-6">
                                    <label>Img</label>
                                    <input  type="file"  name="image">
                                </div>
                                <input type="hidden" name="old_img" value="<?php echo $row['slider_img']?>">
                             
                               
                                <div class="col-md-12">
                             
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </form>