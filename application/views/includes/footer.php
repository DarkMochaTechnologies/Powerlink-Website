	<?php
		// jQuery
		if (isset($b_jquery_enabled)){ 
			if ($b_jquery_enabled) {
				echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/jquery-2.1.1.min.js"></script>' . "\r\n";
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
		//echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/plugins.js"></script>' . "\r\n";
		//echo "\t" . '<script type="text/javascript" src="' . base_url() . 'application/public/js/main.js"></script>' . "\r\n";

		// Custom JS
		if (isset($a_js_scripts)){ 
			foreach($a_js_scripts as $s_js_script) {
				echo "\t" . '<script type="text/javascript" src="' . $s_js_script . '"></script>' . "\r\n";
			}
		}
	?>
	</body>
</html>