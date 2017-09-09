<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cafe</title>
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
			 <a class="navbar-brand" href="home.php">
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
				<li ><a href="home.php">HOME &nbsp;&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
				<li class="dropdown active">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">CATEGORIES<span class="caret"></span>
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
                    echo '<li class="divider"></li></ul>';
                  }                  
                  ?>
            </li> 
      </ul>
    </div>
  </div>
</nav>
<!--End of Navigation bar-->
<!--Main Webpage Content-->
<div class="container">
	<div class=" page-header row col-md-4 col-md-offset-4" >
	<h2 id="heading">Cafe</h2>
	</div>
</div>
<div class="jumbotron">
<div class="container">
<div class="row">
	<div class="col-md-4 col-sm-5 col-xs-10">
	<div class="panel panel-default">
		<div class="panel-body">
      <img src="images/ccd1.jpg" alt="Cafe Coffee Day" class="restaurants img-circle img-responsive">
      <div class="caption">
        <h3 >Cafe Coffee Day</h3>
        <p>
        	<address>
        	Bhupindra Rd,<br/>
          Near Punjabi Bagh, <br/>
          Patiala, Punjab 147001.
        	</address>
        </p>
        <p><a href="ccd.php?rest_id=29&categ_id=7" class="btn btn-primary" role="button">Go To</a> </p>
      </div>
  </div>
    </div>
  </div>
 	<div class="col-md-4 col-sm-5 col-xs-10">
	<div class="panel panel-default">
		<div class="panel-body">
		<img src="images/ccd2.jpg" alt="CCD" class="restaurants img-circle img-responsive">
      <div class="caption">
        <h3 style="position:center">Cafe Coffee Day</h3>
        <p>
        	<address>
        	Inside New Leela Bhawan,<br/>
          Ajit Nagar,<br/>
          Patiala, Punjab 147001.
        	</address>
        </p>
        <p><a href="ccd.php?rest_id=30&categ_id=7" class="btn btn-primary" role="button">Go To</a> </p>
      </div>
    </div>
  </div>
</div>
  <div class="col-md-4 col-sm-5 col-xs-10">
  <div class="panel panel-default">
		<div class="panel-body">
        <img src="images/ccd3.jpg" alt="CCD" class="restaurants img-circle img-responsive">
      <div class="caption">
        <h3 style="position:center">Cafe Coffee Day</h3>
        <p>
        	<address>
        	 Inside Omaxe Mall,<br/>
           Mall Road, Near Central State Library,<br/>
           Patiala, Punjab 147001.
        	</address>
        </p>
        <p><a href="ccd.php?rest_id=31&categ_id=7" class="btn btn-primary" role="button">Go To</a> </p>
      </div>
    </div>
  </div>
</div>
	</div>
</div>
</div>
<!--End Of Main webpage Content-->

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