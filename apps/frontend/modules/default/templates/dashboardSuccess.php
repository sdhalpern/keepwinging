<div class="dash_left">
    <div class="boxes">
        <div class="box rightbump">
            <div class="totalUsersHeadline">Total Wings Consumed</div>
            <div class="totalUsersNumber">1,001</div>
        </div>

        <div class="box">
            <div class="totalUsersHeadline">WPH (wings per hour)</div>
            <div class="totalUsersNumber">128</div>
        </div>
    </div>

    <div class="boxes">
        <div class="headerbox rightbump">567 Wings Remaining</div>

        <div class="headerbox">123 WPH Needed to Complete</div>
    </div>

    <div class="linechart">
        <?php include_component('chart', 'burnup'); ?>
    </div>
</div>
<?php include_component('leaderboard', 'leaderboard'); ?>