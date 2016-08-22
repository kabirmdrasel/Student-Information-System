<?php
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);

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
<h2 id=title>View Class Routine</h2>     
    <div id="maincol_container">
      <div class="maincol_middle">
        <div class="maincol1">         
<form action="view_class.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="939">
    <tr>          
                  <td width="80"></td>	<td>Academic Year & Semester:</td>
                    <td><select name="ays">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="1.1">1st year 1st Semester</option>
                    <option value="1.2">1st year 2nd Semester</option>
					<option value="2.1">2nd year 1st Semester</option>
                    <option value="2.2">2nd year 2nd Semester</option>
					<option value="3.1">3rd year 1st Semester</option>
                    <option value="3.2">3rd year 2nd Semester</option>
					<option value="4.1">4th year 1st Semester</option>
                    <option value="4.2">4th year 2nd Semester</option>
					</select></td>
									
				  <td>Enter Section: </td>
                    <td><select name="section">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
					<option value="c">C</option>
					</select>
					</td>
	   <td>
          <input class="btn" name="action" id="action" type="submit"  value="Search Class Routine">
       </td>
	</tr>
	</table>
  </div>
</form>   
       <?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.class where ays='$_POST[ays]' and section='$_POST[section]'");		
		echo "<table border=\"1\" width=\"147%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">Day</th>";
		echo "<th style=\"background-color:#1D5174;\">8:00 to <br>8:50</th>";
		echo "<th style=\"background-color:#1D5174;\">8:50 to <br>9:40</th>";
		echo "<th style=\"background-color:#1D5174;\">9:40 to <br>10:30</th>";
		echo "<th style=\"background-color:#1D5174;\">10:30 to <br>11:20</th>";
		echo "<th style=\"background-color:#1D5174;\">11:20 to <br>12:10</th>";
		echo "<th style=\"background-color:#1D5174;\">12:10 to <br>1:00</th>";
		echo "<th style=\"background-color:#1D5174;\">1:00 to <br>1:50</th>";
		echo "<th style=\"background-color:#1D5174;\">1:50 to <br>2:40</th>";
		echo "<th style=\"background-color:#1D5174;\">2:40 to <br>3:30</th>";
		echo "<th style=\"background-color:#1D5174;\">3:30 to <br>4:20</th>";
		echo "<th style=\"background-color:#1D5174;\">4:20 to <br>5:10</th>";
		echo "<th style=\"background-color:#1D5174;\">5:10 to <br>6:00</th>";
		echo "<tr>";	
		while($user=mysql_fetch_array($sql))
		{
		echo "<tr  style=\"color: #1D5174;\">";
		echo "<td>".$user['day']."</td>";
		echo "<td>".$user['a']."</td>";
		echo "<td>".$user['b']."</td>";
		echo "<td>".$user['c']."</td>";
		echo "<td>".$user['d']."</td>";
		echo "<td>".$user['e']."</td>";
		echo "<td>".$user['f']."</td>";
		echo "<td>".$user['g']."</td>";
		echo "<td>".$user['h']."</td>";
		echo "<td>".$user['i']."</td>";
		echo "<td>".$user['j']."</td>";
		echo "<td>".$user['k']."</td>";
		echo "<td>".$user['l']."</td>";
		echo "<tr>";		
		}
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