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
if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] != superadmin)) {
    header('Location: home.php');
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
    	<br><div class="leftcol">
        	<h2>Admin Panel</h2>
            <br>
            
            <?php
		include('dbconnect.php');
		
		$user_type = $_SESSION['user_type'];
		$sql=mysql_query("select * from bac.menu where user_type='$user_type' ");		
		
		while($m=mysql_fetch_array($sql))
		{
			echo "<a class=\"menus\" style=\"font-family:Arial; font-size:16px;\" href=\"".$m['link'].".php\">".$m['link_name']."</a>";
			echo "<br>";
		}
		?>   
        <br>   
    	</div>
    </div>
<h2 id=title>Add Admin</h2>
    <div id="maincol_container3">
      <div class="maincol_middle">
        <div class="maincol">
          <form action="action.php" method="post">
            <div align="center">
              <table width="639" border="0">
                <tr>
                  <td width="167"> Name </td>
                  <td width="462"><input type="text" name="name" id="name" size="34"></td>
                </tr>
                <tr>
                  <td width="167">ID</td>
                  <td><input type="text" name="student_id" id="student_id" size="34" ></td>
                </tr>
                <tr>
                  <td width="167">Username </td>
                  <td><input type="text" name="username" id="username" size="34" >
                   </td>
                </tr>
                <tr>
                  <td width="167"> Password</td>
                  <td><input type="password" name="password" id="password" size="34" ></td>
                </tr>
                <tr>
                  <td width="167"> Confirm Password</td>
                  <td><input type="password" name="c_password" id="c_password" size="34" ></td>
                </tr>
                <tr>
                  <td width="167">E-mail</td>
                  <td><input type="text" name="email" id="email" size="34" ></td>
                </tr>
                <tr>
                  <td width="167">Date of Birth </td>
                  <td><input type="text" name="dob" id="dob" size="34" value="(DD-MM-YY)" onClick="this.value = ''"></td>
                </tr>
                <tr>
                  <td width="167">Address </td>
                  <td><textarea name="address" id="address" rows="2" cols="25">
                  </textarea></td>
                </tr>
                <tr>
                  <td width="167">Contact Number </td>
                  <td><input type="text" name="contactnumber" id="contactnumber" size="34" ></td>
                </tr>
                
                <tr>
                  <td width="167"> Gender </td>
                  <td><input type="radio" name="gender" value="female">
                    Female
                    <input type="radio" name="gender" value="male">
                    Male</td>
                </tr>
                <tr>
                  <td width="167">Blood Group </td>
                  <td><select name="blood">
                    <option value="0" selected="selected">Choose one</option>
                    <option value="O+">O+</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O-">O-</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                  </select></td>
                </tr>
                <tr>
                  <td width="167">Interest </td>
                  <td><select name="interest">
                    <option value="0" selected="selected">Choose one</option>
                    <option value="networking">Networking</option>
                    <option value="database">Database</option>
                    <option value="programming">Programming</option>
                  </select></td>
                </tr>
                <tr>
                <td width="167">User Type </td>
                <td><select name="user_type">
                    <option value="0" selected="selected">Choose one</option>
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
					<option value="parent">Parent</option>
                      </select></td>
                </tr>
                <tr>
                  <td width="167">&nbsp; <br>
                    <br>
                    <br>
                    <br></td>
                  <td><input class="btn" name="action" type="submit"  value="Admin_Register"></td>
              </table>
            </div>
          </form>
        </div>
        <p>&nbsp;</p>
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