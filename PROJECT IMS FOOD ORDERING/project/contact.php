<!doctype html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contact</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="font_awesome/css/font-awesome.min.css" rel="stylesheet">
      <script type="text/javascript">
function validate()
{
var x=document.form1.name1.value;
if(x==""||x==null)
{
document.getElementById("demo1").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
return ;
}
if(!isNaN(x))
{
document.getElementById("demo1").innerHTML="<h4 style='color:red;'>Enter the valid Name</h4>";
return ;
}
else
{
  document.getElementById('demo1').innerHTML="<h4> </h4>"
}
var email=document.form1.email1.value;
if(email==""||email==null)
{
document.getElementById("demo4").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
return ;
}
else
{
  document.getElementById("demo4").innerHTML="<h4> </h4>"
}
var sub=document.form1.sub1.value;
if(sub==""||sub==null)
{
document.getElementById("demo2").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
return ;
}
else
{
  document.getElementById("demo2").innerHTML="<h4> </h4>"
}
var msg=document.form1.msg1.value;
if(msg==""||msg==null)
{
document.getElementById("demo3").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
return ;
}
else
{
  document.getElementById("demo3").innerHTML="<h4> </h4>"
}
window.location.assign("home.php");
}
</script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top " role="navigation">
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
        <li><a href="contact.php" class="active">CONTACT US &nbsp;&nbsp;<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></a></li>
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
            </li> 
      </ul>
    </div>
  </div>
</nav>
<!--end-->
<!--start of form-->
<div class="jumbotron">
  <div class="row">
<iframe class="img-responsive" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width:1900px; height:400px" src="https://maps.google.com/maps?hl=en&q=Thapar University, Patiala, Punjab, India&ie=UTF8&t=satellite&z=15&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://www.premiumlinkgenerator.com/">multihoster premium</a></small></div></iframe>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
       <span class="glyphicon glyphicon-map-marker"></span>
       </div>
        <div class="panel-body">
        <address>
          <h3><i>EATSTREET</i></h3>
      "THAPAR UNIVERSITY",<br>
          PATIALA,<br>
          147004<br>
          PUNJAB<br>
          INDIA.<br>
        <span class="glyphicon glyphicon-phone"></span>09460479974

       </address>
     </div>
   </div>
</div>
<div class="col-md-6">
      <div class="panel panel-warning">
        <div class="panel-heading">
       <span class="glyphicon glyphicon-envelope"></span>
       </div>
        <div class="panel-body">
<form method="post" action="contact_submit.php" role="form" name="form1" id="form1">
  <div class="form-group">
    <label for="contactname">Full Name
    </label>
    <input type="text" class="form-control" id="contactname" name="fullname" placeholder="Enter Full Name">
    <p><i>Enter both First Name and Last Name</i></p>
    <span id="demo1"></span>
  </div>
  
    <div class="form-group">
    <label for="contactemail">Email-id
    </label>
    <input type="email" class="form-control" id="contactemail" name="email" placeholder="Enter Email-id">
    <span id="demo4"></span>
  </div>
    <div class="form-group">
    <label for="contactsubject">Subject</label>
    <input type="text" class="form-control" id="contactsubject" name="subject" placeholder="Subject">
    <span id="demo2"></span>
  </div>
<div class="form-group">
    <label for="contactmessage">Message</label>
    <textarea class="form-control" id="contactmessage" name="comment" rows="6">
    </textarea>
    <span id="demo3"></span>
  </div>
<input type="submit" class="btn btn-info" value="Submit" onClick="validate();">
<button type="reset" class="btn btn-danger">Reset</button>
</form>
</div>
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