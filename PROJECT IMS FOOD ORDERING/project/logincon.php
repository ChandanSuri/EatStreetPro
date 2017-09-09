
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
                <!--<li><?php
                  #session_start(); 
                  #if(!isset($_SESSION['username']))
                  #{
                  #  echo "<a href='login.php'>LOGIN</a>";  
                  #}
                  #else
                  #{
                  #  echo "<h4 style='color:white;'>".$_SESSION['username']."<a href='logout.php' style='color:white;'><br>logout</a></h4>";
                  #}
                  ?></li>-->
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
  session_start();
	$useremail=$_POST['email1'];
	$passwd=$_POST['password1'];

	$sql="SELECT count(*) from customer where(email_id='".$useremail."' and password='".$passwd."')";
	$qury=mysql_query($sql);
	$result=mysql_fetch_array($qury);

	if($result[0]>0)
	{
		echo "<br><br><br><h2 style='color:black;'>login is successful</h2>";
		
		$username="SELECT cust_name FROM customer where (email_id='".$useremail."' and password='".$passwd."')";
		$qury2=mysql_query($username);
		$result2=mysql_fetch_array($qury2);
		$_SESSION['username']=$result2[0];
		echo "<br><br><h3>Welcome ".$_SESSION['username']."</h3>`";
		echo "<br><br><a href='home.php'><button class='btn btn-primary'>go back to home</button></a><br>";
    $_SESSION['emailid']=$useremail;
	}
	else
	{
		echo "<h2 style='color:black;'><br><br><br>either password or username is incorrect<br><br><br></h2>";
		echo "<a href='login.php' style='color:blue;'>go back</a>";
		$_SESSION['UserName']="guest";
	}
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
           


          </ul>
        </div>
    </div>
    </div>    
</footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>