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
if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] != admin) and ($_SESSION['user_type'] != superadmin) and ($_SESSION['user_type'] != student) and ($_SESSION['user_type'] != parent)) {
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
        		<li class="selected"><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="account_info.php">Account Info</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
        	</ul>
        </div>
    
    <div id="container">
  <div id="main">
    <div id="leftcol_container">
    	<div class="leftcol">
        	<h2>Admin Panel</h2>
            <br>
            <?php
		include('dbconnect.php');
		$user_type = $_SESSION['user_type'];
		$sql=mysql_query("select * from bac.menu where user_type='$user_type' ");		
		
		while($m=mysql_fetch_array($sql))
		{
			echo "<a class=\"menus\" style=\"font-family:Times New Roman; font-size:16px;\" href=\"".$m['link'].".php\">".$m['link_name']."</a>";
			echo "<br>";
		}
		?>   
        <br>   
    	</div>
      <div class="leftcol_bottom">
        <p>&nbsp;</p>
      </div>
    </div>
      
    <div id="maincol_container4">
      <div class="maincol_middle">
        <div class="maincol1">
        <h1 id=title><?php if(isset($_SESSION['name'])){echo "Welcome To {$_SESSION['name']}";}?> Panel</h1>
        </div>
        <br>
<table>
          <tr>
                <td align="center"  style="color:#69F;border-radius:10px" bgcolor="#FC3" >
               <?php
                    session_start();
					
					if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
					
					?> 
		</td>
              </tr>
</table>      
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