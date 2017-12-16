$(document).ready(function () {
    $('#addr_info').hide();
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