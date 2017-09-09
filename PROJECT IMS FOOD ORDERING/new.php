<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query='CREATE TABLE RESTAURANT SELECT * FROM restaurant';
mysql_query($query,$db);
$query='CREATE TABLE REST_ADD SELECT * FROM rest_add';
mysql_query($query,$db);
$query='CREATE TABLE CUSTOMER SELECT * FROM customer';
mysql_query($query,$db);
$query='CREATE TABLE ORDERS SELECT * FROM orders';
mysql_query($query,$db);
$query='CREATE TABLE ITEMS SELECT * FROM items';
mysql_query($query,$db);
$query='CREATE TABLE PAYMENT SELECT * FROM payment';
mysql_query($query,$db);
$query='CREATE TABLE PAY_ORDERED SELECT * FROM pay_ordered';
mysql_query($query,$db);
$query='CREATE TABLE AGENTS SELECT * FROM agents';
mysql_query($query,$db);
echo 'Tables Created Successfully';
?>