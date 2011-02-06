<?php foreach ($items as $item): ?>

    <?php include_partial('feed/item', array('item' => $item)); ?>
<?php endforeach; ?>