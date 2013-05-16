<h2>Listing <span class='muted'>Logins</span></h2>
<br>
<?php if ($logins): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($logins as $login): ?>		<tr>

			<td><?php echo $login->username; ?></td>
			<td><?php echo $login->password; ?></td>
			<td>
				<?php echo Html::anchor('login/view/'.$login->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('login/edit/'.$login->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('login/delete/'.$login->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Logins.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('login/create', 'Add new Login', array('class' => 'btn btn-success')); ?>

</p>
