$(document).ready(function(){

	$('#step1-next').click(function() {

		var isValid = true;
		
		$('#current-locations input').each(function() {
			if ( $(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
				isValid = false;
			}
		});
		
		if (isValid == false) {
			$('#empty-locations').removeClass('hidden');
			//$('#locations-error').addClass('hidden');
		} else {
			$('#empty-locations').addClass('hidden');
			$('#step1-form').submit();
		}
	});

	$('#ddn_std_location').change(function() {
		var select_val = $(this).val();
		var counter_val = $('#location' + select_val).val();

		if (counter_val >= 29) {
			$('#post_another').attr('disabled', 'disabled');
		} else {
			$("#post_another").removeAttr('disabled');
		}
	});

	$('.adhoc_location').change(function() {
		var select_val = $(this).val();
		var counter_val = $('#location' + select_val).val();

		if (counter_val >= 9) {
			$('#adhoc_add_another').attr('disabled', 'disabled');
		} else {
			$("#adhoc_add_another").removeAttr('disabled');
		}
	});


  $('#d_confirm').click(function() {
    var name = $('#txt_adhoc_name');
    var dates = $('#txt_adhoc_dates');
    var age_group = $('#ddn_adhoc_age_group').val();
    var min_pax = $('#txt_adhoc_min_pax');
    var min_booking = $('#txt_adhoc_min_booking');
    var url = $('#txt_adhoc_url');
    var discount = $('#txt_adhoc_discount');
    var summary = $('#txa_adhoc_summary');
    var address = $('#ddn_std_location').val();

    //alert(name.val());
    if(age_group == null && address == null && name.val() == name.attr('placeholder') && dates.val() == dates.attr('placeholder') && min_pax.val() == min_pax.attr('placeholder') && min_booking.val() == min_booking.attr('placeholder') && url.val() == url.attr('placeholder') && discount.val() == discount.attr('placeholder') && summary.val() == summary.attr('placeholder')){
      location.href = '/register/success';
    } else {
      $('#step3').submit();
    }

  });

  $('#adhoc_add_another').click(function() {
    $('#step3').submit();
  });
});