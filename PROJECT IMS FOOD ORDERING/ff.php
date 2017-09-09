<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query='SELECT rest_name
FROM RESTAURANT
WHERE rest_id='.$_GET['rest_id'].' AND categ_id='.$_GET['categ_id'];
$result=mysql_query($query,$db) or die(mysql_error($db));
echo '<h2>'.$result.'</h2>';
echo '<br/>';
$query='SELECT rest_type
FROM RESTAURANT
WHERE rest_id='.$_GET['rest_id'].' AND categ_id='.$_GET['categ_id'];
$result=mysql_query($query,$db) or die(mysql_error($db));
echo '<h4>'.$result.'</h4><br/>';
?>
<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query='SELECT R1.address,R2.contact_no
FROM REST_ADD R1 JOIN RESTAURANT R2
ON rest_id='.$_GET['rest_id'].'AND categ_id='.$_GET['categ_id'];
$result=mysql_query($query,$db) or die(mysql_error($db));
$row=mysql_fetch_assoc($result)
foreach($row as $value) {
echo '<h4>'.$value.'</h4><br/>';
}
?>
<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query=
