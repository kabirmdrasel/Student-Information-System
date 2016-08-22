<?php
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);

session_start();?>
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
        		<li><a href="index.php">Home</a></li>
                <li><a href="about.php">About School</a></li>
                <li  class="selected"><a href="registration.php">Registration</a></li>
                <li><a href="photos.php">Photo Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
        	</ul>
        </div>
         <h2 id=title>Registration</h2>	         
    <div id="maincol_container1">
      <div class="maincol_middle">
            <div class="maincol">
          
<form action="action.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="639" border="0">
	        <tr height="20px" ></tr>
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
            <td><input type="text" name="username" id="username" size="34" ><?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
			?></td>
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
        <td><input type="text" name="dob" id="dob" size="34" value="(DAY-MONTH-YEAR)" onClick="this.value = ''"></td>
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
        <td width="167">Qualification </td>
            <td>
            	<input name="ssc" type="checkbox" value="ssc" />SSC
                <input name="hsc" type="checkbox" value="hsc" />HSC
                <input name="olevel" type="checkbox" value="olevel" />O Level
                <input name="alevel" type="checkbox" value="alevel" />A Level
            </td>
        </tr>
      
      <tr>
        <td width="167"> Gender </td>
        <td><input type="radio" name="gender" value="female"> Female
          <input type="radio" name="gender" value="male">Male</td>
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
            <td>
            	<select name="interest">
            	  <option value="0" selected="selected">Choose one</option>
            	  <option value="networking">Networking</option>
            	  <option value="database">Database</option>
            	  <option value="programming">Programming</option>
                
                
                </select>
            </td>
          </tr>
      
      
      <tr>
        <td width="167">&nbsp; <br> <br> <br> <br></td>
         
        <td>
          <input class="btn" name="action" type="submit"  value="Register"></td>
          

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