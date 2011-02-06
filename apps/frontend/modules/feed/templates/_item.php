<div class="feedRow">
	<div class="profPic"><img src="/uploads/<?php echo $item->getUser()->getPicture(); ?>" height="100px" width="100px"></div>
	<div class="textBar">
		<div class="barPointer"><img src="/images/pointer7.png"></div>
		<div class="contentText">
            <span class="fatty"><?php echo $item->getUser(); ?></span>
            <?php echo $item->getText(); ?>
            <span id="<?php echo $tag = md5(uniqid()); ?>" class="timeago" title="<?php echo $item->getCreatedAt('c'); ?>">
                <script>$('#<?php echo $tag; ?>').val(jQuery.timeago("<?php echo $item->getCreatedAt('c'); ?>")); </script>
            </span></div>
	</div>
</div>