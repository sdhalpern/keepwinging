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