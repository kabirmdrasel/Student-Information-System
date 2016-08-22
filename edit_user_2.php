<?php
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();
if(isset($_SESSION['username']) and isset($_SESSION['password'])){
$username=$_SESSION['username'];
?>

<?php
if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] != admin) and ($_SESSION['user_type'] != superadmin) and ($_SESSION['user_type'] != parent) and ($_SESSION['user_type'] != student)) {
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
<h2 id=title>Edit User</h2>      
    <div id="maincol_container4">
      <div class="maincol_middle">
        <div class="maincol">
            	
        <?php
        include("dbconnect.php");
		
		$sql=mysql_query("select * from bac.user where username='$username'");
	    $user=mysql_fetch_array($sql); 
	
		?>
             <form action="action.php" method="post" >
        	   <div align="center">
        	     <table width="60%" border="0" cellpadding="3">
        	       <tr>
        	         <td width="24%">Name </td>
        	         <td width="76%"><input class="form" name="name" id="name" type="text" size="34" value="<?php echo $user['name'];?>"/></td>
       	           </tr>
        	       <tr>
        	         <td>ID </td>
        	         <td><input class="form" name="student_id" id="student_id" type="text" size="34" value="<?php echo $user['student_id'];?>" /></td>
       	           </tr>
        	       <tr>
        	         <td>Email Address </td>
        	         <td><input class="form" name="email" id="email" type="text" size="34" value="<?php echo $user['email'];?>"/></td>
       	           </tr>
        	       <tr>
        	         <td>Date of Birth </td>
        	         <td><input class="form" name="dob" id="dob" type="text" size="34" value="<?php echo $user['dob'];?>"/></td>
       	           </tr>
        	       <tr>
        	         <td>Address </td>
        	         <td><textarea name="address" id="address" cols="25" rows="2"><?php echo $user['address'];?></textarea></td>
       	           </tr>
        	       <tr>
        	         <td>Contact Number </td>
        	         <td><input class="form" name="contactnumber" id="contactnumber" type="text" size="34" value="<?php echo $user['contactnumber'];?>"/></td>
       	           </tr>
        	       <tr>
        	         <td>Gender </td>
        	         <td>Male<input name="gender" id="gender1" type="radio" value="male" <?php if($user['gender']=='male'){echo "checked";}?> />
        	           Female<input name="gender" id="gender2" type="radio" value="female" <?php if($user['gender']=='female'){echo "checked";}?> />
        	           <input id="gender" type="hidden" value="female" />
       	             </td>
       	           </tr>
        	       <tr>
        	         <td>Qualification </td>
        	         <td>
        	           <input name="ssc" id="ssc" type="checkbox" value="ssc" <?php if($user['ssc']=='ssc'){echo "checked";}?> />SSC
        	           <input name="hsc" id="hsc" type="checkbox" value="hsc" <?php if($user['hsc']=='hsc'){echo "checked";}?>/>HSC
        	           <input name="alevel" id="alevel" type="checkbox" value="alevel" <?php if($user['alevel']=='alevel'){echo "checked";}?>/>A Level
        	           <input name="olevel" id="olevel" type="checkbox" value="olevel" <?php if($user['olevel']=='olevel'){echo "checked";}?>/>O Level
       	             </td>
       	           </tr>
        	       <tr>
        	         <td>Blood Group </td>
        	         <td>
        	           <select name="blood" id="blood" onFocus="return checkCheckBoxes();">
        	             <option value="0" selected="selected">Choose one</option>
        	             <option value="O+" <?php if($user['blood']=='O+'){echo "selected";}?>>O+</option>
        	             <option value="A+" <?php if($user['blood']=='A+'){echo "selected";}?>>A+</option>
        	             <option value="B+" <?php if($user['blood']=='B+'){echo "selected";}?>>B+</option>
        	             <option value="AB+" <?php if($user['blood']=='AB+'){echo "selected";}?>>AB+</option>
        	             <option value="O-" <?php if($user['blood']=='O-'){echo "selected";}?>>O-</option>
        	             <option value="A-" <?php if($user['blood']=='A-'){echo "selected";}?>>A-</option>
        	             <option value="B-" <?php if($user['blood']=='B-'){echo "selected";}?>>B-</option>
        	             <option value="AB-" <?php if($user['blood']=='AB-'){echo "selected";}?>>AB-</option>
        	             
        	             
       	               </select>
       	             </td>
       	           </tr>
        	       <tr>
        	         <td>Interest </td>
        	         <td>
        	           <select name="interest" id="interest" onFocus="return checkCheckBoxes();">
        	             <option value="0" selected="selected">Choose one</option>
        	             <option value="networking" <?php if($user['interest']=='networking'){echo "selected";}?>>Networking</option>
        	             <option value="database" <?php if($user['interest']=='database'){echo "selected";}?>>Database</option>
        	             <option value="programming" <?php if($user['interest']=='programming'){echo "selected";}?>>Programming</option>
        	             
        	             
       	               </select>
       	             </td>
       	           </tr>
        	       
        	       <tr>
        	         <td></td>
        	         <td><input name="eid" type="hidden" value="<?php echo $user['id'];?>"/></td>
       	           </tr>
        	       <tr>
				   <td><input class="btn" name="action" id="action" type="submit"  value="Save change"/></td>
       	           </tr>
       	         </table>
				 <table>
				 <tr>
				    <td width="330"align="center"  style="color:#69F;border-radius:10px" bgcolor="white" >
					<?php
					session_start();
					if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
					?> 
					</td>
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