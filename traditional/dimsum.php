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
 
$result = mysql_query('
SELECT D.id, D.name, D.stock, T.name as type, C.name as category 
FROM dimsums as D 
JOIN types as T on (D.type_id = T.id) 
JOIN categories as C on (D.category_id = C.id)
ORDER BY D.id');


//$result = mysql_query("SELECT * from dimsums");
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<style>
		table, td{ border:1px solid black; }
	</style>
</head>
<body>
<h1>List of Dimsum</h1>
<table>
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Stock</th>
	<th>Type</th>
	<th>Category</th>
</tr>
<?php while ($row = mysql_fetch_array($result)){ ?>
<tr>
	<td><?php echo $row['id']; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['stock']; ?></td>
	<td><?php echo $row['type']; ?></td>
	<td><?php echo $row['category']; ?></td>
</tr>
<?php } ?>
</table>
<a href="add.php">Add new dimsum</a>
</body>
</html>
<?php
mysql_close($conn);
?>