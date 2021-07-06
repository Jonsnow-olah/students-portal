<?php
include 'config/config.php';

if(!user_login()){
    header("location: login.php?act=account");
}

$page_title = "My Account";

include 'header.php';
include 'menu.php';
?>
<?php
$email = $_SESSION["member"];
$sql = "SELECT * from shoping_users where email = '$email' ";
$result = $conn->query($sql)or
die(mysqli_error($conn));

$rs = $result->fetch_assoc();
?>
<div class="container">
    <h3 class="head">My Account</h3>
    <hr>
    <div class="card">
        <img src="images/home/pro.jpg" alt="user_profile" style="width:200px" class="primg">
        <h1 class="title" style="font-size:25px"><?php echo $rs["full_name"]; ?></h1>
        <p class="school"><?php echo $rs["school"]; ?></p>
        <p class="state"><?php echo $rs["state"]; ?></p>
    </div>
</div>