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

    $strSQL1 = "SELECT * FROM profile WHERE username = '".$_SESSION['username']."' ";
	$objQuery1 = mysqli_query($objCon,$strSQL1);
    $objResult1 = mysqli_fetch_array($objQuery1,MYSQLI_ASSOC);
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
  Welcome to User Page! <br>
   <div class="row form-group">
								<div class="col-md-12">
									<label for="fname">ชื่อผู้ใช้</label>
									<input type="text" id="fname" name="user" class="form-control" placeholder="<?php echo  $_SESSION['username'];?>">
								</div>
								
                            </div>
                            <div class="row form-group">
								<div class="col-md-12">
									<label for="fname">ชื่อ</label>
									<input type="text" id="fname" name="pass" class="form-control" placeholder="<?php echo  $objResult1['name'];?>"
								</div>
								
                            </div>

                            <div class="row form-group">
								<div class="col-md-12">
									<label for="fname">นามสกุล</label>
									<input type="text" id="fname" name="pass" class="form-control" placeholder="<?php echo  $objResult1['surname'];?>">
								</div>
								
                            </div>
    </div>
  <br>
  <a href="edit_profile.php">Edit</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
<?php
	mysqli_close($objCon);
?>