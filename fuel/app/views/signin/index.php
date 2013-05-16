<h2>Listing <span class='muted'>Signins</span></h2>
<br>
<?php if ($signins): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($signins as $signin): ?>		<tr>

			<td><?php echo $signin->name; ?></td>
			<td><?php echo $signin->username; ?></td>
			<td><?php echo $signin->password; ?></td>
			<td><?php echo $signin->email; ?></td>
			<td>
				<?php echo Html::anchor('signin/view/'.$signin->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('signin/edit/'.$signin->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('signin/delete/'.$signin->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Signins.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('signin/create', 'Add new Signin', array('class' => 'btn btn-success')); ?>

</p>
