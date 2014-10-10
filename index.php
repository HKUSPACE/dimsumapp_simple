<?php
// Connect database and select DB
include('database.inc.php');

$title = 'Home';

// Get Controller
if (isset($_GET['c'])){
	$controller = $_GET['c'];
}
else {
	$controller = 'home';
}

// Get Action
if (isset($_GET['a'])){
	$action = $_GET['a'];
}
else{
	$action = 'index';
}

// Consider which Controller to work
if ($controller == 'dimsum'){
	switch ($action){
		// Define logic to different Actions
		case 'index':
			$result = mysql_query('
SELECT D.id, D.name, D.stock, T.name as type, C.name as category 
FROM dimsums as D 
JOIN types as T on (D.type_id = T.id) 
JOIN categories as C on (D.category_id = C.id)
ORDER BY D.id');
			
			$dimsums = array();
			
			while ($row = mysql_fetch_array($result)){
				array_push($dimsums, $row);
			}
			break;
			
		case 'add':
			
			$result = mysql_query("SELECT * FROM types");
			$types = array();
			
			while ($row = mysql_fetch_array($result)){
				array_push($types, $row);
			}
			
			$result = mysql_query("SELECT * FROM categories");
			$categories = array();
			
			while ($row = mysql_fetch_array($result)){
				array_push($categories, $row);
			}
			
			
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

			break;
	}
}

// Render Views
include('header.inc.php');
include($controller.'_'.$action.'.inc.php');
include('footer.inc.php');

?>