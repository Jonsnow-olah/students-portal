<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>+2348145362848</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>studentsportal@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
							
						</div>
						
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="sell.php"><i class="fa fa-shopping-cart"></i> Sell</a></li>
								<?php
								if(user_login()){
								?>
								<li><a href="account.php"><i class="fa fa-user"></i> <?php echo $_SESSION['member']; ?></a></li>
								<li><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
								<?php
								}else{
								?>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login/Register</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div> 
			</div> 
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="default.php" class="active">Home</a></li>
								<li><a href="account.php" class="active">Account</a></li>
								<li><a href="sell.php" class="active">Sell</a></li>
								<?php
								if(!user_login()){
								?>
									<li><a href="login.php" class="active">Login/Register</a></li>
								<?php
								}
								?>
								<li><a href="contact-us.php" class="active">Contact</a></li>
								<li><a href="developer.php" class="active">The Developer</a></li>
                                <li><a href="connect.php" class="active">Connect</a></li>
								<li><a href="postads.php" class="active">Post AD</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->