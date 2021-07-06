<?php
include 'config/config.php';
$page_title = "Connect";

if(!user_login()){
    header("location: login.php?act=connect");
}

if(isset($_POST["ok-post"])){
  $name = mysqli_real_escape_string($conn,$_POST["name"]);
  $relationship = mysqli_real_escape_string($conn,$_POST["relationship"]);
  $phone = mysqli_real_escape_string($conn,$_POST["number"]);
  $school = mysqli_real_escape_string($conn,$_POST["sch"]);
  $location = mysqli_real_escape_string($conn,$_POST["schlocation"]);
  $description = mysqli_real_escape_string($conn,$_POST["desc"]);

  if(empty($_FILES["photo"]["name"])){
    set_flash("No file selected","danger");
    }else{
      $target_file = "connectimages/".basename($_FILES["photo"]["name"]);

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

          $target = "connectimages/".$newphoto;

          $insertPayment = "INSERT into connect (postid,names,relationship,phone,school,location,description,photo) values ('$postid','$name','$relationship','$phone','$school','$location','$description','$file')";
          $insertPaymentRes = $conn->query($insertPayment)or
          die(mysqli_error($conn));

          move_uploaded_file($_FILES['photo']['tmp_name'], $target);

          if($insertPaymentRes === TRUE){
                    set_flash("You have successfully connected, kindly wait for approval to check if your photos are genuine","success");
            }else{
                set_flash("There was error in posting product","danger");
            }
        }
      }

}



include 'header.php';
include 'menu.php';
?>

    <h4 class="head">Now is the <strong>RIGHT</strong> moment to <strong>CONNECT</strong> with new people in Campus or around you!!</h4>
    <hr>
    <div class="card">
    <img src="images/home/pro.jpg" alt="user_profile" style="width:200px" class="primg">
    <h1 class="title" style="font-size:25px">Jon Snow</h1>
    <p class="school">Federal Polytechnic Ede</p>
    <p class="state">Osun State</p>
    </div>
    
<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
  <?php echo flash()?>
    <div class="row">
      <div class="col-25">
        <label for="name">What is your name?</label>
      </div>
    <div class="col-75">
        <input type="text" id="name" name="name" placeholder="E.g. Jon Snow" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">What are you looking for?</label>
      </div>
      <div class="col-75">
        <input type="text" id="relationship" name="relationship" placeholder="E.g. Relationship" required="">
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
        <label for="sch">School</label>
      </div>
      <div class="col-75">
        <input type="text" id="sch" name="sch" placeholder="E.g. Federal polytechnic Ede" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="schlocation">School Location</label>
      </div>
      <div class="col-75">
        <input type="text" id="schlocation" name="schlocation" placeholder="E.g. Osun State" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="desc">Description</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="desc" placeholder="Describe yourself in a few words" style="height:200px"></textarea>
      </div>
    </div>
    <p class="prdesc">Click "CHOOSE FILE" to upload your dazzling selfie or photos</p>
	<p class="prnote">(Note: You can upload more than one photo)</p>
  <input type="file" id="myfile" name="photo">
    <div class="row">
    <button class="btn-post" name="ok-post" type="submit">Connect <i class="fa fa-link"></i></button>
    </div>
  </form>
</div>

    <?php
    include 'footer.php' 
    ?>
