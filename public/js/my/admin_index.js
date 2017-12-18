var repeater;

$(document).ready(function () {
    syncNotificationData();
    syncEarningData();
});


function syncNotificationData() {
    $.ajax({
        method: 'POST',
        url: url_sync,
        data: {body: "hey there", _token: token}
    })
        .done(function (msg) {
            //console.log(msg['msg']);
            $('#orders').text(msg['msg'][0]);
            //$('#deliv').text(msg['msg'][1]);
            $('#earn').text(msg['msg'][1]);
        })

    repeater = setTimeout(syncNotificationData, 1000);
}


function syncEarningData() {
    $.ajax({
        method: 'POST',
        url: url_earning,
        data: {body: "hey there", _token: token}
    })
        .done(function (msg) {
            //console.log(msg['msg']);
            var dataFromServer = msg['msg'];
            var arrlen = dataFromServer.length;
            var data = [];

            for (i = 0; i < arrlen; i++) {
                data.push({y: dataFromServer[i][0], a: dataFromServer[i][1]});
            }

            //console.log(data);
            var
                config = {
                    data: data,
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Total Income'],
                    fillOpacity: 0.6,
                    hideHover: 'auto',
                    behaveLikeLine: true,
                    resize: true,
                    pointFillColors: ['#ffffff'],
                    pointStrokeColors: ['black'],
                    lineColors: ['blue']
                };
            config.element = 'area-chart';
            Morris.Area(config);
            //Morris.setData(data);
            //Morris.redraw();
        })
}


