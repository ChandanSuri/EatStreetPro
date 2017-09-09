<?php
session_start();
$db=mysql_connect('localhost','root','') or die('Unable to connect.Check your connection parameters.');
mysql_select_db('food_ordering',$db) or die(mysql_error($db));
$query='DROP TABLE TEMP_CART';
mysql_query($query,$db) or die(mysql_error($db));
header('Location: ' . $_SESSION['backpage']);
?>
