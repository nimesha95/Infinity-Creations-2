$(document).ready(function () {
    console.log("helo");
    $('#design_div').hide();
    $('#printing_div').hide();
});

$('#order_type').on('change', function () {
    //alert( this.value );
    if (this.value == 1) {
        $('#design_div').hide();
        $('#printing_div').show();
    }
    else if (this.value == 2) {
        $('#design_div').show();
        $('#printing_div').hide();
    }
    else {
        $('#design_div').hide();
        $('#printing_div').hide();
    }
});


$("#customForm").submit(function (event) {
    console.log($("#printing_method").val());
    if ($("#order_type").val() == 0) {
        alert("Please Select Order Type");
        event.preventDefault();
        return;
    }
    else if ($("#order_type").val() == 1) {
        if (($("#printing_method").val() == 0)) {
            alert("Please Select Printing Category");
            event.preventDefault();
            return;
        }
    }

    else if ($("#order_type").val() == 2) {
        if (($("#design_method").val() == 0)) {
            alert("Please Select a design Category");
            event.preventDefault();
            return;
        }
    }
    //event.preventDefault();
    alert("Good to go");
});
