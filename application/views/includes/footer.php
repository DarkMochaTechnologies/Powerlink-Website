	<?php
	if (isset($s_page_header)) {
		switch ($s_page_header) {
			case 'register':
	?>
				</div>
				<div class="container reg-kiddies">
				<div class="col-xs-2 books"></div>
				<div class="col-xs-2 studying"></div>
				<div class="col-xs-2 red-hat-boy"></div>
				</div>
				<div class="site-footer">
					<div class="header-container">
					<div class="waves"></div>
					<div class="purple-slant"></div>
					<div class="purple-box">
						<div class="copyright">A member of 20Eleven Pte Ltd. Copyright &copy; <?php echo date('Y'); ?> All rights reserved.</div>
					</div>
					<div class="baby"></div>
					</div>
				</div>

	<?php
				break;
			
			case 'sap_admin':
	?>
				<div class="site-footer apply-height">
					<div class="copyright font-black">A member of 20Eleven Pte Ltd. Copyright &copy; <?php echo date('Y'); ?> All rights reserved.</div>
				</div>
				</div>
	<?php
				break;

			default:
	?>
				<div class="site-footer ">
					<div class="container">
					<div class="waves"></div>
					<div class="purple-slant"></div>
					<div class="purple-box">
							<div class="footer-box">
								<div class="col-md-6">
									<div class="copyright font-10">
										A member of 20Eleven Pte Ltd. Copyright &copy; <?php echo date('Y'); ?> All rights reserved.
									</div>
								</div>
								<div class="col-md-6">
									<div class="footer-links"><a href="#" class="font-10">About</a><a href="#" class="font-10 pd-l-20">Contact us</a><a href="#" class="font-10 pd-l-20">Advertise with us</a><a href="#" class="font-10 pd-l-20">Help</a><a href="#" class="font-10 pd-l-20">Terms of service</a></div>
								</div>
							</div>
							
							
					</div>
					<div class="baby"></div>
					</div>
				</div>
	<?php
		}
	}

	?>
		
	<?php
		// jQuery
		if (isset($b_jquery_enabled)){ 
			if ($b_jquery_enabled) {
				echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/vendor/jquery-1.11.0.min.js"></script>' . "\r\n";
				//echo "\t" . '<script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>' . "\r\n";
			}
		}

		// Bootstrap
		if (isset($b_bootstrap_enabled)) {
			if ($b_bootstrap_enabled) {
				echo "\t" . '<script src="' . base_url() . 'application/public/js/vendor/bootstrap.min.js"></script>' . "\r\n";
			}
		}

		// HTML5 Boilerplate default scripts
		echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/plugins.js"></script>' . "\r\n";
		echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/main.js"></script>' . "\r\n";

		// Custom JS
		if (isset($a_js_scripts)){ 
			foreach($a_js_scripts as $s_js_script) {
				echo "\t" . '<script type="text/javascript" src="' . $s_js_script . '"></script>' . "\r\n";
			}
		}
	?>
	
	</body>
</html>