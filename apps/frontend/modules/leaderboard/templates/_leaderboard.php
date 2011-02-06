<?php

$consumption = array();
foreach ($users as $user) {
    $consumption[] = $user->getWingConsumption();
}

$max = max($consumption);

$perWing = 220 / $max;

?>
<div class="dash_right">
    <?php foreach ($users as $user): ?>
        <div class="leader_row">
            <img src="/uploads/<?php echo $user->getPicture(); ?>" height="50" width="50" alt="" class="leader_pic" />
            <div class="leader_data">
                <div class="leader_text">
                <?php echo $user; ?><br />
                <div class="leader_progress"
                     style="width:<?php echo $user->getWingConsumption() * $perWing; ?>px">
                    <?php echo $user->getWingConsumption(); ?> Wings</div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>