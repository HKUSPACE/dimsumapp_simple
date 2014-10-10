<h1>List of Dimsum</h1>
<?php if (!empty($dimsums)): // $dimsums is creatd by dimsum Controller index Action ?>
<table>
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Stock</th>
	<th>Type</th>
	<th>Category</th>
</tr>
<?php foreach ($dimsums as $dimsum): ?>
<tr>
	<td><?php echo $dimsum['id']; ?></td>
	<td><?php echo $dimsum['name']; ?></td>
	<td><?php echo $dimsum['stock']; ?></td>
	<td><?php echo $dimsum['type']; ?></td>
	<td><?php echo $dimsum['category']; ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
<a href="index.php?c=dimsum&a=add">Add New Dimsum</a>