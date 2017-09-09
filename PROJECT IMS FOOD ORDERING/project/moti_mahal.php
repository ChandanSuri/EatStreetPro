<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Motimahal</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--<link href="css/bootstrap.css" rel="stylesheet">-->
<link href="font_awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>
<body>
  <!--Start of navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
       <a class="navbar-brand" href="home.php">
             <img alt="Brand" src="images/Logo.png" width="100px" height="35px">
             </a>
      
    <a class="navbar-brand" href="home.php">EATSTREET</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-eatstreet-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
            </button>
   </div>
    <div class="collapse navbar-collapse navbar-right" id="bs-eatstreet-navbar-collapse-1">
      <ul class="nav navbar-nav nav-pills">
        <li ><a href="home.php">HOME &nbsp;&nbsp;<span class="glyphicon glyphicon-home" area-hidden="true"></span></a></li>
        <li class="dropdown">
          <!--<a class="dropdown-toggle" data-toggle="dropdown" href="#" >CATEGORIES<span class="caret"></span>
          </a>-->
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">CATEGORIES<span class="caret"></span></a>
        <ul class="dropdown-menu" id="drop">
        <li class="divider"></li>
              <li><a href="punjabi_tadka.php">Punjabi Tadka</a></li>
              <li class="divider"></li>
              <li><a href="continental.php">Continental</a></li>
              <li class="divider"></li>
              <li><a href="south_indian.php">South Indian</a></li>
              <li class="divider"></li>
              <li><a href="chinese.php">Chinese</a></li>
              <li class="divider"></li>
              <li><a href="fast_food.php">Fast Food Arena</a></li>
              <li class="divider"></li>
              <li><a href="bakery.php">Bakery</a></li>
              <li class="divider"></li>
              <li><a href="cafe.php">Cafe</a></li>
              <li class="divider"></li>
            </ul>  
        <li><a href="contact.php">CONTACT US &nbsp;&nbsp;<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></a></li>
                </li>  
                <?php
                  session_start(); 
                  $_SESSION['rest_id']=$_GET['rest_id'];
                  $_SESSION['categ_id']=$_GET['categ_id'];
                  if(!isset($_SESSION['username']))
                  {
                    echo '<li><a href="login.php">LOGIN &nbsp;&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>';  
                  }
                  else
                  {
                    echo '<li class="dropdown">';
                    echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">'.$_SESSION['username'];
                    echo '<span class="caret"></span></a>';
                    echo '<ul class="dropdown-menu"><li class="divider"></li>';
                    echo "<li><a href='logout.php'>Logout</a></li>";
                    echo '<li class="divider"></li></ul>';                  }
                  ?>
            </li> 
      </ul>
    </div>
  </div>
