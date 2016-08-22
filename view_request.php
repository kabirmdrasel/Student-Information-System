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
        		<li  class="selected"><a href="index.php">Home</a></li>
                <li><a href="about.php">About School</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="photos.php">Photo Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
        	</ul>
        </div>
 <h2 id=title>View Conversation</h2>    
    <div id="container">
  <div id="main">     
    <div id="maincol_container1">
      <div class="maincol_middle">
            <div class="maincol1">          
<?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.request order by id desc");
		echo "<table border=\"1\" width=\"100%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">From</th>";
		echo "<th style=\"background-color:#1D5174;\">To</th>";
		echo "<th style=\"background-color:#1D5174;\">E-Mail</th>";
		echo "<th style=\"background-color:#1D5174;\">Id</th>";
		echo "<th style=\"background-color:#1D5174;\">Message</th>";
		echo "<tr>";	
		while($user=mysql_fetch_array($sql))
		{
		echo "<tr style=\"color: #1D5174;\">";
		echo "<td>".$user['name']."</td>";
		echo "<td>".$user['tname']."</td>";
		echo "<td>".$user['email']."</td>";
		echo "<td>".$user['student_id']."</td>";
		echo "<td>".$user['message']."</td>";
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