<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="font_awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
  <!--Start of navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
       <a class="navbar-brand" href="#">
             <img alt="Brand" src="images/Logo.png" width="100px" height="35px">
             </a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-WDM-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
            </button>
    <a class="navbar-brand" href="#">EATSTREET</a>
  </div>
    <div class="collapse navbar-collapse navbar-right" id="bs-WDM-navbar-collapse-1">
      <ul class="nav navbar-nav nav-pills">
        <li><a href="home.php">HOME &nbsp;&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" >CATEGORIES<span class="caret"></span>
          </a>
        <ul class="dropdown-menu">
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
                <li class="active"><a href="login.php">LOGIN &nbsp;&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
            </li> 
      </ul>
    </div>
  </div>
</nav>
<?php
		$conn=mysql_connect("localhost","root","");
		$db=mysql_select_db("food_ordering",$conn);
?>
<?php
		$user=$_POST['name2'];
		$pass=$_POST['password1'];
		$phone=$_POST['number'];
		$email=$_POST['email2'];
		$address=$_POST['address'];
		$sql="INSERT into customer values('".$email."','".$user."','".$address."','".$phone."','".$pass."')";
		$qury=mysql_query($sql);
		if(!$qury)
			echo "Failed".mysql_error();
		else
			echo "<br><br><br><h2 style='color:black;'>Account Created Successfully</h2>";
			echo '<br><br><a href="home.php" style="color:blue;">Back To home</a>';
?>

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
            <li><a href="login.php">Login</a></li>


          </ul>
        </div>
    </div>
    </div>    
</footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>