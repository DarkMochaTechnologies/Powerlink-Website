$('[placeholder]').focus(function() {
  var input = $(this);
  if (input.val() == input.attr('placeholder')) {
    input.val('');
    input.removeClass('placeholder');
  }
}).blur(function() {
  var input = $(this);
  if (input.val() == '' || input.val() == input.attr('placeholder')) {
    input.addClass('placeholder');
    if (input.attr('placeholder') != 'Password' && input.attr('placeholder') != 'Confirm Password') {
      input.val(input.attr('placeholder'));
    }
  }
}).blur().parents('form').submit(function() {
  $(this).find('[placeholder]').each(function() {
    var input = $(this);
    if (input.val() == input.attr('placeholder')) {
      input.val('');
    }
  })
});


$('#txt_fake_password').focus(function(){
    $('#txt_password').removeClass('hidden');
    $('#txt_fake_password').addClass('hidden');
    $('#txt_password').focus();
});

$('#txt_password').focus(function() {
    $('#txt_password').attr('placeholder', 'Password');
});

$('#txt_password').blur(function() {
  $('#txt_password').attr('placeholder', '');
    if ($('#txt_password').val() == '') {
      $('#txt_fake_password').removeClass('hidden');
      $('#txt_password').addClass('hidden');
    }
});


$('#txt_fake_conf_password').focus(function(){
    $('#txt_conf_password').removeClass('hidden');
    $('#txt_fake_conf_password').addClass('hidden');
    $('#txt_conf_password').focus();
});

$('#txt_conf_password').focus(function() {
    $('#txt_conf_password').attr('placeholder', 'Confirm Password');
});

$('#txt_conf_password').blur(function() {
  $('#txt_conf_password').attr('placeholder', '');
    if ($('#txt_conf_password').val() == '') {
        $('#txt_fake_conf_password').removeClass('hidden');
        $('#txt_conf_password').addClass('hidden');
    }
});
