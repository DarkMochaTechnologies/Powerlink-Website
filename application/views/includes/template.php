				<?php 
					$this->load->view('includes/header'); 	
				?>

				<?php $this->load->view($s_main_content); ?>
				<?php
					if(isset($s_sub_contents)) {
						foreach($s_sub_contents as $s_sub_content) $this->load->view($s_sub_content);
					}
				?>	
			</div>
<!--<?php 
	//if($s_main_content != 'home'){
		//$this->load->view('includes/footer'); 
	?>
-->

		</div>
	</body>
</html>
