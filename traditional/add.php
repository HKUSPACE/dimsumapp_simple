<?php
$conn = mysql_connect('localhost', 'dimsumuser','rFSrXL6Vu6UAyA7P');
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
  
if (!mysql_select_db('dimsumapp')){
	die('haha'.mysql_error());
}

$result = mysql_query('set names utf8');

if (!empty($_POST)){
	$name = $_POST['name'];
	$stock = $_POST['stock'];
	$type_id = $_POST['type_id'];
	$category_id = $_POST['category_id'];
	
	$result = mysql_query("INSERT INTO dimsums (name, stock, type_id, category_id) VALUES ('".$name."', ".$stock.",".$type_id.",".$category_id.")");
	if ($result){
		echo "New dimsum is added.";
	}
	else{
		echo mysql_error();
	}
}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<style>
		table, td{ border:1px solid black; }
	</style>
</head>
<body>
<h1>Add New Dimsum</h1>
<form method="post" action="add.php">
	<div class="field">
		<label for="name">Name</label>
		<input name="name" id="name" />
	</div>
	<div class="field">
		<label for="stock">Stock</label>
		<input name="stock" id="stock" type="number" />
	</div>
<?php
$result = mysql_query("SELECT * FROM types");
?>
	<div class="field">
		<label for="type">Type</label>
		<select name="type_id" id="type">
<?php while ($row = mysql_fetch_array($result)){ ?>
			<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
<?php } ?>
		</select>
	</div>
<?php
$result = mysql_query("SELECT * FROM categories");
?>	
	<div class="field">
		<label for="category">Category</label>
		<select name="category_id" id="category">
<?php while ($row = mysql_fetch_array($result)){ ?>
			<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
<?php } ?>
		</select>
	</div>
	<input type="submit" value="Add"/>
</form>
</body>
</html>
<?php
mysql_close($conn);
?>