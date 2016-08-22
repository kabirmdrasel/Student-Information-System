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

<?php
if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] != admin) and ($_SESSION['user_type'] != superadmin) and ($_SESSION['user_type'] != student)) {
    header('Location: profile.php');
    exit;
}
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
    <div id="container">
  <div id="main">
<h2 id=title>Send Request</h2>      
    <div id="maincol_container1">
      <div class="maincol_middle">
            <div class="maincol">
          <div class="left_content_body">
            <p align="center">&nbsp;</p>
            <div>
              <div align="center">
              <form action="action.php" method="post" onSubmit="return validate(this)">
                <table width="633" border="0">
				<tr><td><h3>From,</h3></td></tr>
                  <tr>
                    <td width="117"> Name </td>
                    <td width="495"><input type="text" name="name" id="name" size="40"></td>
                  </tr>
                  <tr>
                    <td width="117">ID </td>
                    <td><input type="text" name="student_id" id="student_id" size="40"></td>
                  </tr>
                  <tr>
                    <td width="117">E-mail </td>
                    <td><input type="text" name="email" id="email" size="40"></td>
                  </tr>
                  <tr>
				  
				<tr><td><h3>To,</h3></td></tr>
                  <tr>
                    <td width="117"> Name </td>
                    <td width="495"><input type="text" name="tname" id="tname" size="40"> </td>
                  </tr>
                  <tr>
                    <td width="117" height="157"> Your Message</td>
                    <td><textarea name="message" id="message" cols="30" rows="6">
                  </textarea></td>
                  </tr>
                  <tr>
                    <td width="117" height="63">&nbsp;</td>
                    <td align="right"><p align="left"><input class="btn" name="action" type="submit"  value="Submit"></p>                    </td>
                  </tr>
                </table>
                </form>
              </div>
            </div>
			
         </div> 

          </div>
		  <br>
            </div>
      </div>
	  
    <div id="footer">                                              
        <div class="left_footer"><a href="index.php">Home</a> &nbsp;|<a href="about.php">About School</a> &nbsp;|<a href="registration.php">Registration</a> &nbsp;|<a href="photos.php">Photo Gallery</a>&nbsp;|<a href="contact.php">Contact Us</a></div> 
        <div class="right_footer"><a href="privacy.php">Privacy Policy</a>&nbsp;| <a> Copyright &copy; 2014 &nbsp;| <a href="aion.php">Designed By RSJ Developers</a></a>
        </div>   
      </div>
        <div class="clear"></div>
  </div>

</div>  
    
</div>


</body>
</html>
<?php
}
else
{trigger_error("You are not Admin");}
?>