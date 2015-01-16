$('#chk_address').change(function(){
    $('#txa_std_billing_address')
        .val($('#chk_address:checked')
        .map(function(){
            return this.value;
        }).get().join(', '));
});

$('#chk_address').change(function(){
    if (this.checked) {
        $("#txa_std_billing_address").attr('readonly','readonly');
    } else {
        $("#txa_std_billing_address").removeAttr('readonly');
    }
}).change();

$('#chk_contact').change(function(){
    $('#txt_std_contact')
        .val($('#chk_contact:checked')
        .map(function(){
            return this.value;
        }).get().join(', '));
});

$('#chk_contact').change(function(){
    if (this.checked) {
        $("#txt_std_contact").attr('readonly','readonly');
    } else {
        $("#txt_std_contact").removeAttr('readonly');
    }
}).change();

$('#chk_std_email').change(function(){
    $('#txt_std_centre_email')
        .val($('#chk_std_email:checked')
        .map(function(){
            return this.value;
        }).get().join(', '));
});

$('#chk_std_email').change(function(){
    if (this.checked) {
        $("#txt_std_centre_email").attr('readonly','readonly');
    } else {
        $("#txt_std_centre_email").removeAttr('readonly');
    }
}).change();