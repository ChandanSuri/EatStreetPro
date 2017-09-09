<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ignite</title>
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
<!--End of Navigation Bar-->
<!--Start Of Main Webpage Content-->
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
              <img src="images/ignite.jpg" style="margin-top:10px; height:150px; width:200px; z-index: -1;" class="img-responsive">
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
                  <th colspan="3" class="success"><u><i>Sea Food</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Tikka/300"><strong> Fish Tikka</strong></td>
                <td>RS 300.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Tikka Kali Mirch/320"><strong> Fish Tikka Kali Mirch</strong></td>
                <td>RS 320.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Amritsari Fried/310"><strong> Fish Amritsari Fried</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Orley Fried/300"><strong> Fish Orley Fried</strong></td>
                <td>RS 300.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilly Fish/280"><strong> Chilly Fish</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lemon Fish/280"><strong> Lemon Fish</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                


                <tr>
                  <th colspan="3" class="success"><u><i>Tandoor se Boneless</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tikka/180"><strong> Chicken Tikka</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Malai Tikka/200"><strong> Chicken Malai Tikka</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Kali Mirch Tikka/200"><strong> Chicken Kali Mirch Tikka</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Achari Tikka/200"><strong> Chicken Achari Tikka</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Lasooni Tikka/200"><strong> Chicken Lasooni Tikka</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Reshami Kabab/250"><strong> Chicken Reshami Kabab</strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Seekh Kabab/190"><strong> Chicken Seekh Kabab</strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Seekh Kabab/220"><strong> Mutton Seekh Kabab</strong></td>
                <td>RS 220.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                  <th colspan="3" class="success"><u><i>Tandoor se with Bone</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Chicken/290"><strong> Tandoori Chicken</strong></td>
                <td>RS 290.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Tandoori Chicken/310"><strong> Butter Tandoori Chicken</strong></td>
                <td>RS 3110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Afghani Chicken/320"><strong> Afghani Chicken</strong></td>
                <td>RS 320.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kalmi Kabab/230"><strong> Kalmi Kabab</strong></td>
                <td>RS 230.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Malai Tangri/230"><strong> Chicken Malai Tangri</strong></td>
                <td>RS 230.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken teekhi Mirch/300"><strong> Chicken teekhi Mirch</strong></td>
                <td>RS 300.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Pakora/320"><strong> Chicken Pakora</strong></td>
                <td>RS 320.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tandoori se Vegetarian</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka/160"><strong> Paneer Tikka</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka kali mirch/170"><strong> Paneer Tikka kali mirch</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka Teekhi mirch/170"><strong> Paneer Tikka Teekhi mirch</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka Achari/170"><strong> Paneer Tikka Achari</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Malai Tikka/180"><strong> Paneer Malai Tikka</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Duplex/160"><strong> Mushroom Duplex</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Malai Tikka/180"><strong> Mushroom Malai Tikka</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tikka/110"><strong> Soya Tikka</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tikka kali mirch/120"><strong> Soya Tikka kali mirch</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tikka teekhi mirch/120"><strong> Soya Tikka teekhi mirch</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tikka achari/120"><strong> Soya Tikka achari</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Malai Tikka/130"><strong> Soya Malai Tikka</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tangri Stuffed/140"><strong> Soya Tangri Stuffed</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Afghani Tangri Stuffed/160"><strong> Soya Afghani Tangri Stuffed</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Kadhai Se</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kabab Spl/190"><strong> Kabab Spl</strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Palak Dahi Ke Kabab Spl/190"><strong> Palak Dahi Ke Kabab Spl</strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tikka Sharabiyan Da</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tikka/250"><strong> Chicken Tikka</strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Seekh/250"><strong> Chicken Seekh</strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Tikka/280"><strong> Mutton Tikka</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tikka/210"><strong> Soya Tikka</strong></td>
                <td>RS 210.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tawa Items</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tikka Masala/260"><strong> Chicken Tikka Masala </strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Seekh Masala/260"><strong> Chicken Seekh Masala</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Seekh Masala/290"><strong> Mutton Seekh Masala</strong></td>
                <td>RS 290.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tikka Masala/210"><strong> soya Tikka Masala</strong></td>
                <td>RS 210.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tawa Chicken/510"><strong> Tawa Chicken</strong></td>
                <td>RS 510.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr><th colspan="3" class="success"><u><i>Main Course Non Veg</i></u></th></tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Chicken/490"><strong> Butter Chicken</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Curry/440"><strong> Chicken Curry</strong></td>
                <td>RS 440.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Karahi Chicken/460"><strong> Karahi Chicken</strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Kali Mirch/470"><strong> Chicken Kali Mirch</strong></td>
                <td>RS 470.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Lababdar/490"><strong> Chicken Lababdar</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Raara Chicken/510"><strong> Raara Chicken</strong></td>
                <td>RS 510.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Meethi Malai/490"><strong> Chicken Meethi Malai</strong></td>
                <td>RS 490.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Matki Chicken/560"><strong> Matki Chicken</strong></td>
                <td>RS 560.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Rogan Josh/250"><strong> Mutton Rogan Josh</strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Rara/310"><strong> Mutton Rara</strong></td>
                <td>RS 310.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Saag Meat/270"><strong> Saag Meat</strong></td>
                <td>RS 270.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Bhuna Ghosht/280"><strong> Bhuna Ghosht</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Curry/120"><strong> Egg Curry</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr><th colspan="3" class="success"><i>Main Course Veg</i></u></th></tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Ghaar Ki Daal/90"><strong> Ghaar Ki Daal</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Daal Makhani/120"><strong> Daal Makhani</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Butter Masala/180"><strong> Paneer Butter Masala</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Patiala Shahi Paneer/180"><strong> Patiala Shahi Paneer</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Karahi Paneer/160"><strong> Karahi Paneer</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Lababdar/200"><strong> Paneer Lababdar</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka Masala/180"><strong> Paneer Tikka Masala</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Palak Paneer/170"><strong> Palak Paneer</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mix Veg/140"><strong> Mix Veg</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Matar/170"><strong> Mushroom Matar</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Malai Kofta/180"><strong> Malai Kofta</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Masala/190"><strong> Mushroom Masala</strong></td>
                <td>RS 190.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr><th colspan="3" class="success"><u><i>Rice Biryani</i></u></th></tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Biryani with Gravy/180"><strong> Chicken Biryani with Gravy</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Biryani with Gravy/250"><strong> Mutton Biryani with Gravy</strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Biryani with Gravy/160"><strong> Egg Biryani with Gravy</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Biryani with Gravy/150"><strong> Veg Biryani with Gravy</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain Rice/80"><strong> Plain Rice</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr><th colspan="3" class="success"><u><i>Breads</i></u></th></tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Roti/8"><strong> Tandoori Roti</strong></td>
                <td>RS 8.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Roti/12"><strong> Butter Roti</strong></td>
                <td>RS 12.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Roomali Roti/10"><strong> Roomali Roti</strong></td>
                <td>RS 10.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lachha Prantha/25"><strong> Lachha Prantha</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pudina Prantha/30"><strong> Pudina Prantha</strong></td>
                <td>RS 30.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Red Chilly Prantha/25"><strong> Red Chilli Prantha</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain Naan/25"><strong> Plain Naan</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Naan/30"><strong> Butter Naan</strong></td>
                <td>RS 30.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Garlic Naan/35"><strong> Garlic Naan</strong></td>
                <td>RS 35.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Kulcha/40"><strong> Onion Kulcha</strong></td>
                <td>RS 40.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Keema Naan With Gravy/120"><strong> Keema Naan With Gravy</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr><th colspan="3" class="success"><u><i>Rolls</i></u></th></tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tikka Roll/120"><strong> Chicken Tikka Roll</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Seekh Roll/140"><strong> Chicken Seekh Roll</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Seekh Roll/160"><strong> Mutton Seekh Roll</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Malai Tikka Roll/140"><strong> Chicken Malai Tikka Roll</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Tikka Roll/110"><strong> Paneer Tikka Roll</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Soya Tikka Roll/110"><strong> Soya Tikka Roll</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr><th colspan="3" class="success"><u><i>Soups</i></u></th></tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cream of Tomato/70"><strong> Cream of Tomato</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>

                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Clear Soup/60"><strong> Clear Soup</strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sweet Corn Soup/70"><strong> Sweet Corn Soup</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Hot and Sour/80"><strong> Hot and Sour</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Manchow Soup/80"><strong> Manchow Soup</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Talumein Soup/80"><strong> Talumein Soup</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lemon Coriander Soup/80"><strong> Lemon Coriander Soup</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="succcess"><u><i>Momos and Spring Rolls</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Momos/110"><strong> Veg Momos</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Momos/130"><strong> Chicken Momos</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Tandoori Momos/120"><strong> Veg Tandoori Momos</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tandoori Momos/150"><strong> Chicken Tandoori Momos</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Momos with Honey Chilly Toss/130"><strong> Veg Momos with Honey Chilly Toss</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Momos with Honey Chilly Toss/160"><strong> Chicken Momos with Honey Chilly Toss</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Spring Rolls with Crispy Salad/100"><strong> Veg Spring Rolls with Crispy Salad</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Spring Rolls with Crispy Salad/130"><strong> Chicken Spring Rolls with Crispy Salad</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Tandoori Spring Rolls/120"><strong> Veg Tandoori Spring Rolls</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tandoori Spring Rolls/150"><strong> Chicken Tandoori Spring Rolls</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="succcess"><u><i>Non-Veg Starters</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilly Chicken/200"><strong> Chilly Chicken</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Garlic Chicken/200"><strong> Garlic Chicken</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Ginger Chicken/200"><strong> Ginger Chicken</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lemon Chicken/200"><strong> Lemon Chicken</strong></td>
                <td>RS 200.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sesame Chicken/210"><strong> Sesame Chicken</strong></td>
                <td>RS 210.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Drums Of Heaven/210"><strong> Drums of Heaven</strong></td>
                <td>RS 210.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Salt n Pepper/220"><strong> Chicken Salt n Pepper</strong></td>
                <td>RS 220.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Crispy Chicken with Honey Chilly Toss/220"><strong> Crispy Chicken with Honey Chilly Toss</strong></td>
                <td>RS 220.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Manchurian/220"><strong> Chicken Manchurian</strong></td>
                <td>RS 220.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="succcess"><u><i>Veg Starters</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Crispy Salt n Papper/160"><strong> Crispy Salt n Pepper</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilly Paneer/150"><strong> Chilly Paneer</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilly Mushroom/150"><strong> Chilly Mushroom</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sesame Soya/150"><strong> Sesame Soya</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilly Soya/140"><strong> Chilly Soya</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Manchurian/140"><strong> Veg Manchurian</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Saute/140"><strong> Veg Saute</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Honey Chilly Potato/130"><strong> Honey Chilly Potato</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr><th colspan="3" class="success"><u><i>Rice and Noodles</i></u></th></tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Fried Rice/90"><strong> Veg Fried Rice</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Non Veg Fried Rice/120"><strong> Non Veg Fried Rice</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Fried Rice/110"><strong> Egg Fried Rice</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mixed Fried Rice/140"><strong> Mixed Fried Rice</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese Garlic Rice/100"><strong> Cheese Garlic Rice</strong></td>
                <td>RS 10.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Hakka Noodles veg/90"><strong> Hakka Noodles veg</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Hakka Noodles non veg/120"><strong> Hakka Noodles non veg</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Noodles/110"><strong> Egg Noodles</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mixed Hakka Noodles/140"><strong> Mixed Hakka Noodles</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Chopsey/130"><strong> Veg Chopsey</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Chopsey/160"><strong> Chicken Chopsey</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="American Chopsey/180"><strong> American Chopsey</strong></td>
                <td>RS 180.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chinese Veg Chopsey/130"><strong> Chinese Veg Chopsey</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chinese Non Veg Chopsey/160"><strong> Chinese Non Veg Chopsey</strong></td>
                <td>RS 160.00</td>
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
        <div class="panel panel-default" id="panel1">
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
<!--End of Main Webpage Content-->
<!--Start Of Footer-->

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
