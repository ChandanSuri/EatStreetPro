<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS RESTAURANT(
  rest_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  categ_id INTEGER UNSIGNED NOT NULL,
  rest_name VARCHAR(255) NOT NULL,
  categ_name VARCHAR(255) NOT NULL,
  contact_no VARCHAR(255),
  rest_type VARCHAR(255),
  PRIMARY KEY(rest_id) )';
mysql_query($query,$db) or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS REST_ADD (
  rest_id INTEGER UNSIGNED NOT NULL,
  address VARCHAR(255) NOT NULL,
  PRIMARY KEY(rest_id)
  )';
mysql_query($query,$db) or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS CUSTOMER (
  email_id VARCHAR(255) NOT NULL,
  cust_name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  phone_no VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY(email_id)
)';
mysql_query($query,$db) or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS ORDERS (
  rest_id INTEGER UNSIGNED NOT NULL,
  order_no INTEGER UNSIGNED NOT NULL AUTO_INCREMENT ,
  rest_name VARCHAR(255) NOT NULL,
  no_of_items INTEGER UNSIGNED,
  email_id VARCHAR(255),
  PRIMARY KEY(order_no),
  FOREIGN KEY(rest_id) REFERENCES RESTAURANT(rest_id),
  FOREIGN KEY(email_id) REFERENCES CUSTOMER(email_id)
)';
mysql_query($query,$db) or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS ITEMS (
  order_no INTEGER UNSIGNED,
  item_no INTEGER UNSIGNED NOT NULL,
  quantity VARCHAR(2) NOT NULL,
  description VARCHAR(255) NOT NULL,
  price INTEGER UNSIGNED,
  PRIMARY KEY(order_no,item_no),
  FOREIGN KEY(order_no) REFERENCES ORDERS(order_no)
)';
mysql_query($query,$db) or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS PAYMENT (
  pay_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  email_id VARCHAR(255) NOT NULL ,
  pay_type VARCHAR(255) NOT NULL,
  price INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(pay_id),
  FOREIGN KEY(email_id) REFERENCES CUSTOMER(email_id)
)';
mysql_query($query,$db) or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS PAY_ORDERED (
  pay_no INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  pay_id INTEGER UNSIGNED NOT NULL,
  items_ordered VARCHAR(255) NOT NULL,
  PRIMARY KEY(pay_no),
  FOREIGN KEY(pay_id) REFERENCES PAYMENT(pay_id)

)';
mysql_query($query,$db) or die(mysql_error($db));
$query='CREATE TABLE IF NOT EXISTS AGENTS (
agent_id VARCHAR(255) NOT NULL,
agent_name VARCHAR(255) NOT NULL,
rest_id INTEGER UNSIGNED NOT NULL,
agent_phone_no VARCHAR(255),
order_no INTEGER UNSIGNED NOT NULL DEFAULT 0,
PRIMARY KEY(agent_id),
FOREIGN KEY(rest_id) REFERENCES RESTAURANT(rest_id)
)';
mysql_query($query,$db) or die(mysql_error($db));

echo 'Tables Created Successfully';
?>

