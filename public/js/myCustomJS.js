$('#myBtn').on('click', function () {
    $.ajax({
        method: 'POST',
        url: url,
        data: {body: "hey there"}
    })
    //.done(function)
})