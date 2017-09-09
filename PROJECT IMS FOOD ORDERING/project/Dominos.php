<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dominos</title>
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
             ?>
          </strong></div>
        <DIV class="col-md-4 no-margin no-padding">
              <img src="images/dominos2.jpg" style=" margin-top:10px; height:150px; width:200px; z-index: -1;" class="img-responsive">
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
                  <th colspan="3" class="success"><u><i>Veg Treat</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spicy Delight(M)/330"><strong> Spicy Delight(M) </strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Double Cheese Margherita(M)/330"><strong> Spicy Delight(M) </strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fresh Veggie(M)/330"><strong>Fresh Veggie(M)</strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
               
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Country Special(M)/330"><strong> Country Special(M) </strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Farmhouse(M)/330"><strong> Farmhouse(M)</strong></td>
                <td>RS 330.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spicy Delight(L)/505"><strong> Spicy Delight(L) </strong></td>
                <td>RS 505.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Double Cheese Margherita(L)/505"><strong> Spicy Delight(L) </strong></td>
                <td>RS 505.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Fresh Veggie(L)/505"><strong>Fresh Veggie(L)</strong></td>
                <td>RS 505.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
               
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Country Special(L)/505"><strong> Country Special(L) </strong></td>
                <td>RS 505.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Farmhouse(L)/505"><strong> Farmhouse(L)</strong></td>
                <td>RS 505.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Veg Special</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="5-Pepper(M)/400"><strong> 5-Pepper(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Peppy Paneer(M)/400"><strong> Peppy Paneer(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mexican Green Wave(M)/400"><strong> Mexican Green Wave(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Deluxe Veggie(M)/400"><strong> Deluxe Veggie(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Courmet(M)/400"><strong> Courmet(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="5-Pepper(L)/585"><strong> 5-Pepper(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Peppy Paneer(L)/585"><strong> Peppy Paneer(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Mexican Green Wave(L)/585"><strong> Mexican Green Wave(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Deluxe Veggie(L)/585"><strong> Deluxe Veggie(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Courmet(L)/585"><strong> Courmet(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Veg Feast Pizza</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg. Extravaganxa(M)/460"><strong>Veg. Extravaganxa(M)</strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Veg. Extravaganxa(L)/655"><strong>Veg. Extravaganxa(L)</strong></td>
                <td>RS 655.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Non Veg. Treat</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Fiesta(M)/400"><strong> Chicken Fiesta(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Barbeque Chicken(M)/400"><strong> Barbeque Chicken(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spicy Chicken(M)/400"><strong> Spicy Chicken(M) </strong></td>
                <td>RS 400.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Fiesta(L)/585"><strong> Chicken Fiesta(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Barbeque Chicken(L)/585"><strong> Barbeque Chicken(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Spicy Chicken(L)/585"><strong> Spicy Chicken(L) </strong></td>
                <td>RS 585.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                 <tr>
                  <th colspan="3" class="success"><u><i>Non Veg Special</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Zesty Chicken(M)/460"><strong> Zesty Chicken(M) </strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chicken Mexicana(M)/460"><strong> Chicken Mexicana(M)</strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Keema Do Pyazaa(M)/460"><strong> Keema Do Pyazaa(M) </strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Golden Delight(M)/460"><strong> Chicken Golden Delight(M) </strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Deluxe Chicken(M)/460"><strong> Deluxe Chicken(M)</strong></td>
                <td>RS 460.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Zesty Chicken(L)/635"><strong> Zesty Chicken(L) </strong></td>
                <td>RS 635.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value=" Chicken Mexicana(L)/635"><strong> Chicken Mexicana(L)</strong></td>
                <td>RS 635.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Keema Do Pyazaa(L)/635"><strong> Keema Do Pyazaa(L) </strong></td>
                <td>RS 635.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Golden Delight(L)/635"><strong> Chicken Golden Delight(L) </strong></td>
                <td>RS 635.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Deluxe Chicken(L)/635"><strong> Deluxe Chicken(L)</strong></td>
                <td>RS 635.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Non Veg. Feast Pizzas</i></u></th>
                </tr>

                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Non Veg. Supreme(M)/515"><strong>Non Veg. Supreme(M)</strong></td>
                <td>RS 515.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese And Pepperconi(M)/515"><strong>Cheese And Pepperconi(M)</strong></td>
                <td>RS 515.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>


                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Non Veg. Supreme(L)/700"><strong>Non Veg. Supreme(L)</strong></td>
                <td>RS 700.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>

                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheese And Pepperconi(L)/700"><strong>Cheese And Pepperconi(L)</strong></td>
                <td>RS 700.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                  <th colspan="3" class="success"><u><i>Beverages And Sides</i></u></th>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Cheesy Garlic Breadsticks/89"><strong> Cheesy Garlic Breadsticks </strong></td>
                <td>RS 89.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Taco Indiana Veg/89"><strong> Taco Indiana Veg </strong></td>
                <td>RS 89.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Taco Indiana Chicken/109"><strong> Taco Indiana Chicken </strong></td>
                <td>RS 109.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pasta Italian Red/105"><strong>Pasta Italian Red </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Pasta Italian White/115"><strong>Pasta Italian White </strong></td>
                <td>RS 115.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Kickers/105"><strong> Chicken Kickers </strong></td>
                <td>RS 105.00</td>
                <td align="center">
                <input type="text" class="form-control item" id="item" name="item[]" value=0></td>
                </tr>
                <tr>
                <td><input type="checkbox" id="select" name="select[]" value="Chicken Wings/125"><strong> Chicken Wings </strong></td>
                <td>RS 125.00</td>
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
              document.getElementById("confirm").disabled=false;
}

    </script>
  </body>
</html>
