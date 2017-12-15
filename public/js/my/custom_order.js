$(document).ready(function () {
    console.log("helo");
    $('#design_div').hide();
    $('#printing_div').hide();
    //$('#printing_method').hide();
});

$('#addr_sel').on('change', function () {
    //alert( this.value );
    if (this.value == 1) {
        $('#addr_info').hide();
    }
    else {
        $('#addr_info').show();
    }
});
