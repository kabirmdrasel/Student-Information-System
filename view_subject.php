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
        		<li class="selected"><a href="index.php">Home</a></li>
                <li><a href="about.php">About School</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="photos.php">Photo Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
        	</ul>
        </div>
    
    <div id="container">
  <div id="main">
    <div id="leftcol_container">
      <div class="leftcol">
        	<h2 id=title1>Search Year & Semester</h2>
            <br>
            		<form action="view_subject.php" method="post" onSubmit="return validate(this)">

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
     <h2 id=title>View Subject</h2>   
    <div id="maincol_container4">
      <div class="maincol_middle">
            <div class="maincol1">
          
        <?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.subject where semester='$_POST[semester]'");		
		echo "<table border=\"1\" width=\"100%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">Theory</th>";
		echo "<th style=\"background-color:#1D5174;\">Credit</th>";
		echo "<th style=\"background-color:#1D5174;\">Lab</th>";
		echo "<th style=\"background-color:#1D5174;\">Credit</th>";
		echo "<th style=\"background-color:#1D5174;\">Semester</th>";
		echo "<tr>";	
		while($user=mysql_fetch_array($sql))
		{
		echo "<tr  style=\"color: #1D5174;\">";
		echo "<td>".$user['theory']."</td>";
		echo "<td>".$user['credit_1']."</td>";
		echo "<td>".$user['lab']."</td>";
		echo "<td>".$user['credit_2']."</td>";
		echo "<td>".$user['semester']."</td>";
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