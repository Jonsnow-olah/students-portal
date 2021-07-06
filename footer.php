<footer id="footer">
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="map" />
							<p>P.M.B 231, Federal polytechnic Ede. Osun State. Nigeria.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="sell.php">Sell</a></li>
								<li><a href="connect.php">Connect</a></li>
								<li><a href="postads.php">Post AD</a></li>
								<li><a href="account.php">Account</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quick Links</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="default.php">Home</a></li>
								<li><a href="developer.php">Developers</a></li>
								<?php
								if(user_login()){
								?>
								<li><a href="account.php"><?php echo $_SESSION['member']; ?></a></li>
								<li><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
								<?php
								}else{
								?>
								<li><a href="login.php">Login/Register</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
							</ul>
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Students Portal</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated....</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 - <?php echo date("Y") ?> Students Portal. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">Jon Snow</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/jquery.min.js"></script> 
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<!-- <script src="js/main2.js"></script> -->
	<script src="js/owl.carousel.min.js"></script>
    <script>
    if(window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
</body>
</html>
