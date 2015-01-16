$(document).ready(function(){

	$('#btn_add_std_location').click(function(){
		var std_location_name = $('#txt_add_location').val();
		var std_branch = $('#txt_add_branch').val();
		var std_area = $('#ddn_centre_area').val();
		var std_region = $('#txt_centre_region').val();

		if (std_location_name == "" || std_location_name == 'New Location' || std_branch == '' || std_branch == 'New Branch' || std_area == null) { 
			if ($('#locations-error').length == 0) {
				var newError = $(document.createElement('div')).attr('class', 'form-error');
				newError.after().html('<div id="locations-error">Please add a branch/location details.</div>');
				newError.appendTo('#add-locations-error');
			}
			return false; 
		} // not doing anything if chat box is empty
		$.ajax({	
			url: '/register/ajax_add_std_location',
			type: 'POST',
			dataType: 'json',
			data: { std_location_name : std_location_name, std_branch : std_branch, std_area : std_area, std_region : std_region },
			success: function(data){
				var std_value = std_branch + ', ' + std_location_name;
	        	$("#ddn_std_location #add-location").before( new Option(std_value, data.i_location_id));
				$("#ddn_std_location").val(data.i_location_id);
				$('#locations-error').remove();
				$('#add-location-form').hide();
				$("#txt_add_location").val('');
				$('#txt_add_branch').val('');
				$('#ddn_centre_area').val('');
	        } 
		});
	});

	$('#ddn_std_location').change(function(){

		$('#txt_add_branch').val('');
		$('#ddn_centre_area').val('');
		$('#txt_centre_region').val('');
		$('#txt_add_location').val('');

		var option = this.options[this.selectedIndex];
		if (option.value == 'add-location')
		{
			$('#add-location-form').show();
		} else {
			$('#add-location-form').hide();
			if ($('#locations-error').length != 0) {
				$('#locations-error').remove();
			}
		}
	});
	$('#add-location-form').hide();
});
