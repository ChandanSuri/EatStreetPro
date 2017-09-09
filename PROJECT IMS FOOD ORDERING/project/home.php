<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="font_awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/stylehome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
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
		<a class="navbar-brand" href="home.php">EATSTREET</a></a>
	</div>
		<div class="collapse navbar-collapse navbar-right" id="bs-WDM-navbar-collapse-1">
			<ul class="nav navbar-nav nav-pills">
				<li class="active"><a href="home.php">HOME &nbsp;&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
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
                
                  <?php
                  session_start(); 
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
                  <!--<a href="login.php">LOGIN &nbsp;&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>-->
                
            </li> 
			</ul>
		</div>
	</div>
</nav>
<!--End of Navigation bar-->
<!--Carousel Slideshow Start-->
<div class="jumbotron">
<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
    <li data-target="#carousel" data-slide-to="3"></li>
    <li data-target="#carousel" data-slide-to="4"></li>
    <li data-target="#carousel" data-slide-to="5"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="height:600px;">
    <div class="item active">
      <img src="images/online_order.jpg"  class="img-responsive" alt="Online Ordering" width="100%">
      <div class="carousel-caption">
        <h3>Online Order</h3>
        <p>Order Mouth Watering Delicacies</p>
          <a href="signup.php" class="btn btn-primary">SIGN UP!</a>
      </div>
    </div>
    <div class="item">
      <img src="images/pizza.jpg" class="img-responsive" alt="Pizza" width="100%">
      <div class="carousel-caption">
        <h3>Extravagant Variety</h3>
        <p>Delicious Pizza's Served Hot</p>
          <a href="signup.php" class="btn btn-primary">SIGN UP!</a>
      </div>
    </div>
    <div class="item" >
      <img src="images/fastfood.jpg" class="img-responsive"  alt="Fast Food" width="100%">
      <div class="carousel-caption">
        <h3>Just On A Go!</h3>
        <p>Hygienic Food</p>
          <a href="signup.php" class="btn btn-primary">SIGN UP!</a>
      </div>
    </div>
    <div class="item">
      <img src="images/cake1.jpg" class="img-responsive" alt="Cake" width="100%">
      <div class="carousel-caption">
        <h3>Cakes With Delicious Taste</h3>
        <p>Freshly Prepared Goods Used</p>
          <a href="signup.php" class="btn btn-primary">SIGN UP!</a>
      </div>
    </div>
    <div class="item" >
      <img src="images/coffee.jpg" class="img-responsive" alt="Coffee" width="100%">
      <div class="carousel-caption">
        <h3>Feel The Taste Of Cocoa</h3>
        <p>Life Goes On With  Heart-Warming Coffee</p>
          <a href="signup.php" class="btn btn-primary">SIGN UP!</a>
      </div>
    </div>
    <div class="item" >
      <img src="images/punjabi.jpg"  class="img-responsive" alt="Punjabi Food" width="100%">
      <div class="carousel-caption">
        <h3>Punjabi Delicacies</h3>
        <p>Have Funn With Such Delicious Punjabi Food</p>
          <a href="signup.php" class="btn btn-primary">SIGN UP!</a>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--Carousel Display End-->
<!--Start Of the Categories Thumbnails-->
	<div class="row">
		<div class="panel panel-default col-md-3 col-md-offset-1 col-sm-5 col-xs-10">
			<div class="panel-heading">Punjabi Tadka</div>
			<div class="panel-body"> 
				<a href="punjabi_tadka.php" class="thumbnail img-responsive">
				<img src="images/punjabi1.jpg" class="img-responsive" alt="Punjabi Tadka" >
				</a>
			</div>
		</div>
    <div class="panel panel-default col-md-3 col-sm-5 col-xs-10">
      <div class="panel-heading">Chinese</div>
      <div class="panel-body">
			<a href="chinese.php" class="thumbnail img-responsive">
			<img src="images/chinese.png" class="img-responsive" alt="Chinese">
			</a>
		</div>
  </div>
      <div class="panel panel-default col-md-3 col-sm-5 col-xs-10">
      <div class="panel-heading">South Indian</div>
      <div class="panel-body">
			<a href="south_indian.php" class="thumbnail img-responsive">
			<img src="images/South_indian.jpg" class="img-responsive" alt="South Indian">
			</a>
		</div>
  </div>
    <div class="panel panel-default col-md-3 col-md-offset-1 col-sm-5 col-xs-10">
      <div class="panel-heading">Continental</div>
      <div class="panel-body"> 
        <a href="continental.php" class="thumbnail img-responsive">
        <img src="images/continental.jpg" class="img-responsive" alt="Continental" >
        </a>
      </div>
    </div>
    <div class="panel panel-default col-md-3 col-sm-5 col-xs-10">
      <div class="panel-heading">Fast Food Arena</div>
      <div class="panel-body">
      <a href="fast_food.php" class="thumbnail img-responsive">
      <img src="images/fastfood1.jpg" class="img-responsive" alt="Fast Food Arena">
      </a>
    </div>
  </div>
      <div class="panel panel-default col-md-3 col-sm-5 col-xs-10">
      <div class="panel-heading">Bakery</div>
      <div class="panel-body">
      <a href="bakery.php" class="thumbnail img-responsive">
      <img src="images/Bakery.jpg" class="img-responsive" alt="Bakery">
      </a>
    </div>
  </div>
  </div>
</div>
<!--Start of the footer-->
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
<!--End of the footer-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>