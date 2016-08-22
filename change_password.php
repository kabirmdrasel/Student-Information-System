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
<script src="js/password_validation.js"></script>
</head>
<body>

<div id="main_section">
	<div id="header">
    	<div class="logo"><img src="images/logo.jpg" alt="" width="242" height="109" title="" border="0" /> <img src="images/banner.jpg" alt="" width="755" height="109" title="" border="0" /></div>       
    </div>
        <div class="menu">
        	<ul>                                                                         
        		<li><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="account_info.php">Account Info</a></li>
                <li class="selected"><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
        	</ul>
        </div>
<h2 id=title>Change Password</h2>    
    <div id="container">
  <div id="main">    
    <div id="maincol_container1">
      <div class="maincol_middle">
        <div class="maincol">
        
        <h2 align="center"><?php if(isset($_SESSION['name'])){
    echo "Welcome {$_SESSION['name']}";
}?></h2>

        
        
        
<p>

 <?php
        include("dbconnect.php");
		$username = $_SESSION['username']; 
$password = $_POST['password'];
$newpassword = $_POST['new_password'];
$confirmnewpassword = $_POST['c_password'];

 $result = mysql_query("SELECT password FROM bac.user WHERE username='$username'"); 
	
		?>
        

  <form action="action.php" method="post" onSubmit="return validate(this)">
        	   <div align="center">
        	     <table width="61%" border="0" cellpadding="3">
        	       <tr>
        	         <td width="37%">Present Password </td>
        	         <td width="63%"><input class="form" name="password" id="password" type="password" size="34" /><br></td>
       	           </tr>
        	       <tr>
        	         <td>New Password </td>
        	         <td><input class="form" name="new_password" id="new_password" type="password" size="34"/><br></td>
       	           </tr>
        	       <tr>
        	         <td>Confirm Password </td>
        	         <td><input class="form" name="c_password" id="c_password" type="password" size="34" /><br>
       	             <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
			?></td>
       	           </tr>
        	         
        	       <tr>
        	         <td>&nbsp;</td>
        	         <td><br><input class="btn" name="action" id="action" type="submit"  value="Change Password"/></td>
       	           </tr>
       	         </table>
        	     <p>&nbsp;</p>
       	     </div>
  </form>
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