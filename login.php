<?php
include 'config/config.php';
$page_title = "Signup/Signin";
?>
<?php
if(isset($_POST["ok-submit"])){
	$name = mysqli_real_escape_string($conn,$_POST["names"]);
	$school = mysqli_real_escape_string($conn,$_POST["school"]);
	$state = mysqli_real_escape_string($conn,$_POST["state"]);
	$phone = mysqli_real_escape_string($conn,$_POST["phone"]);
	$email = mysqli_real_escape_string($conn,$_POST["email"]);
	$gender = mysqli_real_escape_string($conn,$_POST["gender"]);
	$password = mysqli_real_escape_string($conn,$_POST["password"]);
	$password = password_hash($password, PASSWORD_DEFAULT);

	$sql = "INSERT shoping_users(userid,full_name,school,state,phone,gender,email,password) values ('$userid','$name','$school','$state','$phone','$gender','$email','$password') ";
	$result = $conn->query($sql)or
	die(mysqli_error($conn));

	if($result === TRUE){
		set_flash("Reggistration succesfful","success");
	}else{
		set_flash("There error in Reggistration","danger");
	}
}


if(isset($_POST["ok-login"])){
	$username = mysqli_real_escape_string($conn,$_POST["username"]);
	$password = mysqli_real_escape_string($conn,$_POST["password"]);

	$sql = "SELECT * from shoping_users where email = '$username' ";
	$result = $conn->query($sql)or
	die(mysqli_error($conn));

	if($result->num_rows > 0){
		$rs = $result->fetch_assoc();
		$email = $rs["email"];
		if(password_verify($password, $rs["password"])){

			$_SESSION["member"] = $email;
			
			if(isset($_GET["act"])){
				switch ($_GET["act"]) {
					case 'sell':
						header("location: sell.php");
						break;

					case 'account':
						header("location: account.php");
						break;

					case 'postads':
						header("location: postads.php");
						break;

					case 'connect':
						header("location: connect.php");
					
					default:
						// code...
						break;
				}
			}else{
				header("location: index.php");
			}
			
		}else{
			set_flash("Username or password is incorrect","danger");
		}
	}else{
		set_flash("Username or password is incorrect","danger");
	}	
}

include 'header.php';
include 'menu.php';
?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="#" method="post">
							<input type="text" placeholder="Input your Gmail Address" / name="username" value="<?php echo @$_POST["username"];?>" />
							<input type="password" placeholder="Input your password" / name="password" ?>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default" name="ok-login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<?php echo flash(); ?>
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="text" placeholder="Full Name" name="names" required="" />
							<input type="text" placeholder="university / polytechnic / college" name="school" required="" />
							<input type="text" placeholder="school location/State" name="state" required="" />
							<input type="text" placeholder="Phone number" name="phone" required="" />
							<input type="text" name="gender" placeholder="Gender" required="" />
							<input type="email" placeholder="Email Address" name="email" required="" />
							<input type="password" placeholder="Password" name="password" required="" />
							<input type="password" placeholder="Retype Password" name="cpassword" required="" />
							<button type="submit" class="btn btn-default" name="ok-submit">Signup</button>
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<?php include 'footer.php' 
	?>
	
	
	