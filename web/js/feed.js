// Initialize since
window.since = 0;

function updateDataFeed() {    
    $.get('/api/feed', {since: window.since}, function(data) {
        $('#feed_replace').html(data);
        $('#feed_replace').attr('id', '#feed_load_' + window.since);
        setTimeout('updateDataFeed();', 5000);
    }, 'html');
}
$(document).ready(function() { updateDataFeed(); });