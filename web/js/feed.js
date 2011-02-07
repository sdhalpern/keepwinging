// Initialize since
window.since = 0;

function updateDataFeed() {    
    $.get('/api/feed', {since: window.since}, function(data) {
        $('#feed_replace').html(data);
        $('#feed_replace').attr('id', '#feed_load_' + window.since);
        setTimeout('updateDataFeed();', 2500);
    }, 'html');
}
$(document).ready(function() { updateDataFeed(); });