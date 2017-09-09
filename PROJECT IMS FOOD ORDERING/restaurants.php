<!--Table Restaurant Data-->
<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(1,1,"Hotel Lazeez","Punjabi Tadka","9781103939","A Perfect Place To Dine in with Delicious Veg as well as Non-Veg Food")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(2,1,"Gopal","Punjabi Tadka","2280062-69","A Perfect Place To Order Delicious Food where You will get a spectrum of Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(3,1,"Jaggi","Punjabi Tadka","0175 500 0521","A Perfect Place To Have all Your meals with a variety of Vegetarian Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(4,1,"Gopal","Punjabi Tadka","2212523 , 2310212","A Perfect Place To Order Delicious Food where You will get a spectrum of Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(5,1,"Chawla Square","Punjabi Tadka","080599 70100","A Perfect Place To Dine in with Delicious and Mouth-watering Non-Veg Food")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(6,1,"Chawla Chicken","Punjabi Tadka","0175 230 3637","A Perfect Place To Dine in with Delicious and Mouth-watering Non-Veg Food")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(7,1,"Kababchi","Punjabi Tadka","0175 500 3000, 0175 230 3000","A Perfect Place To Have a String of Delicacies all the day Long")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(8,1,"Waah Ji Waah","Punjabi Tadka","9592213113","A Perfect Place To Dine in with Culinary Extravaganze Of Tandoori Food, !00% Veg Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(9,1,"New Sheetal","Punjabi Tadka","0175-2218153","A Perfect Place To Dine in with Mouth-watering Veg and Non-Veg Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(10,1,"Vimis Gravy And Grill","Punjabi Tadka","093177 90006","A Perfect Place To Have Food Such Delicious!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(11,2,"Moti Mahal Deluxe","Continental","8872927230 , 0175-5006120","A Perfect Place To Dine in with Such Extravagant variety of Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(12,2,"The Yellow Chilli","Continental","0175 222 2016","A Perfect Place To Have A Pious taste Of Sanjeev Kapoor Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(13,2,"Jaggi","Continental","0175 500 0521","A Perfect Place To Have all Your meals with a variety of Vegetarian Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(14,3,"Shree Rathnam","South Indian","098881 06786","A Perfect Place To Have A Taste Of all the South Indian Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(15,3,"Gopal","South Indian","2280062-69","A Perfect Place To Have A Taste Of all the South Indian Delicacies as well as other!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(16,3,"Madrasi Restaurant","South Indian","09041397019","A Perfect Place To Have A Meal Full Of all the South Indian Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(17,4,"Yo! China","Chinese","011 26151919","A Perfect Place To Have Such Charming Culnary Experience Of High Standard Chinese Food with an International Ambience!!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(18,4,"Red Dragon","Chinese","9646004549 , 9780323131","A Perfect Place To Have An Extravagant Variety Of Chinese Delicacies")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(19,5,"Dominos Pizza","Fast Food Arena","2214360-65","A Perfect Place To Have A Meal With Extravaganza Of Delicious Pizzas")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(20,5,"Dominos Pizza","Fast Food Arena","5000555, 5001666","A Perfect Place To Have An A Meal With Extravaganza Of Delicious Pizzas")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(21,5,"Mc Donalds","Fast Food Arena","098156 22211","A Perfect Place To Have Healthy And Fresh Fast Food Items with Such a Delicious Taste!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(22,5,"Pizza Hut","Fast Food Arena","0175 398 8398","A Perfect Place To Have A Meal Filled with Mouth-Watering And Delicious Pizzas Along with Fresh Side Orders")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(23,5,"La Pinoz Pizza","Fast Food Arena","0175 500 9996","A Perfect Place To Have Healthy And Fresh Pizzas with Such a Delicious Taste!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(24,5,"Subway","Fast Food Arena","0175 501 0120","A Perfect Place To Have Healthy And Fresh Subway Food with Such a Delicious Taste!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(25,5,"KFC","Fast Food Arena","0175 500 1444","A Perfect Place To Have Healthy And Fresh Chicken with Such a Delicious Taste!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(26,5,"Pizza Nation","Fast Food Arena","098550 00110","A Perfect Place To Have Healthy And Fresh Pizzas with Such a Delicious Taste!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(27,6,"Sahni Bakery","Bakery","085912 59111","A Perfect Place To Have Healthy And Fresh Baked Products with Such a Delicious Taste And Reasonable Cost!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(28,6,"Dunkin Donuts","Bakery","0175-5008040 , 5008041","A Perfect Place To Have Healthy And Fresh Baked Products with Such a Delicious Taste!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(29,7,"Cafe Coffee Day","Cafe","080 4001 2345","A Perfect Place To Have Heart-Warming Coffee Made from Fresh Cocoa Along with variety of snacks!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(30,7,"Cafe Coffee Day","Cafe","09316080446","A Perfect Place To Have Heart-Warming Coffee Made from Fresh Cocoa Along with variety of snacks!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(31,7,"Cafe Coffee Day","Cafe","0175 324 0294","A Perfect Place To Have Heart-Warming Coffee Made from Fresh Cocoa Along with variety of snacks!")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO RESTAURANT
VALUES(32,1,"Ignite","Punjabi Tadka","098030 80803","A Perfect Place To Have a Taste Of Every Delicious Snack!")';
mysql_query($query,$db) or die(mysql_error($db));
echo 'Data Inserted Successfully Into Restaurants Table';
?>
<!--Table Restaurant Address Data-->
<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(1,"Phulkian Enclave, Dashmesh Nagar, Patiala, Punjab")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(2,"Urban Estate Phase II, Urban Estate, Patiala, Punjab 147002")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(3,"Near Anardana Chowk, Adalat Bazar, Patiala, Punjab 147001")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(4,"At Phowara Chowk, Fountain Chowk, Patiala,Punjab.")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(5,"Near Walia Enclave, opposite Punjabi Universty, Patiala Punjab. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(6,"Sco 1, Bhupindra Road, 22 No. Phatak, Patiala Punjab. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(7,"Bhupindra Rd, Civil Lines, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(8,"Near 22 Number, Railway Flyover, Patiala,Punjab. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(9,"New Lal Bagh, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(10,"22 Number, Railway Flyover, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(11,"Bhupindra Rd, Model Town, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(12,"1, Stadium Road, In Front Of YPS, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(13,"Near Anardana Chowk, Adalat Bazar, Patiala, Punjab 147001 ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(14,"Hotel Jiwan Plaza, Bhupindra Road, Patiala, Punjab 147004. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(15,"Urban Estate Phase II, Urban Estate, Patiala, Punjab 147002 ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(16,"Vikas Vihar, Prem Nagar, Patiala,Punjab 147004. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(17,"Bank Colony, Patiala, Punjab,147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(18,"22no. Phatak, Near Khoobsurat Palace, Patiala,Punjab. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(19,"Shop No. 114, 115, New Leela Bhawan, Opp Subway, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(20,"Ground Floor, SCO 110, Phase 2, Rajpura Road, Urban Estate, Patiala, Punjab 147002. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(21,"Shop No.: 34, 35 , 36, Omaxe Mall, Near Green Hotel, The Mall Road, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(22,"Scheme 14, Leela Bhawan, Opp Gopal Sweets,Bank Colony, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(23,"Bhupindra Rd, Model Town, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(24,"S.C.O. 115, Urban Estate Phase II, Patiala, Punjab 147002. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(25,"SCO - 2 & 3, Leela Bhavan Chowk, Opp Gopal Sweets, Near Surya Complex, Patiala, Punjab 126102")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(26,"Shop No. 25 A, City Center Complex, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(27,"No.22, Bhupindra Road, Phatak, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(28,"Near Punjabi Bagh, Patiala, Punjab 147001 ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(29,"Bhupindra Rd, Near Punjabi Bagh,  Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(30,"Inside New Leela Bhawan, Ajit Nagar, Patiala, Punjab 147001. ")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(31,"Inside Omaxe Mall, Mall Road, Near Central State Library, Patiala, Punjab 147001.")';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO REST_ADD
VALUES(32,"Lower ground -3 Adjoining Kapsons Patiala, Bhupindra Rd Patiala, Punjab 147001.")';
mysql_query($query,$db) or die(mysql_error($db));
echo 'Data Inserted In Restaurant Address Table Successfully !';
?>
<!--Table Agent Data-->
<?php
$db=mysql_connect('localhost','root','')
or die('Unable To Connect.Check Your Connection parameters.');
mysql_select_db('food_ordering',$db)
or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(1,"Ram",1,"9889883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(2,"Shyam",2,"9834583427",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(3,"Manohar",3,"9881883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(4,"Anubhav",4,"9888983421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(5,"Abhinav",5,"9889866421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(6,"Deepak",6,"9889883567",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(7,"Abhishek",7,"9889829821",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(8,"Rohit",8,"9889889421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(9,"Abhinandan",9,"9883333421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(10,"Shubham",10,"9889800421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(11,"Satvik",11,"9889880000",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(12,"Gaurav",12,"9881113421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(13,"Utkarsh",13,"9089883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(14,"Aman",14,"9189883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(15,"Kushal",15,"9289883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(16,"Anand",16,"9823883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(17,"Jyotirmay",17,"9123883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(18,"Harshdeep",18,"9889983421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(19,"Rajiv",19,"9800983421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(20,"Mohit",20,"9800883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(21,"Arunav",21,"9889834567",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(22,"Julius",22,"9889886721",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(23,"Manav",23,"9889844421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(24,"Anshul",24,"9889877421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(25,"Rajeev",25,"9889812421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(26,"Akshay",26,"9889883412",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(27,"Sood",27,"9889883001",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(28,"Ajay",28,"9844883421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(29,"Osho",29,"9884821421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(30,"Lakshit",30,"9889863421",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(31,"Chandan",31,"9889883786",0)';
mysql_query($query,$db) or die(mysql_error($db));
$query='INSERT IGNORE INTO AGENTS
VALUES(32,"Arjun",32,"9889883700",0)';
mysql_query($query,$db) or die(mysql_error($db))
?>
