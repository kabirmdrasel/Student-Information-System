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
<script src="js/ser_validation.js"></script>
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
			echo "<a class=\"menus\" style=\"font-family:Arial; font-size:16px;\" href=\"".$m['link'].".php\">".$m['link_name']."</a>";
			echo "<br>";
		}
		?> 
      </div>
      <div class="leftcol_bottom">
        <p>&nbsp;</p>
      </div>
    </div>
           <h2 id=title>Submit Exam Routine</h2>     
    <div id="maincol_container4">
      <div class="maincol_middle">
            <div class="maincol1">
          
<form action="action.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="539" border="1">
      

       <tr>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Subject</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Date</strong></td>
	  <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Time</strong></td>  
        </tr>

              <tr>
        <td>
        <input type="text" name="subject" id="subject" size="33">

        </td>
        <td><input type="text" name="date" id="date"></td>
        <td><input type="text" name="time" id="time"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="subject1" id="subject1" size="33">
        </td>
        <td><input type="text" name="date1" id="date1"></td>
        <td><input type="text" name="time1" id="time1"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="subject2" id="subject2" size="33">
        </td>
        <td><input type="text" name="date2" id="date2"></td>
        <td><input type="text" name="time2" id="time2"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="subject3" id="subject3" size="33">
        </td>
        <td><input type="text" name="date3" id="date3"></td>
        <td><input type="text" name="time3" id="time3"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="subject4" id="subject4" size="33">
        </td>
        <td><input type="text" name="date4" id="date4"></td>
        <td><input type="text" name="time4" id="time4"></td>
       
       </tr>
</table>
<table>
    <tr>
				  <td>Year & Semester: </td>
                    <td><select name="semester">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="1.1">1styear 1stSemester</option>
                    <option value="1.2">1styear 2ndSemester</option>
					<option value="2.1">2ndyear 1stSemester</option>
                    <option value="2.2">2ndyear 2ndSemester</option>
					<option value="3.1">3rdyear 1stSemester</option>
                    <option value="3.2">3rdyear 2ndSemester</option>
					<option value="4.1">4thyear 1stSemester</option>
                    <option value="4.2">4thyear 2ndSemester</option>
					</select>
       </td><td width="120"></td>
				  <td>Type: </td>
                    <td><select name="type">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="Final">Final</option>
                    <option value="Clearence">Clearence</option>
					<option value="Carry">Carry</option>
					</select>
       </td>	   
	</tr> 
</table>
<table>
	<tr>
	    <td width="310" align="center"  style="color:#69F;border-radius:10px" bgcolor="#AFD3EB" >
           <?php
            session_start();
	    if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
	    ?> 
	    </td> 
	<td width="70"></td>
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="Submit Exam Routine"> 
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
        <div class="left_footer"><a href="home.php">Home</a> &nbsp;|<a href="profile.php">Profile</a> &nbsp;|<a href="registration.php">Registration</a> &nbsp;|<a href="change_password.php">Change Password</a>&nbsp;|<a href="logout.php">Logout</a></div> 
        <div class="right_footer"><a href="privacy.php">Privacy Policy</a>&nbsp;| <a> Copyright &copy; 2014 &nbsp;| <a href="rsj.php">Designed By RSJ Developers</a></a>
    </div>   
    
    
</div>
</body>
</html>
<?php        
}
else
{header("Location:index.php");}
?>