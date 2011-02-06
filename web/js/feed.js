// Initialize since
window.since = Math.round(new Date().getTime() / 1000);

function updateDataFeed() {    
    $.get('/api/feed', {since: window.since}, function(data) {
        window.since = Math.round(new Date().getTime() / 1000);

        $('#feed_replace').replaceWith(data);
        setTimeout('updateDataFeed();', 1000);
    }, 'html');
}
$(document).ready(function() { updateDataFeed(); });

jQuery(document).ready(function() {
  jQuery(".timeago").timeago();
});