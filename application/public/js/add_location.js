$(document).ready(function(){
 
  var counter = $('#locations #location-group').length;
  var name_counter = counter+1;

  $('#btn_add_location').on('click', function(){
    
    $('#empty-locations').addClass('hidden');
    $(document).delegate('[placeholder]', 'focus', function() {
      var input = $(this);
      if (input.val() == input.attr('placeholder')) {
        input.val('');
        input.removeClass('placeholder');
      }
    }).blur(function() {
      var input = $(this);
      if (input.val() == '' || input.val() == input.attr('placeholder')) {
        input.addClass('placeholder');
        input.val(input.attr('placeholder'));
      }
    }).blur().parents('form').submit(function() {
      $(this).find('[placeholder]').each(function() {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
          input.val('');
        }
      })
    });

    $(document).delegate('select#ddn_centre_area', 'change', function(){

    var option = this.options[this.selectedIndex];
    var region = $(option).closest('optgroup').prop('label');


    if (region != null) {
    option.setAttribute('data-text', option.text);
    option.text = region;
    } else {
      option.text="Centre's Area";
    }

    $(this).closest('div').find('input').val(region);
    // Reset texts for all other but current
    for (var i = this.options.length; i--; ) {
      if (i == this.selectedIndex) continue;
      var text = this.options[i].getAttribute('data-text');
      if (text) this.options[i].text = text;
    }

    });

    var new_location = $('.new_location').length;
    var i_ctr = new_location + 1;
    var branch = $('#current-locations').find('#txt_centre_branch');;
    var area = $('#current-locations').find('#ddn_centre_area');;
    var location = $('#current-locations').find('#txt_centre_location');;
    var default_id = '#current-locations';

    if(new_location > 0){
        branch = $('#location_'+new_location).find('#txt_centre_branch');
        area = $('#location_'+new_location).find('#ddn_centre_area');
        location = $('#location_'+new_location).find('#txt_centre_location');
        default_id = '#location_'+new_location;
    }


    var isValid = true;
    $('#current-locations input').each(function() {
    if ( $(this).val() === '' || $(this).val() == $(this).attr('placeholder'))
    isValid = false;
    });
    
    if (isValid == true)
    {  
      $('#empty-locations').addClass('hidden');
      $('#locations-error').remove();
      $('#add_location .row:first-child div button').attr("parent", "location_"+i_ctr);
      $('#add_location').clone().attr("id", "location_"+i_ctr).addClass('new_location').appendTo('#current-locations');
      $('.new_location').removeClass('hidden');
      
    } else {
      // if ($('#locations-error').length == 0) {
      //   var newError = $(document.createElement('div')).attr('class', 'form-error');
      //   newError.after().html('<div id="locations-error">Please fill up all location details before adding another.</div>');
      //   newError.appendTo(default_id);
      // }
      $('#empty-locations').removeClass('hidden');
    }
  });
   
    $(document).on('click', '.btn-circle', function() {
      $($(this).parent().parent().parent()).remove();
    });
     

});


