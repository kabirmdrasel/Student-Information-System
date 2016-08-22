<?php
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);


// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();
if(isset($_SESSION['username']) and isset($_SESSION['password'])){
	
	
?>

<html>
<head>
<title>PHP Project</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<div id="main_section">
	<div id="header">
    	<div class="logo"><img src="images/logo.jpg" alt="" width="242" height="109" title="" border="0" /> <img src="images/banner.jpg" alt="" width="755" height="109" title="" border="0" /></div>     
    </div>
        <div class="menu">
        	<ul>                                                                         
        		<li><a href="home.php">Home</a></li>
                <li class="selected"><a href="profile.php">Profile</a></li>
                <li><a href="account_info.php">Account Info</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
        	</ul>
        </div>
<h2 id=title><?php if(isset($_SESSION['name'])){
    echo "Welcome {$_SESSION['name']}";
}?></h2> 
    <div id="container">
  <div id="main">   
    <div id="maincol_container1">
      <div class="maincol_middle">
        <div class="maincol">
     
<br>
<h2 align="center" style="color:#900;"><strong>Upload Photo</strong></h2>
<p>&nbsp;</p>
<p>
      <?php
        include("dbconnect.php");?>
      <h3 align="center">Please Choose a File and click Submit</h3> 
      <br> <br> <br>
      <div align="center">
      <form action="profile.php" method="post" name="input" enctype="multipart/form-data">
<table width="500" border="0" cellpadding="5">
  
  <tr>
    <td>Profile Picture</td>
    <td width="350"><input type="file" name="files" id="files" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="350"><input class="btn" name="submit" type="submit" value="Submit" /></td>
  </tr>
</table>

</form>

      </div>
      </p>
        </div>
        <br>
        
      </div> 
    </div>
        <div class="clear"></div>
  </div>

</div>
  
  
    <div id="footer">                                              
        <div class="left_footer"><a href="index.php">Home</a> &nbsp;|<a href="about.php">About School</a> &nbsp;|<a href="registration.php">Registration</a> &nbsp;|<a href="photos.php">Photo Gallery</a>&nbsp;|<a href="contact.php">Contact Us</a></div> 
        <div class="right_footer"><a href="privacy.php">Privacy Policy</a>&nbsp;| <a> Copyright &copy; 2014 &nbsp;| <a href="aion.php">Designed By RSJ Developers</a></a>
        </div>   
    
    
</div>

</body>
</html>         
<?php
}
else
{header("Location:index.php");}
?>