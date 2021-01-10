


<?php
$idcontact= isset($_GET['idcontact']) && is_numeric($_GET['idcontact']) ? $_GET['idcontact']:0;

$stmt=$coon->prepare("SELECT  * FROM contact ");
$stmt->execute([$idcontact]);
$row=$stmt->fetch();


?>
<form  action="../fun/contactus/edit_contact.php" method="POST">
<input type='hidden' name='id_contact' value="<?php echo $row['id']?>">
    <div class="row">
        <div class="col-md-6">

            <input type="text" class="form-control" placeholder="Your Name" name="person" value="<?php echo $row['person']?>"/>
        </div>
        <div class="col-md-6">
            <input type="email" class="form-control" placeholder="Your Email" name="email"value="<?php echo $row['email']?>" />
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="mobilephone" name="mobilephone" value="<?php echo $row['mobilephone']?>"/>
    </div>
    <div class="form-group">
        <textarea class="form-control" rows="5" placeholder="Message" name="message" ><?php echo $row['messagee']?></textarea>
    </div>
    <div><button class="btn" type="submit">UPDATE</button></div>
    </form>