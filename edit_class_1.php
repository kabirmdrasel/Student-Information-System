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
<script src="js/edit_validation.js"></script>
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
<h2 id=title>Edit Class Routine</h2>     
    <div id="maincol_container">
      <div class="maincol_middle">
        <div class="maincol1">
        <?php
        include("dbconnect.php");
		$eid=$_GET['eid'];
		
		$sql=mysql_query("select * from bac.class where id='$eid'");
	 $user=mysql_fetch_array($sql); 
	
		?>
             <form action="action.php" method="post" >
        	   <div align="center">
    <table width="400" border="1">
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
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Year & <br>Semester</strong></td> 
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>5:10 to <br>6:00</strong></font></td>		
       </tr>

        <tr>
        <td><input type="text" name="day" id="day" size="5" value="<?php echo $user['day'];?>"></td>
        <td><input type="text" name="1" id="1" size="5" value="<?php echo $user['a'];?>"></td>
        <td><input type="text" name="2" id="2"  size="5" value="<?php echo $user['b'];?>"></td>
		<td><input type="text" name="3" id="3"  size="5" value="<?php echo $user['c'];?>"></td>
        <td><input type="text" name="4" id="4"  size="5" value="<?php echo $user['d'];?>"></td>
		<td><input type="text" name="5" id="5"  size="5" value="<?php echo $user['e'];?>"></td>
		<td><input type="text" name="6" id="6"  size="5" value="<?php echo $user['f'];?>"></td>
		<td><input type="text" name="7" id="7" size="5" value="<?php echo $user['g'];?>"></td>
        <td><input type="text" name="8" id="8"  size="5" value="<?php echo $user['h'];?>"></td>
		<td><input type="text" name="9" id="9"  size="5" value="<?php echo $user['i'];?>"></td>
        <td><input type="text" name="10" id="10"  size="5" value="<?php echo $user['j'];?>"></td>
		<td><input type="text" name="222" id="222"  size="5" value="<?php echo $user['k'];?>"></td>
		<td><input type="text" name="333" id="333"  size="5" value="<?php echo $user['l'];?>"></td>
		<td><input type="text" name="ays" id="ays"  size="10" value="<?php echo $user['ays'];?>"></td>
		<td><input type="text" name="section" id="section"  size="5" value="<?php echo $user['section'];?>"></td>
        </tr>

<!-- -->
		<tr>
		<td></td>
        	         <td><input name="eid" type="hidden" value="<?php echo $user['id'];?>"/></td>
       	           </tr>
				   </table>
				   <table>
        	       <tr>
		<td width="330" align="center"  style="color:#69F;border-radius:10px" bgcolor="#AFD3EB" >
           <?php
            session_start();
	    if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
	    ?> 
	    </td> 
       <td>
        	         <td><input class="btn" name="action" id="action" type="submit"  value="Change Class Routine"/></td>
       	           </tr>
       	         </table>
      	     </div>
          </form>                
        
        </div>
        <br>
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