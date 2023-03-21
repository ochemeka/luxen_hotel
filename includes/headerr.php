<!DOCTYPE php>
<title><?php  echo $pagetitle ; ?></title>
<!--[if lt IE 7]>      <php class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <php class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <php class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<php class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Luxen Premium Hotel Template</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="shortcut icon" href="img/favicon.ico" />
<!-- CSS FILES -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/supersized.css">
<link rel="stylesheet" href="css/supersized.shutter.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/prettyPhoto.css">
<link rel="stylesheet" href="css/datepicker.css">
<link rel="stylesheet" href="css/selectordie.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/2035.responsive.css">

<script src="js/vendor/modernizr-2.8.3-respond-1.1.0.min.js"></script>
<!-- Respond.js IE8 support of php5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<div id="wrapper">
	<div id="home">
		<div class="header"><!-- Header Section -->
			<div class="pre-header"><!-- Pre-header -->
				<div class="container">
					<div class="row">
						<div class="pull-left pre-address-b"><p><i class="fa fa-map-marker"></i>124 Benin-Sapele Road. Benin City, Edo State</p></div>
						<div class="pull-right">
							<div class="pull-left">
								<ul class="pre-link-box">
									<li><a href="about.php">About</a></li>
									<li><a href="contact.php">Contact</a></li>
									<li><a href="#">Add Your Link</a></li>
								</ul>
							</div>
							<div class="pull-right">
								<div class="language-box">
									<ul>
										<li><a href="#"><img alt="language" src="temp/english.png"><span class="language-text">ENGLISH</span></a></li>
										<li><a href="#"><img alt="language" src="temp/germany.png"><span class="language-text">DEUTSCH</span></a></li>
										<li><a href="#"><img alt="language" src="temp/france.png"><span class="language-text">FRAN?AIS</span></a></li>
										<li><a href="#"><img alt="language" src="temp/poland.png"><span class="language-text">POLSKI</span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-header"><!-- Main-header -->
				<div class="container">
					<div class="row">
						<div class="pull-left">
							<div class="logo">
								<a href="index.php"><img alt="Logo" src="img/logo-light.png" class="img-responsive" /></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="pull-left">
								<nav class="nav">
									<ul id="navigate" class="sf-menu navigate">
										<li class="menu active"><a href="index.php">HOMEPAGE</a>
											<ul>
												<?php /*?><li><a href="index.php">Slider Homepage</a></li>
												<li><a href="index-full-screen.php">Full Screen Homepage</a></li><?php */?>
											</ul>
										</li>
									<!--	<li class="parent-menu"><a href="gallery.php">FEATURES</a>
											<ul>-->
												<?php /*?><li><a href="#">2 Homepages</a></li>
												<li><a href="#">Ajax/PHP Booking Form</a></li>
												<li><a href="#">Ultra Responsive</a></li>
												<li><a href="#">2 Category Pages</a></li>
												<li><a href="404.php">404 Page</a></li><?php */?>
										<!--	</ul>
										</li>-->
										<li class="parent-menu"><a href="gallery.php">PAGES</a>
											<ul>
												<li><a href="about.php">About</a></li>
												<li><a href="category-grid.php">Category Grid</a></li>
												<li><a href="category-list.php">Category List</a></li>
												<li><a href="room_single.php">Room Details</a></li>
												<li><a href="reservation_form_dark.php">Dark Reservation Form</a></li>
												<li><a href="reservation_form_light.php">Light Reservation Form</a></li>
												<li><a href="gallery.php">Gallery</a></li>
												<li><a href="blog.php">Blog</a></li>
												<li><a href="blog_details.php">Blog Single</a></li>
												<li><a href="left_sidebar_page.php">Left Sidebar Page</a></li>
												<li><a href="right_sidebar_page.php">Right Sidebar Page</a></li>
												<li><a href="404.php">404 Page</a></li>
											</ul>
										</li>
										<li><a href="blog.php">NEWS</a></li>
										<li><a href="contact.php">CONTACT</a></li>
										<li class="menu"><a href="#">ACCESS</a>
											<ul>
											
											<?php if(logged_in()){ ?> 
												<li><a href="dashboard.php">Dashboard</a></li>
												<li><a href="logout.php">Logout</a></li>
												 <?php } else { ?>
												 <li><a href="login">login</a></li>
												<li><a href="registration">Registration</a></li>
												 <?php } ?>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
							<div class="pull-right">
								<div class="button-style-1 margint45">
									<a href="reservation-form-dark.php"><i class="fa fa-calendar"></i>BOOK NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="book-slider">
			<div class="container">
				<div class="row pos-center">
					<div class="reserve-form-area">
						<form action="#" method="post" id="ajax-reservation-form">
							<ul class="clearfix">
								<li class="li-input">
									<label>ARRIVAL</label>
									<input type="text" id="dpd1" name="dpd1" class="date-selector" placeholder="&#xf073;" />
								</li>
								<li class="li-input">
									<label>DEPARTURE</label>
									<input type="text" id="dpd2" name="dpd2" class="date-selector" placeholder="&#xf073;" />
								</li>
								<li class="li-select">
									<label>ROOMS</label>
									<select name="rooms" class="pretty-select">
										<option selected="selected" value="1" >1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</li>
								<li class="li-select">
									<label>ADULT</label>
									<select name="adult" class="pretty-select">
										<option selected="selected" value="1" >1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</li>
								<li class="li-select">
									<label>CHILDREN</label>
									<select name="children" class="pretty-select">
										<option selected="selected" value="0" >0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</li>
								<li>
									<div class="button-style-1 margint40">
										<a id="res-submit" href="#"><i class="fa fa-search"></i>SEARCH</a>
									</div>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-book-slider">
			<div class="container">
				<div class="row pos-center">
					<ul>
						<li><i class="fa fa-shopping-cart"></i> WOOCOMMERCE COMPATIBLE</li>
						<li><i class="fa fa-globe"></i> LANGUAGE COMPATIBLE</li>
						<li><i class="fa fa-coffee"></i> COFFEE & BREAKFAST FREE</li>
						<li><i class="fa fa-windows"></i> FREE WI-FI ALL ROOM</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="content"><!-- Content Section -->
		<div class="about clearfix"><!-- About Section -->
			<div class="container">
				<div class="row">
					<div class="about-title pos-center margint60">