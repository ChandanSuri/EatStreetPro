<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shree Rathnam</title>
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
          <strong><p style="margin-top:40px"><?php
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
             ?></strong></div>
        <DIV class="col-md-4  no-padding">
              <img src="images/shree_rathnam.jpg" style=" margin-top:10px; height:150px; width:200px; z-index: -1;" class="img-responsive">
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
              <form method="post" action="order_confirmation.php?rest_id=<?php echo $_SESSION['rest_id']; ?>&categ_id=<?php echo $_SESSION['categ_id']; ?>" role="form" id="form1" class="form-horizontal">
              <div class="form-group">
                <tr>
                  <th colspan="3" class="success"><u><i>Veg Fixed Thali </i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lunch/Dinner/220"><strong> Lunch/Dinner  </strong></td>
                <td>RS 220.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Uthapams</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain/105"><strong> Plain  </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion/120"><strong>Onion  </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tomato/125"><strong> Tomato </strong></td>
                <td>RS 125.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Vegetable/125"><strong> Vegetable  </strong></td>
                <td>RS 125.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Coconut/135"><strong> Coconut  </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Mixed/135"><strong> Mixed  </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tomato Onion/135"><strong> Tomato Onion </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tomato Coconut/135"><strong> Tomato Coconut </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer/158"><strong> Paneer  </strong></td>
                <td>RS 158.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                  <th colspan="3" class="success"><u><i>Tandoor Se</i></u></th>
                </tr>
               
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Tandoori Salad/120"><strong>Tandoori Salad </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Kabab/120"><strong> Veg Kabab  </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka/160"><strong> Paneer Tikka </strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Shashlik/160"><strong> Paneer Shashlik </strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Aloo/140"><strong> Tandoori Aloo </strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                  <th colspan="3" class="success"><u><i>Soups</i></u></th>
                </tr>
               
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tomato/100"><strong> Tomato </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sweet Corn/110"><strong>Sweet Corn  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Hot Sour Veg/110"><strong> Hot Sour Veg  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Soup/120"><strong> Mushroom Soup  </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mix Veg Soup/120"><strong> Mix Veg Soup </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Manchow Soup/115"><strong>Veg Manchow Soup </strong></td>
                <td>RS 115.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Talumein Soup/120"><strong> Veg Talumein Soup </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Clear Veg/110"><strong> Clear Veg  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Salad Bar</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Green/90"><strong> Green 90</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Raita(Mix)/110"><strong> Raita(Mix)  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Boondi Raita/110"><strong> Boondi Raita </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pineapple Raita/110"><strong>Pineapple Raita </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Papad/40"><strong> Papad  </strong></td>
                <td>RS 40.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Masala Papad/40"><strong> Masala Papad </strong></td>
                <td>RS 40.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Other</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Coconut Rice/110"><strong> Coconut Rice </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lemon Rice/110"><strong> Lemon Rice  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Puliyogare/110"><strong> Puliyogare  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Curd Rice/110"><strong> Curd Rice </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Roti Ki Tokri</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Roti/20"><strong> Tandoori Roti  </strong></td>
                <td>RS 20.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Roti/25"><strong>Butter Roti  </strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Naan/45"><strong> Naan  </strong></td>
                <td>RS 45.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Naan/55"><strong> Butter Naan  </strong></td>
                <td>RS 55.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Stuffed Naan/60"><strong> Stuffed Naan  </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Parantha/60"><strong> Parantha  </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lachha Parantha/60"><strong>Lachha Parantha  </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pudhina Paratha/60"><strong> Pudhina Paratha </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Kulcha/60"><strong> Aloo Kulcha  </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Kulcha/60"><strong> Onion Kulcha </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
              <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese Kulcha/70"><strong> Cheese Kulcha </strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Khasta Roti/60"><strong> Khasta Roti  </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
              
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Missi Roti/60"><strong> Missi Roti </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                  <tr>
                  <th colspan="3" class="success"><u><i>Rice</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fried Rice/140"><strong> Fried Rice  </strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Schezwan Fried Rice/160"><strong>Schezwan Fried Rice </strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Singapore Fried Rice/170"><strong> Singapore Fried Rice </strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Fried Rice/170"><strong>Mushroom Fried Rice  </strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Noodles</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Shree Rathnam Spl. Chowmein/190"><strong> Shree Rathnam Spl. Chowmein  </strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Hakka Noodles/170"><strong> Veg Hakka Noodles  </strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Schezwan Noodles/170"><strong> Veg Schezwan Noodles </strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Singapore Noodles/170"><strong> Veg Singapore Noodles </strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Crispy Veg Noodles/160"><strong> Crispy Veg Noodles  </strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Chowmein/150"><strong> Veg Chowmein </strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Garlic Chilly Chowmein/165"><strong> Garlic Chilly Chowmein   </strong></td>
                <td>RS 165.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Choupsey/170"><strong> Veg Choupsey  </strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Dosa</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain/100"><strong> Plain  </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Masala/120"><strong> Masala   </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Plain/125"><strong>Butter Plain   </strong></td>
                <td>RS 125.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Masala/135"><strong> Butter Masala </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Rava Plain/120"><strong>Rava Plain  </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Rava Masala/130"><strong> Rava Masala </strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Rava Plain/125"><strong> Onion Rava Plain </strong></td>
                <td>RS 125.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Rava Masala/130"><strong>Onion Rava Masala </strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Coconut Rava Masala/148"><strong> Coconut Rava Masala  </strong></td>
                <td>RS 148.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Coconut Rava Plain/135"><strong> Coconut Rava Plain</strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Rava Plain/135"><strong> Veg Rava Plain  </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Rava Masala/148"><strong> Veg Rava Masala  </strong></td>
                <td>RS 148.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paper Plain/125"><strong> Paper Plain  </strong></td>
                <td>RS 125.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paper Masala/135"><strong> Paper Masala </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Dosa Plain/125"><strong> Onion Dosa Plain </strong></td>
                <td>RS 125.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Onion Dosa Masala/135"><strong>  Onion Dosa Masala </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Mysore Plain/125"><strong>Mysore Plain  </strong></td>
                <td>RS 125.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Mysore Masala/148"><strong>  Mysore Masala  </strong></td>
                <td>RS 148.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Set Dosa/135"><strong>Set Dosa   </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Ghee Roast Plain/135"><strong>  Ghee Roast Plain  </strong></td>
                <td>RS 135.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Ghee Roast Masala/148"><strong> Ghee Roast Masala  </strong></td>
                <td>RS 148.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Dosa/160"><strong> Paneer Dosa  </strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Aap-Ki-Pasand</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Shree Rathnam spl/250"><strong>Shree Rathnam spl </strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Malai Kofta/225"><strong> Malai Kofta  </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Shahi Paneer/225"><strong> Shahi Paneer  </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lali Paneer/225"><strong> Lali Paneer  </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Butter Masala/225"><strong> Paneer Butter Masala  </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kadhai Paneer/250"><strong> Kadhai Paneer </strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Labadar/225"><strong> Paneer Labadar </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Saag Paneer/225"><strong> Saag Paneer </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka Masala/250"><strong> Paneer Tikka Masala </strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Methi Malai/225"><strong> Paneer Methi Malai  </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Korma/225"><strong> Paneer Korma </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Angoori Kofta/225"><strong> Angoori Kofta </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Makhani/175"><strong> Dal Makhani </strong></td>
                <td>RS 175.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Fry/175"><strong> Dal Fry </strong></td>
                <td>RS 175.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dal Gharwali/175"><strong> Dal Gharwali  </strong></td>
                <td>RS 175.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kashmiri Kofta/225"><strong> Kashmiri Kofta </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Palak Kofta/215"><strong> Palak Kofta  </strong></td>
                <td>RS 215.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Navratna Korma/225"><strong> Navratna Korma  </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutter Mushroom/215"><strong>Mutter Mushroom </strong></td>
                <td>RS 215.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Masala/225"><strong>Mushroom Masala </strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Capsicum/225"><strong>Mushroom Capsicum</strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Do Pyaza/225"><strong> Mushroom Do Pyaza</strong></td>
                <td>RS 225.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Stuffed Capsicum/200"><strong>Stuffed Capsicum  </strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dum Aloo/190"><strong>Dum Aloo </strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Jeera Aloo/190"><strong>Jeera Aloo  </strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mix Vegetabes/190"><strong>Mix Vegetabes </strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
            
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Gobhi Masala/190"><strong>Gobhi Masala  </strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Bhindi Masala/190"><strong>Bhindi Masala </strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chana Masala/200"><strong>Chana Masala  </strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>South Indian Snacks</i></u></th>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Upma/80"><strong>Upma </strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Rice Idli/80"><strong>Rice Idli </strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Rava Idli/105"><strong>Rava Idli  </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Rasam Idli/100"><strong>Rasam Idli   </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dahi Idli/105"><strong>Dahi Idli  </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Vada/100"><strong>Vada </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Dahi Vada/105"><strong>Dahi Vada </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Rasam Vada/105"><strong>Rasam Vada  </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Masala Vada/105"><strong>Masala Vada  </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Vada/105"><strong>Onion Vada </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Bonda/100"><strong>Aloo Bonda  </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Puri Bhaji/110"><strong>Puri Bhaji  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>North Indian Snacks</i></u></th>
                </tr>
                
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pakora/110"><strong>Pakora   </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese Pakora/120"><strong>Cheese Pakora  </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Assorted Pakora/110"><strong>Assorted Pakora  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese Cutlet/115"><strong>Cheese Cutlet </strong></td>
                <td>RS 115.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Cutlet/105"><strong>Veg Cutlet </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Sandwich/100"><strong>Veg Sandwich  </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Club Sandwich/110"><strong>Veg Club Sandwich  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Finger Chips/100"><strong>Finger Chips </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Burger/95"><strong>Veg Burger  </strong></td>
                <td>RS 95.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese Burger/110"><strong>Cheese Burger  </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Chinese Snacks</i></u></th>
                </tr>
                
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Finger Schezwan/200"><strong>Paneer Finger Schezwan  </strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Manchurian/185"><strong>Paneer Manchurian </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Chilly/185"><strong>Paneer Chilly  </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                   
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Baby Corn Chilly/185"><strong>Baby Corn Chilly  </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Baby Corn Manchurian/185"><strong>Baby Corn Manchurian </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Chilly Gravy/185"><strong>Mushroom Chilly Gravy </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Manchurian/185"><strong>Mushroom Manchurian  </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Pepper Fry/185"><strong>Mushroom Pepper Fry  </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Manchurian/185"><strong>Veg Manchurian  </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Gobhi Manchurian/185"><strong>Gobhi Manchurian  </strong></td>
                <td>RS 185.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Spring Roll/185"><strong>Veg Spring Roll</strong></td>
                <td>RS 185.00</td>
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
