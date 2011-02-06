<?php foreach ($feed as $item): ?>
<div class="feedRow">
	<div class="profPic"><img src="/uploads/<?php echo $item->getUser()->getPicture(); ?>" height="100px" width="100px"></div>
	<div class="textBar">
		<div class="barPointer"><img src="/images/pointer7.png"></div>
		<div class="contentText"><span class="fatty"><?php echo $item->getUser(); ?></span> <?php echo $item->getText(); ?></div>
	</div>
</div>
<?php endforeach; ?>