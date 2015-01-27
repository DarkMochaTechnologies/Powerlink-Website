<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Made with WOW Slider - Create beautiful, responsive image sliders in a few clicks. Awesome skins and animations. Jquery carousel" />

		<?php
			// Title Information. Page setting takes precedence.
			if (isset($s_page_title)) {
				echo '<title>' . $s_page_title . '</title>';
			} else if (isset($s_app_name)) {
				echo '<title>' . $s_app_name . '</title>';
			} else {
				echo '<title>Untitled</title>';
			}
			
			// Page description. Page setting takes precedence.
			if (isset($s_page_description)) {
				echo '<meta name="description" content="' . $s_page_description . '">';
			} else if (isset($s_app_description)) {
				echo '<meta name="description" content="' . $s_app_description . '">';
			}
			
			// Page author meta information. Page setting takes precedence.
			if (isset($s_page_author)) {
				echo '<meta name="author" content="' . $s_page_author . '">';
			} else if (isset($s_app_author)) {
				echo '<meta name="author" content="' . $s_app_author . '">';
			}
		?>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="<?php echo base_url();?>application/public/favicon.ico">

		
		<script type="text/javascript">
			var js_site_url = function( url ){
				return "<?php echo site_url('" + url + "'); ?>";
			}
			var js_base_url = function( url ){
				return "<?php echo base_url('" + url + "'); ?>";
			}
		</script>
	<?php
		echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/jquery-2.1.1.min.js"></script>' . "\r\n";
		// All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects
		if (isset($b_modernizr_enabled)){ 
			if ($b_modernizr_enabled) {
				echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>' . "\r\n";
			}
		}

		if (isset($b_bootstrap_enabled)) {
			if ($b_bootstrap_enabled) {
				echo "\t" . '<link rel="stylesheet" href="' . base_url() . 'application/public/css/bootstrap.min.css">' . "\r\n";
				echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/vendor/bootstrap.min.js"></script>' . "\r\n";
			}
		}

		// CSS
		//echo "\t" . '<link rel="stylesheet" href="' . base_url() . 'application/public/css/normalize.css">' . "\r\n";
		echo "\t" . '<link rel="stylesheet" href="' . base_url() . 'application/public/css/main.css">' . "\r\n";  	
	 
		// Custom CSS
		if (isset($a_cs_scripts)) {
			foreach($a_cs_scripts as $s_cs_script) {
				echo "\t" . '<link rel="stylesheet" href="' . $s_cs_script .  '">' . "\r\n";
			}
		}
		if (isset($a_js_scripts)) {
			foreach($a_js_scripts as $s_js_script) {
				echo "\t" . '<script type="text/javascript" src="' . $s_js_script .  '"></script>' . "\r\n";
			}
		}
		
	?>

	</head>
	<body>

	<div class = "body" id="body-background"></div>
	<div class="page-wrap" id = "main-wrap">
			<div class="header-container">
				<nav class="navbar navbar-inverse navbar-custom">
  					<div class="container-fluid">
   		 				<!-- Brand and toggle get grouped for better mobile display -->
    					<div class="navbar-header">
      						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
       						<span class="sr-only">Toggle navigation</span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
      						</button>
      		    			<a class="navbar-brand logo" href="#"><img src ="<?=base_url()?>application/public/img/main/Logo.png" height="100" width="340"/></a>
    					</div>
    						<div class = "container container-header">
    							<div class = "row header-links">
    								<a class = "font-header" href="#">About Us </a>
    								<div class = "font-header"> | </div>
    								<a class = "font-header" href="#"> Admin Login</a>
    							</div>
    							<div class="row">
    								<button class="btn btn-primary btn-lg btn-home btn-gquote pull-right"><a href"#">Get Quotation</a></button>
    							</div>
    						</div>
   						 <!-- Collect the nav links, forms, and other content for toggling -->
    					<div class="collapse navbar-collapse" id="navbar">
      							<ul class="nav navbar-nav navbar-right navbar-main">
      						  		<li><a href="#">News</a></li>
      						  		<li><a href="#">Events</a></li>
      						  		<li><a href="#">Equipment</a></li>
      						  		<li><a href="#">Support</a></li>
      							</ul>
      			
    					</div><!-- /.navbar-collapse -->
 					</div><!-- /.container-fluid -->
				</nav>

			</div>
			<?php
				if (isset($s_page_header)) {
					switch ($s_page_header) {}

			}
			?>			