<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lazeez</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!--<link href="css/bootstrap.css" rel="stylesheet">-->
<link href="font_awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<link href="css/style1.css" rel="stylesheet">

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
              <img src="images/lazeez.jpg" style=" margin-top:10px; height:150px; width:200px z-index: -1;" class="img-responsive">
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
                  <th colspan="3" class="success"><u><i>Gobhi-E-Lazeez</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo
                Gobhi/80"><strong> Aloo Gobhi</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Gobhi Butter Masala/90"><strong> Gobhi Butter Masala</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Gobhi Kaju Korma/90"><strong>Gobhi Kaju Korma</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Subz-E-Lazeez</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Zeera/70"><strong> Aloo Zeera</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Palak/70"><strong> Aloo Palak</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mix Vegetable/70"><strong> Mix Vegetable</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Navratan Korma/90"><strong> Navratan Korma</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutter Makhane/90"><strong> Mutter Makhane</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Matter/90"><strong> Mushroom Matter</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mushroom Paneer/100"><strong> Mushroom Paneer</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Mushroom Masala/90"><strong>Mushroom Masala</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Chawal Khazana</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Zeera Pulao/60"><strong> Zeera Pulao</strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Pulao/60"><strong> Veg Pulao</strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Peas Pulao/60"><strong> Peas Pulao</strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Navratna Pulao/70"><strong> Navratan Pulao</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Biryani/80"><strong> Veg Biryani</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain Rice/50"><strong>Plain Rice</strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Hydrabadi Biryani/90"><strong> Veg Hydrabadi Biryani</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Non-Veg Hydrabadi Biryani/130"><strong> Non-Veg Hydrabadi Biryani</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Biryani(with gravy)/130"><strong> Chicken Biryani(with gravy)</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Biryani/140"><strong>Mutton Biryani</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Salad</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Green Salad/50"><strong> Green Salad</strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kuchmer Salad/60"><strong> Kuchmer Salad</strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Chat/70"><strong> Aloo Chat</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Curd And Raita</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Boondi Raita/45"><strong> Boondi Raita</strong></td>
                <td>RS 45.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Raita/45"><strong> Aloo Raita</strong></td>
                <td>RS 45.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cucumber Raita/45"><strong>Cucumber Raita</strong></td>
                <td>RS 45.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Jeera Raita/45"><strong> Jeera Raita</strong></td>
                <td>RS 45.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mix Raita/45"><strong> Mix Raita</strong></td>
                <td>RS 45.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain Curd/35"><strong> Plain Curd</strong></td>
                <td>RS 35.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tandoori Roti & Nan</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Roti/4"><strong> Tandoori Roti</strong></td>
                <td>RS 4.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Roomali Roti/5"><strong> Roomali Roti </strong></td>
                <td>RS 5.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Tandoori Roti/6"><strong> Butter Tandoori Roti</strong></td>
                <td>RS 6.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Nan/18"><strong> Butter Nan</strong></td>
                <td>RS 18.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Plain Nan/15"><strong>Plain Nan</strong></td>
                <td>RS 15.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Missi Roti/15"><strong> Missi Roti</strong></td>
                <td>RS 15.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Aloo Paratha/15"><strong> Aloo Paratha</strong></td>
                <td>RS 15.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pudina Paratha/15"><strong> Pudina Paratha</strong></td>
                <td>RS 15.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lacha Paratha/15"><strong> Lacha Paratha</strong></td>
                <td>RS 15.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Stuffed Paratha/20"><strong> Stuffed Paratha</strong></td>
                <td>RS 20.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Paratha/25"><strong> Paneer Paratha</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Stuffed Nan/25"><strong> Stuffed Nan</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Amritsari Kulcha/25"><strong> Amritsari Kulcha</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Onion Kulcha/25"><strong> Onion Kulcha</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Garlic Nan/25"><strong> Garlic Nan</strong></td>
                <td>RS 25.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Keema Nan/40"><strong> Keema Nan</strong></td>
                <td>RS 40.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                  <tr>
                  <th colspan="3" class="success"><u><i>Lazeez Special Lunch Thali</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Lazeez Thali Veg/100"><strong> Lazzez Thali Veg</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Deluxe Thali(Non Veg.)/120"><strong> Deluxe Thali(Non Veg.)</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Tandoori Nazrana</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tandoori Chicken/150"><strong> Tandoori Chicken</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Afghani Chicken/170"><strong>Afghani Chicken</strong></td>
                <td>RS 170.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken tangri/100"><strong> Chicken tangri</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken tangri Stuffed/120"><strong> Chicken tangri Stuffed</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tikka/100"><strong> Chicken Tikka</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Malai Tikka/110"><strong> Chicken Malai Tikka</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Achari Tikka /120"><strong> Chicken Achari Tikka</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Reshami Kabab/130"><strong> Chicken Reshami Kabab </strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Seekh Kabab/60"><strong> Chicken Seekh Kabab </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Seekh Kabab /50"><strong> Mutton Seekh Kabab </strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Tikka/120"><strong> Mutton Tikka</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Barra/120"><strong> Muttonn Barra </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Tikka/150"><strong> Fish Tikka</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Rolls</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Kathi Roll/100"><strong> Mutton Kathi Roll</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Kathi Roll/100"><strong> Chicken Kathi Roll</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Kathi Roll/80"><strong> Paneer Kathi Roll</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Tikka Roll/100"><strong> Chicken Tikka Roll</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Seekh Roll/60"><strong> Mutton Seekh Roll</strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Seekh Roll/70"><strong> Chicken Seekh Roll</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Handi Se(Chicken)</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Chicken(Boneless)/280"><strong> Butter Chicken(Boneless)</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kadai Chicken(Boneless)/280"><strong> Kadai Chicken(Boneless)</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Butter Chicken/260"><strong> Butter Chicken</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kadai Chicken/260"><strong> Kadai Chicken</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Handi Chicken/280"><strong> Handi Chicken</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tawa Chicken/250"><strong> Tawa Chicken</strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chicken Achari/270"><strong>  Chicken Achari</strong></td>
                <td>RS 270.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chicken Kali Mirch/280"><strong>  Chicken Kali Mirch</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chicken Curry/250"><strong>  Chicken Curry</strong></td>
                <td>RS 250.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Patiala Chicken/280"><strong>Patiala  Chicken </strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chicken Hyderabadi/280"><strong>  Chicken Hyderabadi</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chilli Chicken(dry)/260"><strong> Chilli Chicken(dry)</strong></td>
                <td>RS 260.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Chicken(Gravy)/280"><strong> Chilli Chicken(Gravy)</strong></td>
                <td>RS 280.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Chicken Plate Se</i></u></th>
                </tr>

                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chicken Curry/90"><strong>  Chicken Curry</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken korma/100"><strong> Chicken korma </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Masala/100"><strong> Chicken Masala </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Do Pyaza/100"><strong> Chicken Do Pyaza</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Rara/100"><strong> Chicken Rara</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Lemone/100"><strong> Chicken Lemone</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Methi Wala/100"><strong> Chicken Methi wala</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Kalkali Mirchi/100"><strong> Chicken Kalkali Mirchi</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Mughlai/100"><strong> Chicken Mughlai</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Mutton Plate Se</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Curry/110"><strong> Mutton Curry </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Rogan Josh/110"><strong> Mutton Rogan Josh</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Masala/110"><strong> Mutton Masala</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Kadai/110"><strong> Mutton Kadai</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Keema/100"><strong> Mutton Keeema</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Korma Boneless/120"><strong> Mutton Korma Boneless</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Bhoona ghst/120"><strong> Mutton Korma Ghst</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Rara/120"><strong> Mutton Korma Rara</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutton Pyaza/120"><strong> Mutton Korma Pyaza</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Paneer-E-Lazeez</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Shahi Paneer/90"><strong>Shahi Paneer</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mutter Paneer/90"><strong>Mutter Paneer</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Kadai Paneer/90"><strong>Kadai Paneer</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Palak Paneer/90"><strong> Palak Paneer</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Korma/100"><strong>Paneer Korma</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Malai Kofta/90"><strong>Malai Kofta</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Handi Paneer/100"><strong>Handi Paneer</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Do Pyaza/100"><strong>Paneer Do Pyaza</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Soups</i></u></th>
                </tr>
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Paneer Bujiya/100"><strong>Paneer Bujiya</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese Kofta/100"><strong>Cheese Kofta</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spl. Paneer Tikka Masala/110"><strong>Spl. Paneer Tikka Masala</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Tomato Soup/Egg Drop/50"><strong>Tomato Soup/Egg Drop </strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Noodle Soup/50"><strong>Noodle Soup</strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sweet Corn Soup/50"><strong>Sweet Corn Soup</strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Hot And Sour Soup/50"><strong>Hot And Sour Soup </strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Manchow Soup/50"><strong>Manchow Soup </strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Talumein Soup/50"><strong>Talumein Soup</strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Clear Soup/50"><strong>Clear Soup</strong></td>
                <td>RS 50.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Appetisers</i></u></th>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Momos (N.Veg)/90"><strong>Momos (N.veg)</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Momos (Veg)/60"><strong>Momos (Veg) </strong></td>
                <td>RS 60.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spring Roll(Veg)/70"><strong>Spring Roll(Veg)</strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spring Roll(N.Veg)/90"><strong>Spring Roll(N.Veg)</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Paneer/100"><strong>Chilli Paneer</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Manchurian Dry(N.Veg)/130"><strong>Manchurian Dry(N.Veg) </strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Manchurian DryVeg)/90"><strong>Manchurian Dry(Veg) </strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Patotoes/80"><strong>Chilli Patotoes </strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Chicken Dry/140"><strong>Chilli Chicken Dry</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Drums of Heaven/120"><strong>Drums of Heaven</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Shredded Chicken/160"><strong>Shredded Chicken</strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Main Course Veg. (Cai)</i></u></th>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Gobhi/100"><strong>Chilli Gobhi</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg.Manchurian/90"><strong>Veg Manchurian</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Paneer/100"><strong>Chilli Paneer</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Mushroom/100"><strong>Chilli Mushroom</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Vegetable in Garlic Sauce/80"><strong>Vegetable in Garlic Sauce</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sweet And Sour Veg./140"><strong>Sweet And Sour Veg.</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Soya/160"><strong>Chilli Soya </strong></td>
                <td>RS 160.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                    <tr>
                  <th colspan="3" class="success"><u><i>Main Course N.Veg. (Cai)</i></u></th>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Manchrian/130"><strong>Chicken Manchrian </strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Chicken/140"><strong>Chilli Chicken </strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Chicken (with bone)/140"><strong>Chilli Chicken (with bone)</strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Sweet And Sour Chicken/140"><strong>Sweet And Sour Chicken </strong></td>
                <td>RS 140.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Garlic Chicken/150"><strong>Garlic Chicken</strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Singapore Style/150"><strong>Chicken Singapore Style </strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken In Hot Garlic Sauce/150"><strong>Chicken In Hot Garlic Sauce </strong></td>
                <td>RS 150.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Egg And Fish</i></u></th>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Curry/80"><strong>Egg Curry</strong></td>
                <td>RS 80.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fish Curry/120"><strong>Fish Curry</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Fried Rice Veg </i></u></th>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Fried Rice/90"><strong>Veg Fried Rice</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Singapore Fried Rice/100"><strong>Veg Singapore Fried Rice </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Garlic Veg. Fried Rice/100"><strong>Chilli Garlic Veg. Fried Rice </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-con10rol item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Fried Rice Non Veg </i></u></th>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Fried Rice/110"><strong>Chicken Fried Rice </strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mix Fried Rice/130"><strong>Mix Fried Rice</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Fried Rice/100"><strong>Egg Fried Rice</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Singapore Chicken F.Rice/120"><strong>Singapore Chicken F.Rice </strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Garlic Chicken F.Rice/120"><strong>Chilli Garlic Chicken F.Rice</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Veg Noodles</i></u></th>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Noodles/70"><strong>Veg Noodles </strong></td>
                <td>RS 70.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Garlic Veg Noodles/90"><strong>Chilli Garlic Veg Noodles 90</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Singapore Noodles/90"><strong>Veg Singapore Noodles</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg Hakka Noodles/90"><strong>Veg Hakka Noodles</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Noodles/100"><strong>Chicken Noodles</strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chilli Garlic Chicken Noodles/110"><strong>Chilli Garlic Chicken Noodles</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Hakka Noodles
                110"><strong>Chicken Hakka Noodles</strong></td>
                <td>RS 110.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Egg Noodles/90"><strong>Egg Noodles</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mix Noodles/90"><strong>Mix Noodles</strong></td>
                <td>RS 90.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Choupsey</i></u></th>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Choupsey /100"><strong>Choupsey </strong></td>
                <td>RS 100.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chinese Choupsey/120"><strong>Chinese Choupsey</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken American Choupsey/120"><strong>Chicken American Choupsey</strong></td>
                <td>RS 120.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Rice And Gravy Combo</i></u></th>
                </tr>

             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Vegetable Fried Rice With Veg Munchurian/Chilli Paneer/130"><strong>Vegetable Fried Rice With Veg Munchurian/Chilli Paneer</strong></td>
                <td>RS 130.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
             <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken  Fried Rice With Chicken Munchurian/Chilli Chicken/160"><strong>Chicken Fried Rice With Chicken Munchurian/Chilli Chicken</strong></td>
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
