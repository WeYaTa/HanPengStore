<?php 

	if(!isset($_GET['param'])){
		$_GET['param'] = "index";
	}
	include("model.php");
	$randomLaptops = getRandomLaptop();
	$allLaptops = getAllLaptop();
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<!-- <div class="fh5co-loader"></div> -->
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="controller.php?param=index">HP - Store</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					
					<?php if(isset($_GET['param'])){ ?>
					<ul>
						<li <?php if($_GET['param'] == "index") echo "class = 'active'"; ?>><a href="controller.php?param=index">HP - Store</a>	</li>
						<li class="has-dropdown  <?php if($_GET['param'] == "product") echo " active"; ?>">
							<a href="controller.php?param=product">Product</a>
							<ul class="dropdown">
								<li><a href="controller.php?param=product&merk=asus">ASUS</a></li>
								<li><a href="controller.php?param=product&merk=macbook">Macbook</a></li>
								<li><a href="controller.php?param=product&merk=msi">MSI</a></li>
								<li><a href="controller.php?param=product&merk=hp">HP</a></li>
								<li><a href="controller.php?param=product&merk=lenovo">Lenovo</a></li>
							</ul>
						</li>
						<li <?php if($_GET['param'] == "about") echo "class = 'active'"; ?>><a href="controller.php?param=about">About</a></li>
						<li <?php if($_GET['param'] == "services") echo "class = 'active'"; ?>><a href="controller.php?param=services">Services</a></li>
						<li <?php if($_GET['param'] == "contact") echo "class = 'active'"; ?>><a href="controller.php?param=contact">Contact</a></li>
					</ul>
					<?php } ?>
				</div>
				<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
					<ul>
						<li class="search">
								<form action="" method="post"  class="input-group">
									<input type="text" name = "search_bar" placeholder="Search.." required>
									<span class="input-group-btn">
										<button class="btn btn-primary" type="submit" name = "search"><i class="icon-search"></i></button>
									</span>
								</form> 	 
						</li>
					</ul>
				</div>
			</div>
		</div>
		</nav>
</body>
    

<?php
		// echo "<script>alert(\"".$_POST['search_bar']."\");</script>";
		if(isset($_POST['search'])){
			$_GET['param'] = "product";
		} 

    if(isset($_GET['param'])){
        if($_GET['param'] == "index"){
					REQUIRE('index.php');
				}elseif($_GET['param'] == "about"){
					REQUIRE('about.php');
				}elseif($_GET['param'] == "contact"){
					REQUIRE('contact.php');
				}elseif($_GET['param'] == "services"){
					REQUIRE('services.php');
				}elseif($_GET['param'] == "product"){
					if(isset($_GET['merk']))
						$searchLaptops = searchLaptop($_GET['merk']);
					if(isset($_POST['search'])){
						$searchLaptops = searchLaptop($_POST['search_bar']);
					} 
					REQUIRE('product.php');
				}
				elseif($_GET['param'] == "single"){
					$laptop = getLaptopByID($_GET['id']);
					REQUIRE('single.php');
					
				}
		}
?>



<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>HP - Store</h3>
					<p></p>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="controller.php?param=about">About</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="controller.php?param=contact">Contact</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Meetups</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Shop</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Testimonials</a></li>
						<li><a href="#">Handbook</a></li>
						<li><a href="#">Held Desk</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="#">Find Designers</a></li>
						<li><a href="#">Find Developers</a></li>
						<li><a href="#">Teams</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">API</a></li>
					</ul>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2019 HanPeng Store. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://blog.gessato.com/" target="_blank">Gessato</a> &amp; <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

</html>