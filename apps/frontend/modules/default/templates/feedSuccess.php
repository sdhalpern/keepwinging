<?php foreach ($feed as $item): ?>

<?php echo $item->getUser() . ': ' . $item->getText(); ?><br />
<?php endforeach; ?>