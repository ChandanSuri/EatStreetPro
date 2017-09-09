<?php
//require 'db_connect.inc.php';
//require 'db_constants.inc.php';
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('doctor',$db)
or die(mysql_error($db));
$query="CREATE TABLE IF NOT EXISTS LOGIN(
id INTEGER NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
password CHAR(40) NOT NULL,
salt CHAR(40) NOT NULL,
level ENUM('0','1','2') DEFAULT '0',
PRIMARY KEY(id))";

mysql_query($query,$db) or die(mysql_error($db));

$query="CREATE TABLE  IF NOT EXISTS PATIENT(
id INTEGER NOT NULL ,
name VARCHAR(50) NOT NULL,
contact VARCHAR(20) NOT NULL,
emer_contact VARCHAR(20) NOT NULL,
dob DATE NOT NULL,
sex ENUM('M','F','O') ,
PRIMARY KEY(id)
	)";

mysql_query($query,$db) or die(mysql_error($db));

$query="CREATE TABLE IF NOT EXISTS WALLET(
id INTEGER NOT NULL,
freecheck INTEGER DEFAULT 1,
PRIMARY KEY(id)
)";

mysql_query($query,$db) or die(mysql_error($db));

$query="CREATE TABLE IF NOT EXISTS DOCTOR(
id INTEGER NOT NULL,
d_name VARCHAR(50) NOT NULL,
h_contact VARCHAR(20) NOT NULL,
c_contact VARCHAR(20) NOT NULL,
email_id VARCHAR(50) NOT NULL,
PRIMARY KEY(id)
	)";

mysql_query($query,$db) or die(mysql_error($db));

$query="CREATE TABLE IF NOT EXISTS DOCTOR_ADD(
id  INTEGER NOT NULL,
r_hno VARCHAR(20) NOT NULL,
r_street VARCHAR(20) NOT NULL,
r_city VARCHAR(20) NOT NULL,
r_pincode VARCHAR(20) NOT NULL,
r_state VARCHAR(20) NOT NULL,
c_hno VARCHAR(20) NOT NULL,
c_street VARCHAR(20) NOT NULL,
c_city VARCHAR(20) NOT NULL,
c_pincode VARCHAR(20) NOT NULL,
c_state VARCHAR(20) NOT NULL,
PRIMARY KEY(id)
	)";

mysql_query($query,$db) or die(mysql_error($db));

$query="CREATE TABLE IF NOT EXISTS PATIENT_ADD(
id  INTEGER NOT NULL,
p_hno VARCHAR(20) NOT NULL,
p_street VARCHAR(20) NOT NULL,
p_city VARCHAR(20) NOT NULL,
p_pincode VARCHAR(20) NOT NULL,
p_state VARCHAR(20) NOT NULL,
PRIMARY KEY(id)
	)";

mysql_query($query,$db) or die(mysql_error($db));

$query="CREATE TABLE IF NOT EXISTS PAT_MED(
id INTEGER NOT NULL,
platelet_count INTEGER UNSIGNED NOT NULL,
phase ENUM('0','1','2','3') DEFAULT '0',
c_date DATE NOT NULL,
coup_avail BOOLEAN,
PRIMARY KEY(id)
	)";

mysql_query($query,$db) or die(mysql_error($db));
echo 'Tables inserted Successfully';

?>
