<h2>Editing <span class='muted'>Signin</span></h2>
<br>

<?php echo render('signin/_form'); ?>
<p>
	<?php echo Html::anchor('signin/view/'.$signin->id, 'View'); ?> |
	<?php echo Html::anchor('signin', 'Back'); ?></p>
