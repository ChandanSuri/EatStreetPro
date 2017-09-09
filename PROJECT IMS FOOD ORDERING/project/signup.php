<!doctype html>
<html>
	<head>
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>signup</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="font_awesome/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript">
	function validate()
{
var x=document.form1.name2.value;
if(x==""||x==null)
{
document.getElementById("demo1").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
document.getElementById("Button").disabled=true;
return ;
}

else if(!isNaN(x))
{
document.getElementById("demo1").innerHTML="<h4 style='color:red;'>Enter Characters</h4>";
document.getElementById("Button").disabled=true;
return ;
}
else
{
  document.getElementById('demo1').innerHTML="<h4> </h4>"
}
var radio = document.forms['form1'].gender.length;
          var s="";
          for (var i = 0; i < radio; i++)
              {  if (document.forms['form1'].gender[i].checked)
                    { s = s + document.forms['form1'].gender[i].value + " "; }
              }
          if (s == ""||s==null)
{
		  document.getElementById("demo2").innerHTML="<br><h4 style='color:red;'>Please select your gender</h4>";
      document.getElementById("Button").disabled=true;
return;
}
else
{
  document.getElementById("demo2").innerHTML="<h4> </h4>"
}

var add=document.form1.address.value;
if(add==""||add==null)
{
document.getElementById("demo3").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
document.getElementById("Button").disabled=true;
return ;
}
else
{
  document.getElementById("demo3").innerHTML="<h4> </h4>"
}

var email=document.form1.email2.value;
if(email==""||email==null)
{
document.getElementById("demo8").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
document.getElementById("Button").disabled=true;
return ;
}
else
{
  document.getElementById("demo8").innerHTML="<h4> </h4>"
}

var z=document.form1.number.value;
var a=z;
var b=a.length;
if(z==""||z==null)
{
document.getElementById("demo4").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
document.getElementById("Button").disabled=true;
return;
}
else if(isNaN(z))
{
document.getElementById("demo4").innerHTML="<h4 style='color:red;'>Enter Valid Phone no</h4>";
document.getElementById("Button").disabled=true;
return ;
}
//var a=z;
//var b=a.length;
else if(b!=10)
{
document.getElementById("demo4").innerHTML="<h4 style='color:red;'>Enter valid 10 digit number</h4>";
document.getElementById("Button").disabled=true;
return ;
}
else
{
  document.getElementById("demo4").innerHTML="<h4> </h4>"
}

var pass=document.form1.password1.value;
if(pass==""||pass==null)
{
document.getElementById("demo5").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
document.getElementById("Button").disabled=true;
return ;
}
var p=pass.length;
if(p<5)
{
document.getElementById("demo5").innerHTML="<h4 style='color:red;'>Minimum 5 digits required</h4>";
document.getElementById("Button").disabled=true;
return ;
}
else
{
  document.getElementById("demo5").innerHTML="<h4> </h4>"
}

var pass1=document.form1.password2.value;
var q=pass1.length;
if(pass1==""||pass1==null)
{
document.getElementById("demo6").innerHTML="<h4 style='color:red;'>This field is necessary</h4>";
document.getElementById("Button").disabled=true;
return ;
}
//var q=pass1.length;
else if(q<5)
{
document.getElementById("demo6").innerHTML="<h4 style='color:red;'>Minimum 5 digits required</h4>";
document.getElementById("Button").disabled=true;
return ;
}

else if(pass!=pass1)
{
document.getElementById("demo6").innerHTML="<h4 style='color:red;'>Passwords do not match</h4>";
document.getElementById("Button").disabled=true;
return ;
}
else
{
  document.getElementById("demo6").innerHTML="<h4> </h4>"
}
}
function normal()
{
  document.getElementById("Button").disabled=false;
}
	</script>
	</head>
	<body>
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
    <a class="navbar-brand" href="home.php">EATSTREET</a>
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
                <li><a href="login.php">LOGIN &nbsp;&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
            </li> 
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <DIV class="col-md-10 col-md-offset-1">
          <DIV class="panel panel-default">
            <div class="panel-heading">
              Sign Up
              </SPAN>
            </div>
          <DIV class="panel-body">
            <form action="createaccount.php" method="post" role="form" id="form1" name="form1">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" id="name2" name="name2" required>
                <span class="helptext">Please enter both your First Name and Last Name...</span>
				<span id="demo1"></span>
              </div>
              <div class="form-group">
                <label>Gender</label><br>
                <div class="container">
                  <div class="row">
                    <div class="col-md-1">
                <input type="radio" id="gender" name="gender"  value="female">Female
                </div>
                <div class="col-md-1"> 
                <input type="radio" id="gender" name="gender"  value="male">Male
              </div>
			  <span id="demo2"></span>
            </div>
            </div>
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="Text" class="form-control" placeholder="Address" id="address" name="address" onChange="normal()" required>
				<span id="demo3"></span>
              </div>
              <div class="form-group">
                <label>Email-Id</label>
                <input type="email" class="form-control" placeholder="Email-Id" id="email2" name="email2" onChange="normal()" required >
				<span id="demo8"></span>
              </div>
              <div class="form-group">
                <label>Contact Number</label>
                <input type="text" class="form-control" placeholder="Contact Number" id="number" name="number" onChange="normal()" required>
				<span id="demo4"></span>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password1" name="password1" onChange="normal()" required>
				<span id="demo5"></span>
              </div>
              <div class="form-group">
                <label>Retype Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password2" name="password2" onChange="normal()" required>
              <span id="demo6"></span>
			  <span id="demo7"></span>
			  </div>
              <button type="submit" class="btn btn-success" id="Button" onMouseOver="validate()">Create Account</button>
              &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <button type="Reset" class="btn btn-warning" id="button2">Reset</button>
            </form>
          </DIV>
          </DIV>
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
