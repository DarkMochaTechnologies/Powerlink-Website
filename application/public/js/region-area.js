$('select#ddn_centre_area').change(function(){

var option = this.options[this.selectedIndex];
var region = $(option).closest('optgroup').prop('label');


if (region != null) {
option.setAttribute('data-text', option.text);
option.text = region;
} else {
	//option.text="Centres's Area";
}

$(this).closest('div').find('input').val(region);
// Reset texts for all other but current
for (var i = this.options.length; i--; ) {
	if (i == this.selectedIndex) continue;
	var text = this.options[i].getAttribute('data-text');
	if (text) this.options[i].text = text;
}
}).change();