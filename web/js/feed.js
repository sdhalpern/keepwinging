function updateDataFeed() {
    $.get('/frontend_dev.php/api/feed', function(data) {
        $('#feed_replace').replaceWith(data);
        //setTimeout('updateDataFeed();', 1000);
    });
}
$(document).ready(function() { updateDataFeed(); });