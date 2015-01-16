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
		<link rel="apple-touch-icon" href="<?php echo base_url();?>application/public/apple-touch-icon-precomposed.png">

		
		<script type="text/javascript">
			var js_site_url = function( url ){
				return "<?php echo site_url('" + url + "'); ?>";
			}
			var js_base_url = function( url ){
				return "<?php echo base_url('" + url + "'); ?>";
			}
		</script>
	<?php

		// All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects
		if (isset($b_modernizr_enabled)){ 
			if ($b_modernizr_enabled) {
				echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>' . "\r\n";
			}
		}

		if (isset($b_bootstrap_enabled)) {
			if ($b_bootstrap_enabled) {
				echo "\t" . '<link rel="stylesheet" href="' . base_url() . 'application/public/css/bootstrap.min.css">' . "\r\n";
				
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

			</div>
			<?php
				if (isset($s_page_header)) {
					switch ($s_page_header) {
						case 'register':
			?>
						<div class="container reg-form-container">
			<?php
						break;
					}
				}
			?>
			<?php
				if (isset($s_page_type)) {
					switch ($s_page_type) { // Switch Navbars for admins and users
						case 'admin':
								if ($this->session->userdata('sap_admin_logged_in')) { //If true display Navbar
			?>
								<div class="nav-container">	
									<nav class="navbar navbar-default" role="navigation">
										<div class="container-fluid" style="padding-left:0px;">
											<div class="navbar-header">
											</div>
											<div>
												<ul id="navchange" class="nav navbar-nav">
													<li class="pd-lr-5 <?php echo ($b_tab_1) ? 'active' : ''; ?>" id="dashboard"><a href="<?php echo base_url(); ?>sap_admin/"> DASHBOARD</a></li>
													<li class="pd-lr-5 <?php echo ($b_tab_2) ? 'active' : ''; ?>" id="centre"><a href="<?php echo base_url(); ?>sap_admin/centre">CENTRE MANAGEMENT</a></li>
													<li class="pl-lr-5 <?php echo ($b_tab_3) ? 'active' : ''; ?>" id="ad"><a href="<?php echo base_url(); ?>sap_admin/ad">ADS MANAGEMENT</a></li>
												</ul>
												<ul class="nav navbar-nav navbar-right">
													<p class="navbar-text">Welcome, <?php echo $this->session->userdata('sap_admin_name'); ?></p>
													<li class="navbar-text pd-r-10"><a href="<?php echo base_url(); ?>sap_admin/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
												</ul>
											</div>
										</div>
									</nav>
								</div>		
			<?php		
								}
						break;
						case 'bms':
			?>
						<div class="nav-container" id ="w">
						<!--
						<div class="row">
							<div class="col-sm-10">
								<nav class="navbar navbar-default navbar-transparent text-color-white" role="navigation">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-main">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>
										<div class="collapse navbar-collapse" id="navbar-main">
											<ul id="navchange" class="nav navbar-nav cs-font-delius main-sap-nav">
												<li class=""><a href="<?php echo base_url(); ?>">HOME</a></li>
												<li class=""><a href="#">SEARCH</a></li>
												<li class=""><a href="#">REVIEWS</a></li>
												<li class=""><a href="#">BE REWARDED</a></li>
												<li class=""><a href="#">TOP CHARTS</a></li>
												<li class=""><a href="#">PROMOTIONS & CONTENTS</a></li>
												<li class=""><a href="#">JOIN A COMMUNITY</a></li>
												<li class=""><a href="#">WHAT'S NEW</a></li>
											</ul>     
										</div>
								</nav>
							</div>
							-->
							<div class="row hidden-sm hidden-xs m-log pull-right" style="margin-left: -20px;">
								<div class="dropdown col-xs-3 pd-l-2 pd-r-2 m-top-15">
  										<button class="btn btn-default btn-sm dropdown-toggle dropdown-transparent" type="button" id="dropdownMenu1" data-toggle="dropdown">
    									<span class="caret"></span>
  									</button>
  									<ul class="dropdown-menu dropdown-menu-semi-transparent" role="menu" aria-labelledby="dropdownMenu1">
   									 <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Account Settings</a></li>
    									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Account Settings</a></li>
    									<li role="presentation" class="divider"></li>
    									<li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url()?>log/logout">Log out</a></li>
  									</ul>
								</div>
								<div class=" col-xs-9 navbar-header navbar-brand pd-l-2">
									Hi, <?php if($this->session->userdata('AccInfo')['FirstName']!= null){ echo $this->session->userdata('AccInfo')['FirstName'];}?>
								</div>
							</div>

							<div class="row visible-sm visible-xs pull-left m-left-20" style = "margin-left:20px;">
									<div class=" col-xs-6 navbar-header navbar-brand">
										Hi, <?php if($this->session->userdata('AccInfo')['FirstName']!= null){ echo $this->session->userdata('AccInfo')['FirstName'];}?>
									</div>
									<div class="dropdown col-xs-6 pd-l-2 pd-r-2 m-top-15">
  									<button class="btn btn-default btn-sm dropdown-toggle dropdown-transparent" type="button" id="dropdownMenu1" data-toggle="dropdown">
    									<span class="caret"></span>
  									</button>
  									<ul class="dropdown-menu dropdown-menu-semi-transparent" role="menu" aria-labelledby="dropdownMenu1">
   									 	<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Account Settings</a></li>
    									<li role="presentation" class="divider"></li>
    									<li role="presentation"><a role="menuitem" tabindex="-1" href="<?=base_url()?>log/logout">Log out</a></li>
  									</ul>
								</div>
			
							</div>
						<!--</div>-->
						</div>
			<?php
						break;

						default:
			?>
							<!-- <div class="col-md-3">
								<div id="searchbox">
									<form class="navbar-form navbar-left" role="search">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Search">
										</div>
										<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
									</form>
								</div>
							</div> -->
			<?php		
						break;
					}
				}
			?>			