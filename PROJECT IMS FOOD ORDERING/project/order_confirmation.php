<!doctype html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>food confirmation</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
</head>
<body>
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
    <div class="collapse navbar-collapse navbar-right" id="bs-eatstreet-navbar-collapse-1" disabled="disabled">
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
                  $_SESSION['backpage']=$_SERVER['HTTP_REFERER'];
                  if(!isset($_SESSION['username']))
                  {
                    echo "<li><a href='login.php'>LOGIN</a></li>";  
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

<!--end-->
<div class="jumbotron">
<div class="container">
  <div class="row">
     <div class="col-md-12">
      <div class="progress">
         <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
         <span class="sr-only">40% Complete (success)</span>
         </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
<div class="panel panel-warning">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-cutlery"></span>&nbsp;&nbsp;
        FOOD ITEMS PURCHASED     
        </div>
        <div class="panel-body">
           <?php
          $db=mysql_connect('localhost','root','') or die('Unable to connect.Check your connection parameters.');
          mysql_select_db('food_ordering',$db) or die(mysql_error($db));
          $_SESSION['rest_id']=$_GET['rest_id'];
          $_SESSION['categ_id']=$_GET['categ_id'];
          if(!isset($_SESSION['username']))
          {
            echo 'SORRY YOU HAVE NOT LOGGED IN';
          }
          else {
            $query1='SELECT rest_name FROM RESTAURANT WHERE rest_id='.$_GET['rest_id'].' AND categ_id='.$_GET['categ_id'];
            $result1=mysql_query($query1,$db) or die(mysql_error($db));
            $row1=mysql_fetch_assoc($result1);
            foreach($row1 as $value)
            {
              echo'<h3>'.$value.'</h3><br/>';
            }
          $query='CREATE TABLE IF NOT EXISTS TEMP_CART (
           email_id VARCHAR(255) NOT NULL,
           item_no INTEGER UNSIGNED,
           item_name VARCHAR(255) ,
           quantity VARCHAR(2) ,
           price INTEGER UNSIGNED
            )';
          mysql_query($query,$db) or die(mysql_error($db));
          $no=1;
          $j=1;
          $i=1;
          foreach($_POST['select'] as $service)
          {
            foreach($_POST['item'] as $quantity)
            {
              
            if($quantity>0 && $service!='NULL')
            {
            $abc=explode("/",$service);
            $query='INSERT INTO TEMP_CART(email_id,item_no,item_name,price) VALUES("'.$_SESSION['emailid'].'",'.$no.',"'.$abc[0].'",'.$abc[1].')';
            $no=$no+1;
            $result=mysql_query($query,$db) or die(mysql_error($db));
            break;
            }
          }
          }
          
          $no1=1;

          foreach($_POST['item'] as $quantity)
          {
            if($quantity>0)
            {
            $query='UPDATE TEMP_CART SET quantity='.$quantity.' WHERE email_id="'.$_SESSION['emailid'].'" AND item_no='.$no1;
            $no1=$no1+1;
            $result=mysql_query($query,$db) or die(mysql_error($db));
          }
          else {
            continue;
          }
          }
          ?>
          <table class="table table-striped table-hover" border="0">
            <tr><th>&nbsp;&nbsp;</th><th>Item Selected</th><th>price</th><th>quantity</th></tr>
          <?php
            $query='SELECT item_no,item_name,price,quantity FROM TEMP_CART WHERE email_id="'.$_SESSION['emailid'].'"';
            $result=mysql_query($query,$db) or die(mysql_error($db));
            while($row=mysql_fetch_assoc($result))
            {
              echo'<tr>';
              foreach($row as $value)
              {
                echo'<td>'.$value.'</td>';
              }
              echo'</tr>';
            }
          ?>
          </table>  
          <p style="font-weight:10px">Total Price &nbsp;&nbsp;&nbsp;Rs.
            <?php
            $query='SELECT price,quantity FROM TEMP_CART WHERE email_id="'.$_SESSION['emailid'].'"';
            $result=mysql_query($query,$db) or die(mysql_error($db));
            $price=0;
            while($row=mysql_fetch_assoc($result))
            {
              $p=1;
              foreach($row as $value)
              {
                $p=$p*$value;
              }
              $price+=$p;
            }
            echo ($price);
            ?>
          </p>
          <?php
        }
        ?>
</div>
</div>
</div>
<div class="col-md-4 col-md-offset-1">
<div class="panel panel-warning">
        <div class="panel-heading">
        <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;
        CUSTOMER INFORMATION     
        </div>
        <div class="panel-body">
          <table class="table table-hover" border="0">
          <?php
          if(!isset($_SESSION['username']))
          {
            echo 'PLEASE LOGIN FIRST';
            echo '<br/><br/>';
            echo '<form action="login.php" role="form">';
            echo '<input type="submit" class="btn btn-default" value="PLEASE LOGIN!!">';
            echo '</form>';
          }
          else {
          $query='SELECT cust_name,address,phone_no FROM CUSTOMER WHERE email_id="'.$_SESSION['emailid'].'"';
          $result=mysql_query($query,$db) or die(mysql_error($db));
          $row=mysql_fetch_assoc($result);
          $i=1;
          foreach($row as $value)
          {
            echo '<tr>';
            if($i==1)
            {
            echo'<td>CUSTOMER NAME</td><td>'.$value.'</td>';
            }
            else if($i==2)
            {
              echo '<td>CUSTOMER ADDRESS</td><td>'.$value.'</td>';
            }
            else if($i==3)
            {
              echo '<td>CONTACT NUMBER</td><td>'.$value.'</td>';
            }
            $i=$i+1;
            echo '</tr>';

          }
            }
          ?>
          </table>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 col-md-offset-3">
  <?php
  if(isset($_SESSION['username']))
  {

    ?>
  <form method="POST" action="payment.php" role="form">
<input type="submit" class="btn btn-primary" value="Proceed To Pay">
<a class="btn btn-warning" href="back.php">Back To Menu</a>
</form>
<?php
}
?>
</div>
</div>
</div>
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
<script src="js/jquery.js"></script><!--addfiles-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>