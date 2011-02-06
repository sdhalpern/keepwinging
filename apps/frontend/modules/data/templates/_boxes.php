<div class="boxes">
    <div class="box rightbump">
        <div class="totalusersheadline">Total Wings Consumed</div>
        <div class="totalusersnumber" id="consumption_total"><?php echo $total; ?></div>
    </div>

    <div class="box">
        <div class="totalusersheadline">WPH (wings per hour)</div>
        <div class="totalusersnumber" id="wing_rate"><?php echo $rate; ?></div>
    </div>
</div>

<div class="boxes">
    <div class="headerbox rightbump"><span id="consumption_remain"><?php echo $remain; ?></span> Wings Remaining</div>

    <div class="headerbox"><span id="wing_need"><?php echo $need; ?></span> WPH Needed to Complete</div>
</div>

<script type="application/javascript">

function updateDataCount() {
    $.get('/api/count.json', function(data) {
        $('#consumption_total').text(data.eaten);
        $('#consumption_remain').text(data.remaining);
        setTimeout('updateDataCount();', 1000);
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
</script>