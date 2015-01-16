jQuery(document).ready(function(){
    jQuery("#txt_adhoc_start_date").datepicker({
        minDate: 0,
        maxDate: "+60D",
        numberOfMonths: 2,
        onSelect: function(selected) {
          jQuery("#txt_adhoc_end_date").datepicker("option","minDate", selected)
        }
    });
    jQuery("#txt_adhoc_end_date").datepicker({ 
        minDate: 0,
        maxDate:"+60D",
        numberOfMonths: 2,
        onSelect: function(selected) {
           jQuery("#txt_adhoc_start_date").datepicker("option","maxDate", selected)
        }
    });  
});
