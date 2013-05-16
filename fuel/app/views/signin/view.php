<h2>Viewing <span class='muted'>#<?php echo $signin->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $signin->name; ?></p>
<p>
	<strong>Username:</strong>
	<?php echo $signin->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $signin->password; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $signin->email; ?></p>

<?php echo Html::anchor('signin/edit/'.$signin->id, 'Edit'); ?> |
<?php echo Html::anchor('signin', 'Back'); ?>