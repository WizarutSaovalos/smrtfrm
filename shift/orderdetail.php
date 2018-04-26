<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['status'] != "เกษตรกร")
	{
		echo "This page for User only!";
		exit();
	}	
	
	include "connect.php";

	$strSQL = "SELECT * FROM login WHERE username = '".$_SESSION['username']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
    
    $sql="SELECT * FROM selllist RIGHT JOIN product ON selllist.productname = product.name WHERE username = '".$_SESSION['username']."' ";
    $query=mysqli_query($objCon,$sql);
    $objResult1 = mysqli_fetch_array($query,MYSQLI_ASSOC);


?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shift &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

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
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="fh5co-top-logo">
				<div id="fh5co-logo"><a href="index.html">Shift</a></div>
			</div>
			<div class="fh5co-top-menu menu-1 text-center">
				<ul>
				<li class="has-dropdown">
						<a href="#">สินค้าเกษตร</a>
						<ul class="dropdown">
							<li><a href="#">ผัก</a></li>
							<li><a href="#">ผลไม้</a></li>
							<li><a href="#">ดอกไม้</a></li>
						</ul>
					</li>
					<li class="has-dropdown">
						<a href="#">สินค้าปัจจัย</a>
						<ul class="dropdown">
							<li><a href="#">อุปกรณ์</a></li>
							<li><a href="#">ปุ๋ยเคมี</a></li>
							<li><a href="#">ปุ๋ยชีวภาพ</a></li>
							<li><a href="#">อิเล็คทรอนิกส์</a></li>
						</ul>
					</li>
					<li><a href="shop.php">จัดการหน้าร้าน</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="fh5co-top-social menu-1 text-right">
				<ul class="fh5co">
					<li><a href="user_page.php"><?php echo $_SESSION["username"]; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		</div>
	</nav>
	
	<div id="fh5co-author">
		<div class="container">
			<div class="row top-line animate-box">
			<div class="col-md-2 col-md-offset-1 col-md-push-2">
			<img src="myfile/<?php echo $objResult1["picture"];?>" class="img-responsive" style="height:400px; weight:400px;" alt="Free HTML5 Template by FreeHTML5.co">
			</div>
				<div class="col-md-2 col-md-offset-1 col-md-push-2 text-left fh5co-heading">
					<h2><?php echo $objResult1["name"]; ?></h2>
					<p><?php echo $objResult1["detail"];?></p>
					
					<div class="role">
						<h3>รายละเอียดเพิ่มเติม</h3>
						<ul>
							<li>Front-end Design</li>
							<li>Branding</li>
							<li>Information Architecture</li>
							<li>Data Gathering</li>
						</ul>
					</div>
					<?php 
						if ($_SESSION["username"]!=""){
					?>
					<p><a href="#" class="btn btn-primary">แก้ไข</a></p>
						<?php }else{ ?>
					<p><a href="#" class="btn btn-primary">ซื้อ</a></p>
						<?php } ?>	

				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<p class="animate-box"><img src="images/project-7.jpg" class="img-responsive" alt="Free HTML5 Template by FreeHTML5.co"></p>
					<p class="animate-box"><img src="images/project-6.jpg" class="img-responsive" alt="Free HTML5 Template by FreeHTML5.co"></p>

					<div class="testimony animate-box">
						<blockquote>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove&rdquo;</p>
							<p class="person"><cite>&mdash; Job Smith</cite> CEO and Founder</p>
						</blockquote>
					</div>
					<p class="animate-box"><img src="images/project-5.jpg" class="img-responsive" alt="Free HTML5 Template by FreeHTML5.co"></p>
					<p class="animate-box"><img src="images/project-3.jpg" class="img-responsive" alt="Free HTML5 Template by FreeHTML5.co"></p>
				

					<div class="row row-pt-md portfolio-navigation">
						<div class="col-xs-4 text-left">
							<a href="#" class="btn btn-primary btn-outline"><i class="icon-chevron-left"></i> Prev </a>
						</div>
						
						<div class="col-xs-4 text-center">
							<a href="#" class="btn btn-primary btn-outline"><i class="icon-grid2"></i> View All</a>
						</div>
						<div class="col-xs-4 text-right">
							<a href="#" class="btn btn-primary btn-outline">Next <i class="icon-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Get Started</h2>
					<p>We create beautiful themes for your site behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					<p><a href="#" class="btn btn-primary">Let's work together</a></p>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> &amp; <a href="http://blog.gessato.com/" target="_blank">Gessato</a></small>
					</p>
					
					<ul class="fh5co-social-icons">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-linkedin"></i></a></li>
						<li><a href="#"><i class="icon-dribbble"></i></a></li>
					</ul>
					
				</div>
			</div>

		</div>
	</footer>
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
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
