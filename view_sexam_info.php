<?php
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();
?>

<html>
<head>
<title>PHP Project</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/reg_validation.js"></script>
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
    <div id="leftcol_container">
      <div class="leftcol">
        	<h2 id=title1>Search Year & Semester</h2>
            <br>
            		<form action="view_exam_info.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="60">
	<tr>
                  <td>Year & Semester: </td>
    </tr>
    <tr>	
	   <td><select name="semester">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="1.1">1st year 1st Semester</option>
                    <option value="1.2">1st year 2nd Semester</option>
					<option value="2.1">2nd year 1st Semester</option>
                    <option value="2.2">2nd year 2nd Semester</option>
					<option value="3.1">3rd year 1st Semester</option>
                    <option value="3.2">3rd year 2nd Semester</option>
					<option value="4.1">4th year 1st Semester</option>
                    <option value="4.2">4th year 2nd Semester</option>
					</select>
					</td>
					</tr>
		<tr>
		<td>Type: </td>
		</tr>
		<tr>
                    <td><select name="type">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="Final">Final</option>
                    <option value="Clearence">Clearence</option>
					<option value="Carry">Carry</option>
					</select>
                    </td> 
		</tr>
		<tr></tr>
        <tr>
		<td>
          <input class="btn" name="action" id="action" type="submit"  value="  Search  ">
       </td>
					</tr>
</table>
  </div>
</form  
<!--nothing-->
      </div>
    </div>
     <h2 id=title>View Exam Info</h2>   
    <div id="maincol_container3">
      <div class="maincol_middle">
            <div class="maincol1">
          
<?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.exam_info where semester='$_POST[semester]' and type='$_POST[type]'");		
		echo "<table border=\"1\" width=\"100%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">Id Range</th>";
		echo "<th style=\"background-color:#1D5174;\">Room No.</th>";
		echo "<th style=\"background-color:#1D5174;\">Level</th>";
		echo "<th style=\"background-color:#1D5174;\">Semester</th>";
		echo "<th style=\"background-color:#1D5174;\">Type</th>";
		echo "<tr>";	
		while($user=mysql_fetch_array($sql))
		{
		echo "<tr  style=\"color: #1D5174;\">";
		echo "<td>".$user['id_range']."</td>";
		echo "<td>".$user['room']."</td>";
		echo "<td>".$user['level']."</td>";
		echo "<td>".$user['semester']."</td>";
		echo "<td>".$user['type']."</td>";
		}
		echo "<tr>";		
		echo "</table>";
?>	

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