</nav>

    <div class="container" style="align:center ; width:480px;">
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
        <div class="col-md-8 no-margin no-padding">
          <strong><p style="margin-top:40px">
          <?php
             $db=mysql_connect('localhost','root','')
             or die('Unable To Connect.Check Your Connection parameters.');
             mysql_select_db('food_ordering',$db)
             or die(mysql_error($db));
             $query='SELECT rest_name
             FROM RESTAURANT
             WHERE rest_id='.$_GET['rest_id'].' AND categ_id='.$_GET['categ_id'];
             $result=mysql_query($query,$db) or die(mysql_error($db));
             $row=mysql_fetch_assoc($result);
             foreach($row as $value) {
             echo '<h2>'.$value.'</h2>';
             echo '<br/>';
           }
             $query='SELECT rest_type
             FROM RESTAURANT
             WHERE rest_id='.$_GET['rest_id'].' AND categ_id='.$_GET['categ_id'];
             $result=mysql_query($query,$db) or die(mysql_error($db));
             $row=mysql_fetch_assoc($result);
             foreach($row as $value) {
             echo '<h4>'.$value.'</h2><br/>';
           }
             ?></p></strong></div>
        <DIV class="col-md-4 no-margin no-padding">
              <img src="images/moti_mahal.jpg" style=" margin-top:10px; height:150px; width:200px; z-index: -1;" class="img-responsive">
            </div>
        </DIV>
      </div>
    </div>
  </div>
  <div class="jumbotron">
    <DIV class="container">
      <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
            <div class="panel-heading">Contact Details</div>
            <div class="panel-body">
              <address>
                   <?php
              $query='SELECT R1.address,R2.contact_no
              FROM REST_ADD R1 JOIN RESTAURANT R2
              ON R1.rest_id=R2.rest_id AND R1.rest_id='.$_GET['rest_id'].' AND R2.categ_id='.$_GET['categ_id'];
              $result=mysql_query($query,$db) or die(mysql_error($db));
              $row=mysql_fetch_assoc($result);
              $i=1;
              foreach($row as $value) {
                if($i==1){
              echo ' ADDRESS &nbsp;&nbsp; <h4>'.$value.'</h4><br/>';
              }
              else
              {
                echo 'PHONE NO. &nbsp; &nbsp; <h5>'.$value.'</h5><br/>';
              }
              $i=$i+1;
            }
              ?> 
              </address>
            </div>
        </div>
      </div>
        <DIV class="col-md-4 col-md-offset-1">
          <div class="panel panel-default">
            <DIV class="panel-heading">Menu</DIV>
            <DIV class="panel-body">
              <table class="table table-striped table-hover" border="0">
                <tr><th>Menu</th><th>Price</th><th>Quantity</th></tr>
              <form method="post" role="form" action="order_confirmation.php?rest_id=<?php echo $_SESSION['rest_id']; ?>&categ_id=<?php echo $_SESSION['categ_id']; ?>" id="form1" class="form-horizontal">
              <div class="form-group">
                <tr>
                  <th colspan="3" class="success"><u><i>Non Veg Soups</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Murgh Kali Mirch/129"><strong> Murgh Kali Mirch </strong></td>
                <td>RS 129.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Sweet Corn/129"><strong> Chicken Sweet Corn </strong></td>
                <td>RS 129.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Hot Sour/129"><strong>Chicken Hot Sour </strong></td>
                <td>RS 129.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Manchow/129"><strong> Chicken Manchow </strong></td>
                <td>RS 129.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Talumein/129"><strong> Chicken Talumein </strong></td>
                <td>RS 129.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Lemon Coriander/129"><strong> Chicken Lemon Coriander </strong></td>
                <td>RS 129.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tandoori Starters</i></u></th>
                </tr>
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Chicken Tikka/349"><strong>Tandoori Chicken Tikka </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Achaari Chicken Tikka/349"><strong> Achaari Chicken Tikka </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pudina Chicken/349"><strong> Pudina Chicken </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Chicken/349"><strong> Tandoori Chicken </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chickenn Pakora/349"><strong>Chickenn Pakora </ong></td>
                <td>RS 349.00</td>
       <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Afghani Chicken/359"><strong> Afghani Chicken </strong></td>
                <td>RS 359.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Kastoori Kabab/419"><strong> Chicken Kastoori Kabab </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lahsooni Kabab/349"><strong> Lahsooni Kabab </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Reshmi Kabab/349"><strong> Reshmi Kabab </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Murg Malai Tikka/349"><strong> Murg Malai Tikka </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Seekh Kabab/349"><strong>Mutton Seekh Kabab </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kalmi Kabab/419"><strong> Kalmi Kabab </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Seekh Kabab/349"><strong> Chicken Seekh Kabab </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Burra Kabab/369"><strong> Burra Kabab </strong></td>
                <td>RS 369.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Non Veg Mixed Grill/699"><strong>Tandoori Non Veg Mixed Grill </strong></td>
                <td>RS 699.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tandoori Starters-Fish</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Orley/439"><strong> Fish Orley </strong></td>
                <td>RS 439.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Amritsari Fish/439"><strong> Amritsari Fish </strong></td>
                <td>RS 439.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Pomfret/519"><strong> Fish Pomfret </strong></td>
                <td>RS 519.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Fish Tikka/459"><strong> Tandoori Fish Tikka </strong></td>
                <td>RS 459.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Specialities-Mutton</i></u></th>
                </tr>
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Roghan Josh/419"><strong> Roghan Josh </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Rarha Meat/419"><strong>Rarha Meat </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Keema/419"><strong> Keema </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Gosht/419"><strong> Dal Gosht </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Saag Gosht/419"><strong> Saag Gosht </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Shahi Korma/419"><strong> Mutton Shahi Korma </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tawa Mutton/419"><strong> Tawa Mutton </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Curry/309"><strong> Egg Curry </strong></td>
                <td>RS 309.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Curry/439"><strong> Chicken Curry </strong></td>
                <td>RS 439.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kadhai Chicken/399"><strong>Kadhai Chicken </strong></td>
                <td>RS 399.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Murg Bemisal/449"><strong> Murg Bemisal </strong></td>
                <td>RS 449.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Saag Chicken/439"><strong> Saag Chicken </strong></td>
                <td>RS 439.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Shahi Korma/439"><strong> Chicken Shahi Korma </strong></td>
                <td>RS 439.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Chicken/399"><strong> Butter Chicken </strong></td>
                <td>RS 399.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Lababdar/439"><strong>Chicken Lababdar </strong></td>
                <td>RS 439.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Specialities-Fish</i></u></th>
                </tr>
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Curry/449"><strong> Fish Curry </strong></td>
                <td>RS 449.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Shahi Korma/449"><strong> Fish Shahi Korma </strong></td>
                <td>RS 449.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tawa Fish/449"><strong> Tawa Fish </strong></td>
                <td>RS 449.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Platters</i></u></th>
                </tr>
              <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Chicken/459"><strong> Tandoori Chicken </strong></td>
                <td>RS 459.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Seekh Kabab/459"><strong> Seekh Kabab</strong></td>
                <td>RS 459.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Salad/459"><strong> Salad </strong></td>
                <td>RS 459.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Makhani/459"><strong> Dal Makhani </strong></td>
                <td>RS 459.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Naan/459"><strong> Naan </strong></td>
                <td>RS 459.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Chicken/849"><strong> Butter Chicken </strong></td>
                <td>RS 849.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Makhani/849"><strong> Dal Makhani </strong></td>
                <td>RS 849.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Naan Makhani/849"><strong> Naan Makhani </strong></td>
                <td>RS 849.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Biryani And Pulao</i></u></th>
                </tr>
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Murg Pulao/319"><strong> Murg Pulao </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                  
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Moti Mahal Special Biryani/389"><strong> Moti Mahal Special Biryani </strong></td>
                <td>RS 389.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Gosht Pulao/319"><strong> Gosht Pulao </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Vegetarian Soups</i></u></th>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tamatar Dhaniya Shorba/119"><strong> Tamatar Dhaniya Shorba</strong></td>
                <td>RS 119.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kali Mirch/119"><strong>Kali Mirch </strong></td>
                <td>RS 119.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sweet Corn/119"><strong> Sweet Corn </strong></td>
                <td>RS 119.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Manchow Soup/119"><strong> Manchow Soup </strong></td>
                <td>RS 119.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Talumein/119"><strong> Talumein </strong></td>
                <td>RS 119.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lemon Coriander/119"><strong> Lemon Coriander </strong></td>
                <td>RS 119.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tandoori Starters</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Chaat/269"><strong> Tandoori Chaat </strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Aloo Tikka/269"><strong> Tandoori Aloo Tikka 269 </strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Salad/269"><strong> Tandoori Salad  </strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Gobhi/269"><strong> Tandoori Gobhi  </strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dahi Ke Kabab/279"><strong> Dahi Ke Kabab </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Malai Sabz Kabab/279"><strong> Malai Sabz Kabab  </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Haryali Kabab/279"><strong>Veg Haryali Kabab  </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Aloo Stuffed/279"><strong> Tandoori Aloo Stuffed </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Mushroom/319"><strong> Tandoori Mushroom </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Stuffed Mushroom/319"><strong> Stuffed Mushroom </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka Achaari/319"><strong> Paneer Tikka Achaari </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Panner Malai Tikka/319"><strong> Panner Malai Tikka </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Veg. Mix Grill/479"><strong> Tandoori Veg. Mix Grill </strong></td>
                <td>RS 479.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Specialities Main Dish</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Jeera/229"><strong> Aloo Jeera </strong></td>
                <td>RS 229.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Methi Aloo/229"><strong> Methi Aloo </strong></td>
                <td>RS 229.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mixed Vegetable/259"><strong> Mixed Vegetable </strong></td>
                <td>RS 259.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Vegetable Kofta/269"><strong> Vegetable Kofta </strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Baingan Bharta/269"><strong> Baingan Bharta</strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Bhindi do Pyaza/259"><strong> Bhindi do Pyaza </strong></td>
                <td>RS 259.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Gobhi Masala/269"><strong>  Gobhi Masala </strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Vegetable Jalferezi/279"><strong>Vegetable Jalferezi </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Pindi Chana Masala/279"><strong>  Pindi Chana Masala </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Navarattan Korma/279"><strong>Navarattan Korma  </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Methi Mattar Malai/279"><strong>  Methi Mattar Malai </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Dum Aloo/229"><strong> Dum Aloo </strong></td>
                <td>RS 229.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Stuffed Tomato/279"><strong> Stuffed Tomato </strong></td>
                <td>RS 279.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Muttter Mushroom/289"><strong>  Muttter Mushroom </strong></td>
                <td>RS 289.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Malai Kofta/319"><strong> Malai Kofta  </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Vegetable Dewani Handi/299"><strong> Vegetable Dewani Handi  </strong></td>
                <td>RS 299.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Birbali/319"><strong> Paneer Birbali </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Pasanda/319"><strong> Paneer Pasanda </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kadhai Paneer/319"><strong> Kadhai Paneer </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Makhani Paneer Bhurji/319"><strong> Makhani Paneer Bhurji </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Saag Paneer/319"><strong> Saag Paneer </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka Masala/319"><strong> Paneer Tikka Masala </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Methi Malai/319"><strong> Paneer Methi Malai  </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Lababdar/329"><strong> Paneer Lababdar </strong></td>
                <td>RS 329.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Makhani/329"><strong> Paneer Makhani </strong></td>
                <td>RS 329.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Makhani/319"><strong> Dal Makhani </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Tadka/259"><strong> Dal Tadka </strong></td>
                <td>RS 259.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Pancharangi/259"><strong> Dal Pancharangi </strong></td>
                <td>RS 259.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tawa Paneer/449"><strong> Tawa Paneer </strong></td>
                <td>RS 449.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Biryani And Pulao</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Khushka/219"><strong> Khushka </strong></td>
                <td>RS 219.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Jeera Pulao/229"><strong> Jeera Pulao </strong></td>
                <td>RS 229.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Subz Pulao/249"><strong>Subz Pulao </strong></td>
                <td>RS 249.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Moti Mahal Special Biryani/319"><strong>Moti Mahal Special Biryani </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Side Orders</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Papad/39"><strong>Papad </strong></td>
                <td>RS 39.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Masala Papad/50"><strong> Masala Papad </strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain Raita/109"><strong>Plain Raita </strong></td>
                <td>RS 109.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Raita/109"><strong>Raita </strong></td>
                <td>RS 109.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Salad-Fresh Greens/115"><strong>Salad-Fresh Greens </strong></td>
                <td>RS 115.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="French Freies/199"><strong>French Freies </strong></td>
                <td>RS 199.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Indian Breads</i></u></th>
                </tr>
            
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Roti/29"><strong>Roti </strong></td>
                <td>RS 29.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Roti/39"><strong>Butter Roti</strong></td>
                <td>RS 39.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Romali Roti/49"><strong>Romali Roti </strong></td>
                <td>RS 49.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Khasta Roti/59"><strong>Khasta Roti </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Missi Roti/59"><strong>Missi Roti </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lachha Paratha/59"><strong>Lachha Paratha </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Paratha/59"><strong>Chilli Paratha  </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pudina Paratha/59"><strong>Pudina Paratha </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Paratha/59"><strong>Paneer Paratha </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Naan/49"><strong>Naan </strong></td>
                <td>RS 49.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Naan/59"><strong>Butter Naan </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Garlic Naan/59"><strong>Garlic Naan  </strong></td>
                <td>RS 59.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Keema Naan/119"><strong>Keema Naan </strong></td>
                <td>RS 119.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Kulcha/79"><strong>Veg Kulcha </strong></td>
                <td>RS 79.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Kulcha/69"><strong>Onion Kulcha </strong></td>
                <td>RS 69.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Kulcha/69"><strong>Butter Kulcha  </strong></td>
                <td>RS 69.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Bread Basket/209"><strong>Bread Basket  </strong></td>
                <td>RS 209.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Chinese Starters</i></u></th>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Crispy Potato In Honey And Chilly/259"><strong>Crispy Potato In Honey And Chilly </strong></td>
                <td>RS 259.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spring Roll/299"><strong>Spring Roll</strong></td>
                <td>RS 229.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Crispy Veg Salt And Pepper/269"><strong>Crispy Veg Salt And Pepper </strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Paneer Dry/319"><strong>Chilli Paneer Dry </strong></td>
                <td>RS 319.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Manchurian Dry/299"><strong>Manchurian Dry </strong></td>
                <td>RS 299.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg.Manchurian/269"><strong>Veg Manchurian</strong></td>
                <td>RS 269.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Chicken/349"><strong>Chilli Chicken </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Crispy Chicken Salt And Pepper/349"><strong>Crispy Chicken Salt And Pepper </strong></td>
                <td>RS 349.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Salt And Pepper Fish/449"><strong>Salt And Pepper Fish </strong></td>
                <td>RS 449.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lemon Fish/449"><strong>Lemon Fish </strong></td>
                <td>RS 449.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Finger/419"><strong>Fish Finger </strong></td>
                <td>RS 419.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                    <tr>
                  <th colspan="3" class="success"><u><i>Specialities Chinese</i></u></th>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Hakka Noodles/249"><strong>Hakka Noodles </strong></td>
                <td>RS 249.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Garlic Noodles/249"><strong>Chilli Garlic Noodles </strong></td>
                <td>RS 249.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fried Rice/249"><strong>Fried Rice</strong></td>
                <td>RS 249.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Manchurian Gravy/289"><strong>Manchurian Gravy </strong></td>
                <td>RS 289.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Chicken Gravy/399"><strong>Chilli Chicken Gravy </strong></td>
                <td>RS 399.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lamb In Hot Garlic Sauce/399"><strong>Lamb In Hot Garlic Sauce  </strong></td>
                <td>RS 399.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken/399"><strong>Chicken  </strong></td>
                <td>RS 399.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                </div>
              <tr><td colspan="2"><input type="button" class="btn btn-success" value="Click to go" onClick="show()"></td>
                <td colspan="2"><input type="reset" class="btn btn-warning" value="Reset"></td></tr>
              </table> 
            </DIV>
          </div>  
        </DIV>
         <div class="col-md-4">
        <div class="panel panel-default " id="panel1">
          <DIV class="panel-heading">Items Selected</DIV>
          <DIV class="panel-body">
            <table align="center">
              <tr><th style="width: 400px;">Items Chosen</th><th style="width:200px;">Price</th><th>Quantity</th></tr>
              <tr><td id="demo"></td><td id="demo0"></td><td id="demo3" style="margin-top:0px;"></td></tr>
              <tr><td id="demo1" colspan="2"></td></tr>
              <tr><td id="demo2" colspan="2"><br><input type="submit" class="btn btn-success" id="confirm" value="Click to Confirm" disabled></td></tr>
            </table>
          </form>
          </DIV>
        </div>
      </div>
      </div>
      </div>
    </DIV>
  </div>


    <footer class="site-footer">
  <div class="container">
    <div class="row">
        <div class="col-md-5">
          <h5>Contact Address</h5>
          <address>
            Thapar University<br>
            Patiala<br>
            India.
          </address>
        </div>
        <div class="col-md-4 col-md-offset-3">
            <h5>You Can Follow Us On:</h5>
                <a class="btn btn-default btn-sm" href="https://www.facebook.com/EatStreet-917820944964369/">
              <i class="fa fa-facebook fa-fw">
              </i>
              <span class="network-name">Facebook</span>
                </a>
                <a class="btn btn-primary btn-sm">
              <i class="fa fa-twitter fa-fw">
              </i>
              <span class="network-name">Twitter</span>
                </a>
                <a class="btn btn-danger btn-sm">
              <i class="fa fa-google fa-fw">
              </i>
              <span class="network-name">Google+</span>
                </a>
                </div>
    </div>
    <div class="bottom-footer">
        <div class="col-md-5"><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> CopyRight EatStreet 2015.</div>
        <div class="col-md-7">
          <ul class="footer-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><?php
                  
                  if(!isset($_SESSION['username']))
                  {
                    echo "<a href='login.php'>LOGIN</a>";  
                  }
                  else
                  {
                    echo "<h4 style='color:white;'>".$_SESSION['username']."</h4>";
                  }
                  ?></li>


          </ul>
        </div>
    </div>
    </div>    
</footer>
    <script src="js/jquery-1.11.3.min..js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
function show()
{
          var cb = document.forms['form1'].select.length;
          var l="";
          var l1="";
          var a=0;
          var q="";
          var sum=0;
          for (var j=0;j<cb; j++)
              {  
                if (document.forms['form1'].select[j].checked && document.forms['form1'].item[j].value>0)
                { 
                  var b=document.forms['form1'].select[j].value.split("/");
                  l+=b[0]+"<br/>";
                  l1+=b[1]+"<br/>";
                  document.getElementById('demo').innerHTML=l;
                  document.getElementById('demo0').innerHTML=l1;
                  a=document.forms['form1'].item[j].value;
                  sum=sum+(b[1]*a);
                  q=q+a+"<br/>";
                  document.getElementById('demo3').innerHTML=q;
                  document.getElementById("confirm").disabled=false;
                }
              }
              document.getElementById("demo1").innerHTML="Total price = "+sum;
}
    </script>
  </body>
</html>
