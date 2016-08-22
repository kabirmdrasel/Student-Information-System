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
if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] != admin) and ($_SESSION['user_type'] != superadmin)) {
    header('Location: profile.php');
    exit;
}
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
        		<li class="selected"><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="account_info.php">Account Info</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
        	</ul>
        </div>
    
    <div id="container">
  <div id="main">
<h2 id=title>Submit Lab Result</h2>     
    <div id="maincol_container">
      <div class="maincol_middle">
            <div class="maincol1">
          
<form action="action.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="990" border="1">
      

       <tr>
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Day</strong></font></td>
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>8:00 to <br>8:50</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>8:50 to <br>9:40</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>9:40 to <br>10:30</strong></td>
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>10:30 to <br>11:20</strong></td> 
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>11:20 to <br>12:10</strong></font></td> 
		<td align="center" style="background-color: #1D5174;"><font color="white"><strong>12:10 to <br>1:00</strong></font></td>
		<td align="center" style="background-color: #1D5174;"><font color="white"><strong>1:00 to <br>1:50</strong></td>
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>1:50 to <br>2:40</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>2:40 to <br>3:30</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>3:30 to <br>4:20</strong></td>
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>4:20 to <br>5:10</strong></td> 
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>5:10 to <br>6:00</strong></font></td> 		
       </tr>

        <tr>
        <td><input type="text" name="day" id="day" size="5"></td>
        <td><input type="text" name="1" id="1" size="9"></td>
        <td><input type="text" name="2" id="2"  size="9"></td>
		<td><input type="text" name="3" id="3"  size="9"></td>
        <td><input type="text" name="4" id="4"  size="9"></td>
		<td><input type="text" name="5" id="5"  size="9"></td>
		<td><input type="text" name="6" id="6"  size="9"></td>
		<td><input type="text" name="7" id="7" size="9"></td>
        <td><input type="text" name="8" id="8"  size="9"></td>
		<td><input type="text" name="9" id="9"  size="9"></td>
        <td><input type="text" name="10" id="10"  size="9"></td>
		<td><input type="text" name="222" id="222"  size="9"></td>
		<td><input type="text" name="333" id="333"  size="9"></td>
        </tr>
		
		<tr>
        <td><input type="text" name="day1" id="day1" size="5"></td>
        <td><input type="text" name="11" id="11" size="9"></td>
        <td><input type="text" name="21" id="21"  size="9"></td>
		<td><input type="text" name="31" id="31"  size="9"></td>
        <td><input type="text" name="41" id="41"  size="9"></td>
		<td><input type="text" name="51" id="51"  size="9"></td>
		<td><input type="text" name="61" id="61"  size="9"></td>
		<td><input type="text" name="71" id="71" size="9"></td>
        <td><input type="text" name="81" id="81"  size="9"></td>
		<td><input type="text" name="91" id="91"  size="9"></td>
        <td><input type="text" name="101" id="101"  size="9"></td>
		<td><input type="text" name="111" id="111"  size="9"></td>
		<td><input type="text" name="121" id="121"  size="9"></td>
        </tr>
		
		<tr>
        <td><input type="text" name="day2" id="day2" size="5"></td>
        <td><input type="text" name="12" id="12" size="9"></td>
        <td><input type="text" name="22" id="22"  size="9"></td>
		<td><input type="text" name="32" id="32"  size="9"></td>
        <td><input type="text" name="42" id="42"  size="9"></td>
		<td><input type="text" name="52" id="52"  size="9"></td>
		<td><input type="text" name="62" id="62"  size="9"></td>
		<td><input type="text" name="72" id="72" size="9"></td>
        <td><input type="text" name="82" id="82"  size="9"></td>
		<td><input type="text" name="92" id="92"  size="9"></td>
        <td><input type="text" name="102" id="102"  size="9"></td>
		<td><input type="text" name="112" id="112"  size="9"></td>
		<td><input type="text" name="122" id="122"  size="9"></td>
        </tr>
		
		<tr>
        <td><input type="text" name="day3" id="day3" size="5"></td>
        <td><input type="text" name="13" id="13" size="9"></td>
        <td><input type="text" name="23" id="23"  size="9"></td>
		<td><input type="text" name="33" id="33"  size="9"></td>
        <td><input type="text" name="43" id="43"  size="9"></td>
		<td><input type="text" name="53" id="53"  size="9"></td>
		<td><input type="text" name="63" id="63"  size="9"></td>
		<td><input type="text" name="73" id="73" size="9"></td>
        <td><input type="text" name="83" id="83"  size="9"></td>
		<td><input type="text" name="93" id="93"  size="9"></td>
        <td><input type="text" name="103" id="103"  size="9"></td>
		<td><input type="text" name="113" id="113"  size="9"></td>
		<td><input type="text" name="123" id="123"  size="9"></td>
        </tr>
		
	    <tr>
        <td><input type="text" name="day4" id="day4" size="5"></td>
        <td><input type="text" name="14" id="14" size="9"></td>
        <td><input type="text" name="24" id="24"  size="9"></td>
		<td><input type="text" name="34" id="34"  size="9"></td>
        <td><input type="text" name="44" id="44"  size="9"></td>
		<td><input type="text" name="54" id="54"  size="9"></td>
		<td><input type="text" name="64" id="64"  size="9"></td>
		<td><input type="text" name="74" id="74" size="9"></td>
        <td><input type="text" name="84" id="84"  size="9"></td>
		<td><input type="text" name="94" id="94"  size="9"></td>
        <td><input type="text" name="104" id="104"  size="9"></td>
		<td><input type="text" name="114" id="114"  size="9"></td>
		<td><input type="text" name="124" id="124"  size="9"></td>
        </tr>
		
		<tr>
        <td><input type="text" name="day5" id="day5" size="5"></td>
        <td><input type="text" name="15" id="15" size="9"></td>
        <td><input type="text" name="25" id="25"  size="9"></td>
		<td><input type="text" name="35" id="35"  size="9"></td>
        <td><input type="text" name="45" id="45"  size="9"></td>
		<td><input type="text" name="55" id="55"  size="9"></td>
		<td><input type="text" name="65" id="65"  size="9"></td>
		<td><input type="text" name="75" id="75" size="9"></td>
        <td><input type="text" name="85" id="85"  size="9"></td>
		<td><input type="text" name="95" id="95"  size="9"></td>
        <td><input type="text" name="105" id="105"  size="9"></td>
		<td><input type="text" name="115" id="115"  size="9"></td>
		<td><input type="text" name="125" id="125"  size="9"></td>
        </tr>
		
		<tr>
        <td><input type="text" name="day6" id="day6" size="5"></td>
        <td><input type="text" name="16" id="16" size="9"></td>
        <td><input type="text" name="26" id="26"  size="9"></td>
		<td><input type="text" name="36" id="36"  size="9"></td>
        <td><input type="text" name="46" id="46"  size="9"></td>
		<td><input type="text" name="56" id="56"  size="9"></td>
		<td><input type="text" name="66" id="66"  size="9"></td>
		<td><input type="text" name="76" id="76" size="9"></td>
        <td><input type="text" name="86" id="86"  size="9"></td>
		<td><input type="text" name="96" id="96"  size="9"></td>
        <td><input type="text" name="106" id="106"  size="9"></td>
		<td><input type="text" name="116" id="116"  size="9"></td>
		<td><input type="text" name="126" id="126"  size="9"></td>
        </tr>		
       </table>
<table width="990">
    <tr><td width="100"></td>
				   <td>Academic Year & Semester: </td>
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
					</select>
					</td>
					
					<td>Enter Section:</td>
                    <td><select name="section">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
					<option value="c">C</option>
					</select></td>
					</tr>
					</table>
</table>
<table>
	<tr><td width="400"></td>
	    <td width="330" align="center"  style="color:#69F;border-radius:10px" bgcolor="#AFD3EB" >
           <?php
            session_start();
	    if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
	    ?> 
	    </td> 
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="  Submit Class Routine  ">
       </td>
    </tr> 
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