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
?>