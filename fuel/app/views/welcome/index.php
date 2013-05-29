<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FuelPHP Framework</title>
	<!-- <?php echo Asset::css('bootstrap.css'); ?> -->
	<link rel="stylesheet" type="text/css" href="assets/css/flat-ui.css">
	<style>
		#logo{
		width: 100%;
		}
		a{
			color: #883ced;
		}
		a:hover{
			color: #af4cf0;
		}

	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="logo"><img src="assets/img/geo-logo.jpg"></div>
			
		</div>
	<hr/>
	</div>
	 
	<div class="container">
	      
		<div class="hero-unit">
			
			<h1>Welcome!</h1>
			<p>Click the link below to get your geolocation</p>
			<p><a class="btn btn-primary btn-large" href="geolocate.php">Geolocation</a></p>
			<p><a class="btn btn-primary btn-large" href="register.php">Sign up</a></p>
			<p><a class="btn btn-primary btn-large" href="login.php">Login</a></p>
		</div>
		<div class="row">	
			<div class="span4">
				<h2>Contact Me</h2>
				<ul>
					<li>Web Application designed and developed by <a href="http://www.nikkiboondesign.com/">Nikki Boon</a></li>
					<li>Have questions? <a href="mailto:boonsta@fullsail.edu">Email Me</a></li>
				</ul>
			</div>
		</div>
		<hr/>
		<footer>
		<p>&copy; copyright <a href="http://www.nikkiboondesign.com" target="_blank">Nikki Boon</a><br />
		    Generating the <a href="https://developers.google.com/maps/documentation/business/geolocation/" target="_blank">Google Maps Geolocation API</a> </p>
		
		</footer>
	</div>
</body>
</html>
