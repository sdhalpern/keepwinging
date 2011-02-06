<div id="feed_replace"></div>
<?php
foreach ($items as $item) {
    include_partial('feed/item', array('item' => $item));
}
?>
<script>window.since = <?php echo isset($item)?$item->getId():$since; ?>;</script>