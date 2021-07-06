<?php
include 'config/config.php';

if(!user_login()){
    header("location: login.php?act=postads");
}

$page_title = "Post ADS";

include 'header.php';
include 'menu.php';
?>
<?php

if(isset($_POST["ok-post"])){
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $price = mysqli_real_escape_string($conn,$_POST["price"]);
    $phone = mysqli_real_escape_string($conn,$_POST["number"]);
    $description = mysqli_real_escape_string($conn,$_POST["desc"]);

    if(empty($_FILES["photo"]["name"])){
        set_flash("No file selected","danger");
        }else{
          $target_file = "postadsimages/".basename($_FILES["photo"]["name"]);

          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

          $check = getimagesize($_FILES["photo"]["tmp_name"]);
          if($check === false) {
            set_flash("File selected is not and image","danger");
            }else if($_FILES["photo"]["size"] > 100000000000) {
              set_flash("File selected is too large, should not be more than 10mb","danger");
            }else if($imageFileType == "gif") {
              set_flash("Only jpeg, jpg and png images allowed","danger");
            }else{

              $photo = mysqli_real_escape_string($conn,$_FILES["photo"]["name"]);

              $ext = explode('.', $photo);
              $ext = end($ext);
              $newphoto = $postid.".";
              $newphoto = $newphoto.$ext;

              $file = htmlspecialchars($newphoto);

              $target = "postadsimages/".$newphoto;

              $insertPayment = "INSERT into post_ads (postid,names,price,phone,description,photo) values ('$postid','$name','$price','$phone','$description','$file')";
              $insertPaymentRes = $conn->query($insertPayment)or
              die(mysqli_error($conn));

              move_uploaded_file($_FILES['photo']['tmp_name'], $target);

              if($insertPaymentRes === TRUE){
                        set_flash("You have successfully post your products","success");
                }else{
                    set_flash("There was error in posting product","danger");
                }
            }
          }

}

?>
    
<div class="container">
    <h3 class="head">Post Your Ads</h3>
    <hr>
  <form action="" method="post" enctype="multipart/form-data">
    <?php echo flash(); ?>
    <div class="row">
      <div class="col-25">
        <label for="name">Name of Ad</label>
      </div>
    <div class="col-75">
        <input type="text" id="name" name="name" placeholder="E.g. Buy and Sell Gift cards" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">Price (&#8358;)</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" placeholder="E.g. 10,000" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="number">Phone Number</label>
      </div>
      <div class="col-75">
        <input type="text" id="number" name="number" placeholder="E.g. 08039564196" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="desc">Description</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="desc" placeholder="Give a brief description of the Ad you want to post." style="height:200px"></textarea>
      </div>
    </div>
    <p class="prdesc">Click "CHOOSE FILE" to upload your Product Images</p>
    <p class="prnote">(Note: You can upload more than one image)</p>
    <input type="file" id="myfile" name="photo">
    <div class="row">
      <button class="btn-post" name="ok-post" type="submit">Post <i class="fa fa-upload"></i></button>
    </div>
  </form>
</div>

    <?php
    include 'footer.php' 
    ?>
