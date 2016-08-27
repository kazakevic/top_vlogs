$( document ).ready(function() {
    $.getJSON("charts/channels", function (result) {
        var labels = [],data=[];
        for (var i = 0; i < result.length; i++) {
            labels.push(result[i].month);
            data.push(result[i].channels);
        }

        var ctx = document.getElementById("channels");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '#New Channels',
                    data: data
                }]
            }
        });
    });

    $.getJSON("charts/users", function (result) {
        var labels = [],data=[];
        for (var i = 0; i < result.length; i++) {
            labels.push(result[i].date);
            data.push(result[i].users);
        }

        var ctx = document.getElementById("users");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '#New Users',
                    data: data
                }]
            }
        });
    });
});/**
 * Created by Darjush on 8/27/2016.
 */
