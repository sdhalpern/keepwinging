function updateDataLeaderboard() {
    $.get('/api/leaderboard', function(data) {
        $('#leaderboard').replaceWith(data);
        setTimeout('updateDataLeaderboard();', 30000);
    });
}

function updateDataChart() {
    $.get('/api/burnup', function(data) {
        $('#chart_burnup').replaceWith(data);
        setTimeout('updateDataChart();', 2500);
    });
}

function updateDataCount() {
    $.get('/api/count.json', function(data) {
        $('#consumption_total').text(data.eaten);
        $('#consumption_remain').text(data.remaining);
        setTimeout('updateDataCount();', 2500);
    });
}

function updateDataRate() {
    $.get('/api/rate.json', function(data) {
        $('#wing_rate').text(data.current);
        $('#wing_need').text(data.need);
        setTimeout('updateDataRate();', 1000);
    });
}

$(document).ready(function() { updateDataCount(); });
$(document).ready(function() { updateDataRate(); });
$(document).ready(function() { updateDataChart(); });
$(document).ready(function() { updateDataLeaderboard(); });

jQuery(document).ready(function() {
  jQuery(".timeago").timeago();
});