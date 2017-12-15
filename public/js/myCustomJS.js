/*
var rowID=0;
$('.itemRow').find('.buttonOption').find('.rem').on('click',function (event) {
    event.preventDefault();
    rowID=0;
    rowID = event.target.parentNode.parentNode.dataset['rowid'];
    alert(rowID);
})


$('#myBtn').on('click', function () {
    $.ajax({
        method: 'POST',
        url: url,
        data: {body: "hey there",rowid:rowID ,_token:token}
    })
    .done(function(msg){
        console.log(msg['message']);
    })
})
*/