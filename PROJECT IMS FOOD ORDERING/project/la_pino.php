<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>La pinoz</title>
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
          <strong><h1 style="margin-top:40px">
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
             ?></h1></strong></div>
        <DIV class="col-md-4 no-margin no-padding">
              <img src="images/la_pino'z.jpg" style="margin-top:10px; height:150px; width:200px; z-index: -1;" class="img-responsive">
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
                  <th colspan="3" class="success"><u><i>Classic Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Personal</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Margherita/85"><strong> Margherita</strong></td>
                <td>RS 85.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Margherita/210"><strong> Margherita</strong></td>
                <td>RS 210.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Large</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Margherita/360"><strong> Margherita</strong></td>
                <td>RS 360.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>The Giant</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Margherita/620"><strong> Margherita</strong></td>
                <td>RS 620.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>The Monster</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Margherita/990"><strong> Margherita</strong></td>
                <td>RS 990.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Simply Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Personal</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Onion Blossoms/110"><strong> Onion Blossoms</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Crispy Veggies/110"><strong> Crispy Veggies</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Delight/110"><strong> Garden Delight</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Lovers Bite/110"><strong> Lovers Bite</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Onion Blossoms/260"><strong> Onion Blossoms</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Crispy Veggies/260"><strong> Crispy Veggies</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Delight/260"><strong> Garden Delight</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Lovers Bite/260"><strong> Lovers Bite</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Large</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Onion Blossoms/430"><strong> Onion Blossoms</strong></td>
                <td>RS 430.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Crispy Veggies/430"><strong> Crispy Veggies</strong></td>
                <td>RS 430.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Delight/430"><strong> Garden Delight</strong></td>
                <td>RS 430.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Lovers Bite/430"><strong> Lovers Bite</strong></td>
                <td>RS 430.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>The Giant</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Onion Blossoms/710"><strong> Onion Blossoms</strong></td>
                <td>RS 710.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Crispy Veggies/710"><strong> Crispy Veggies</strong></td>
                <td>RS 710.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Delight/710"><strong> Garden Delight</strong></td>
                <td>RS 710.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Lovers Bite/710"><strong> Lovers Bite</strong></td>
                <td>RS 710.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>The Monster</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Onion Blossoms/1150"><strong> Onion Blossoms</strong></td>
                <td>RS 1150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Crispy Veggies/1150"><strong> Crispy Veggies</strong></td>
                <td>RS 1150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Delight/1150"><strong> Garden Delight</strong></td>
                <td>RS 1150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Lovers Bite/1150"><strong> Lovers Bite</strong></td>
                <td>RS 1150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Premium Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Premium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spring Fling/130"><strong> Spring Fling</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Sweet Heat/130"><strong> Sweet Heat</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Spl/130"><strong> Garden Spl</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Veg Hawaiian/130"><strong> Veg Hawaiian</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Farm Villa/130"><strong> Farm Villa</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Burn To Hell/130"><strong> Burn To Hell</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spring Fling/310"><strong> Spring Fling</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Sweet Heat/310"><strong> Sweet Heat</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Spl/310"><strong> Garden Spl</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Veg Hawaiian/310"><strong> Veg Hawaiian</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Farm Villa/310"><strong> Farm Villa</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Burn To Hell/310"><strong> Burn To Hell</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Large</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spring Fling/490"><strong> Spring Fling</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Sweet Heat/490"><strong> Sweet Heat</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garden Spl/490"><strong> Garden Spl</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Veg Hawaiian/490"><strong> Veg Hawaiian</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Farm Villa/490"><strong> Farm Villa</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Burn To Hell/490"><strong> Burn To Hell</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Speciality Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Premium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="English Retreat/150"><strong> English Retreat</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garlic to Pizza/150"><strong> Garlic to Pizza</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Hot Passion/150"><strong> Hot Passion</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="La Pino'z Paneer/150"><strong> La Pino'z Paneer</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Mexican Salsa/150"><strong> Mexican Salsa</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="English Retreat/370"><strong> English Retreat</strong></td>
                <td>RS 370.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garlic to Pizza/370"><strong> Garlic to Pizza</strong></td>
                <td>RS 370.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Hot Passion/370"><strong> Hot Passion</strong></td>
                <td>RS 370.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="La Pino'z Paneer/370"><strong> La Pino'z Paneer</strong></td>
                <td>RS 370.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Mexican Salsa/370"><strong> Mexican Salsa</strong></td>
                <td>RS 370.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Premium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="English Retreat/540"><strong> English Retreat</strong></td>
                <td>RS 540.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Garlic to Pizza/540"><strong> Garlic to Pizza</strong></td>
                <td>RS 540.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Hot Passion/540"><strong> Hot Passion</strong></td>
                <td>RS 540.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="La Pino'z Paneer/540"><strong> La Pino'z Paneer</strong></td>
                <td>RS 540.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Mexican Salsa/540"><strong> Mexican Salsa</strong></td>
                <td>RS 540.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Classic Non Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Premium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Salaami/120"><strong> Chicken Salaami</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Salaami/290"><strong> Chicken Salaami</strong></td>
                <td>RS 290.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Large</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Salaami/460"><strong> Chicken Salaami</strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Simply Non Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Premium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Hawaaiian/150"><strong> Chicken Hawaiian</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="BBQ Chicken/150"><strong> BBQ Chicken</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Tandoori Chicken/150"><strong> Tandoori Chicken</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spicy Mexican/150"><strong> Spicy Mexican</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Hawaaiian/330"><strong> Chicken Hawaiian</strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="BBQ Chicken/330"><strong> BBQ Chicken</strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Tandoori Chicken/330"><strong> Tandoori Chicken</strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spicy Mexican/330"><strong> Spicy Mexican</strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Large</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Hawaaiian/480"><strong> Chicken Hawaiian</strong></td>
                <td>RS 480.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="BBQ Chicken/480"><strong> BBQ Chicken</strong></td>
                <td>RS 480.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Tandoori Chicken/480"><strong> Tandoori Chicken</strong></td>
                <td>RS 480.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spicy Mexican/480"><strong> Spicy Mexican</strong></td>
                <td>RS 480.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Premium Non Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Regular</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Butter Chicken/180"><strong> Butter Chicken</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Smoked Chicken/180"><strong> Smoked Chicken</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Mutton Meat Blast/180"><strong> Mutton Meat Blast</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Seekh Delight/180"><strong> Chicken Seekh Delight</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Butter Chicken/380"><strong> Butter Chicken</strong></td>
                <td>RS 380.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Smoked Chicken/380"><strong> Smoked Chicken</strong></td>
                <td>RS 380.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Mutton Meat Blast/380"><strong> Mutton Meat Blast</strong></td>
                <td>RS 380.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Seekh Delight/380"><strong> Chicken Seekh Delight</strong></td>
                <td>RS 380.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                  <th colspan="3" class="warning"><u><i>Large</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Butter Chicken/510"><strong> Butter Chicken</strong></td>
                <td>RS 510.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Smoked Chicken/510"><strong> Smoked Chicken</strong></td>
                <td>RS 510.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Mutton Meat Blast/510"><strong> Mutton Meat Blast</strong></td>
                <td>RS 510.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Seekh Delight/510"><strong> Chicken Seekh Delight</strong></td>
                <td>RS 510.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Speciality Non Veg</i></u></th>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Premium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Fire E Chicken/170"><strong> Fire E Chicken</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Little Italy/170"><strong> Little Italy</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Exotica/170"><strong> Chicken Exotica</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Meat Blast/170"><strong> Meat Blast</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="California Chicken/170"><strong> California Chicken</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spanish Sizzle/170"><strong> Spanish Sizzle</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Medium</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Fire E Chicken/410"><strong> Fire E Chicken</strong></td>
                <td>RS 410.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Little Italy/410"><strong> Little Italy</strong></td>
                <td>RS 410.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Exotica/410"><strong> Chicken Exotica</strong></td>
                <td>RS 410.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Meat Blast/410"><strong> Meat Blast</strong></td>
                <td>RS 410.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="California Chicken/410"><strong> California Chicken</strong></td>
                <td>RS 410.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spanish Sizzle/410"><strong> Spanish Sizzle</strong></td>
                <td>RS 410.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="warning"><u><i>Large</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Fire E Chicken/560"><strong> Fire E Chicken</strong></td>
                <td>RS 560.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Little Italy/560"><strong> Little Italy</strong></td>
                <td>RS 560.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Chicken Exotica/560"><strong> Chicken Exotica</strong></td>
                <td>RS 560.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Meat Blast/560"><strong> Meat Blast</strong></td>
                <td>RS 560.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="California Chicken/560"><strong> California Chicken</strong></td>
                <td>RS 560.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select[]" name="select[]" value="Spanish Sizzle/560"><strong> Spanish Sizzle</strong></td>
                <td>RS 560.00</td>
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
    <script src="js/jquery.js"></script>
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