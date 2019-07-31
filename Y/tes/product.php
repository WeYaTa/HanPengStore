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
		
	<div class="fh5co-loader"></div>
	
	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/banner-lptp.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>HanPeng Store</h1>
							<h2>Product <a href="https://themewagon.com/theme_tag/free/" target="_blank"></a></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Cool Stuff</span>
					<h2>Products.</h2>
					<p>Produk unggul ternama yang kami jual. Tidak ada yang palsu, semuanya asli ! HanPeng in the house yo !!!</p>
				</div>
			</div>
			
			<?php
				if(isset($searchLaptops)){
					//echo"<script>alert(\"".$searchLaptops[0][1]."\");</script>";
					$x = count($searchLaptops)-1;
					$z = $x + 1;
					//echo"<script>alert(\"$x\");</script>";
					if($x > -1){
						$y = 0; 
						for(;;){
							echo "<div class='row'>";
							for($col = 0; $col<3 ;$col++){
								echo "
								<div class='col-md-4 text-center animate-box'>
									<div class='product'>
										<div class='product-grid' style='background-image:url(../../images/".$searchLaptops[$x][11].");'>
											<div class='inner'>
												<p>
													<a href='controller.php?param=single&id=".$searchLaptops[$x][0]."' class='icon'><i class='icon-eye'></i></a>
												</p>
											</div>
										</div>
										<div class='desc'>
											<h3><a href='controller.php?param=single&id=".$searchLaptops[$x][0]."'>".$searchLaptops[$x][2]."</a></h3>
											<span class='price'>".$searchLaptops[$x][10]."</span>
										</div>
									</div>
								</div>
								";
								$x = $x - 1;
								$y = $y + 1;
								if($y >= $z) break;
							}
							echo "</div>";
							if($y >= $z) break;
						}
					}
					else{
						echo "<div class ='text-center'>
							<h1>Sorry, Product NOT Found :( </h1>
						</div>";
					}
					
				}else{
					$x = count($allLaptops)-1;
					$z = $x+1;
					$y = 0; 
					for(;;){
						echo "<div class='row'>";
						for($col = 0; $col<3;$col++){
							echo "
							<div class='col-md-4 text-center animate-box'>
								<div class='product'>
									<div class='product-grid' style=\"background-image:url(../../images/".$allLaptops[$x][11].");\">
										<div class='inner'>
											<p>
												<a href='controller.php?param=single&id=".$allLaptops[$x][0]."' class='icon'><i class='icon-eye'></i></a>
											</p>
										</div>
									</div>
									<div class='desc'>
									<h3><a href='controller.php?param=single&id=".$allLaptops[$x][0]."'>".$allLaptops[$x][2]."</a></h3>
										<span class='price'>".$allLaptops[$x][10]."</span>
									</div>
								</div>
							</div>
							";
							$x = $x - 1;
							$y = $y + 1;
							if($y >=$z) break;
						}
						echo "</div>";
						if($y >= $z) break;
					}
				}
			?>

		</div>
	</div>


	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

