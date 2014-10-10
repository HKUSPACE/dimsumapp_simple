<h1>Add New Dimsum</h1>
<form method="post" action="index.php?c=dimsum&a=add">
	<div class="field">
		<label for="name">Name</label>
		<input name="name" id="name" />
	</div>
	<div class="field">
		<label for="stock">Stock</label>
		<input name="stock" id="stock" type="number" />
	</div>
	<div class="field">
		<label for="type">Type</label>
		<select name="type_id" id="type">
		<?php foreach ($types as $type): ?>
			<option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	<div class="field">
		<label for="category">Category</label>
		<select name="category_id" id="category">
		<?php foreach ($categories as $category): ?>
			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	<input type="submit" value="Add"/>
</form>