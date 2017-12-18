$(document).ready(function () {
    $('#addr_info').hide();
    $('#current_addr').show();
});


$('#addr_sel').on('change', function () {
    //alert( this.value );
    if (this.value == 1) {
        $('#addr_info').hide();
        $('#current_addr').show();
    }
    else {
        $('#addr_info').show();
        $('#current_addr').hide();


    }
});