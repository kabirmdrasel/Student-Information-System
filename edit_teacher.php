<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();

error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);
?>
<?php
if(isset($_SESSION['username']) and isset($_SESSION['password'])){
	
	
include("dbconnect.php");
if($_GET['did']){mysql_query("delete from teacher where id='$_GET[did]'"); }
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
<script language="javascript">
function deluser(did)
{
	var msg=confirm("Are you sure you want to delete this?");
	if(msg)
	{window.location="edit_teacher.php?did="+did;}
	
	
	}
</script>
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
<h2 id=title>Edit Teacher/Other Staff</h2>     
    <div id="maincol_container4">
      <div class="maincol_middle">
        <div class="maincol1">         
<form action="edit_teacher.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="639">
    <tr>
				  <td>Type: </td>
                    <td><select name="type">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="Head">Head</option>
                    <option value="Teacher">Teacher</option>
					<option value="Staff">Other Staff</option>
					</select>
       </td>	   
        <td width="150"></td>
	<td width="500"></td>
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="Search Teacher/Other Staff"> 
	    </td>  
    </tr>
</table>
  </div>
</form>
        <?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.teacher where type='$_POST[type]'");		
		echo "<table border=\"1\" width=\"100%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">Name</th>";
		echo "<th style=\"background-color:#1D5174;\">Designation</th>";
		echo "<th style=\"background-color:#1D5174;\">Phone</th>";
		echo "<th style=\"background-color:#1D5174;\">Email</th>";
		echo "<th style=\"background-color:#1D5174;\">Type</th>";
		echo "<th style=\"background-color:#1D5174;\">Edit</th>";
		echo "<th style=\"background-color:#1D5174;\">Delete</th>";
		echo "<tr>";	
		while($user=mysql_fetch_array($sql))
		{
		echo "<tr  style=\"color: #1D5174;\">";
		echo "<td>".$user['name']."</td>";
		echo "<td>".$user['designation']."</td>";
		echo "<td>".$user['phone']."</td>";
		echo "<td>".$user['email']."</td>";
		echo "<td>".$user['type']."</td>";
		echo "<td><a href=\"edit_teacher_1.php?eid=".$user['id']."\">Edit</a></td>";
		echo "<td><a class=\"foot_style\" href=\"javascript:deluser(did=$user[id])\">Delete</a></td>";

		echo "<tr>";		
		}
		echo "</table>";
		?>
        
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
{trigger_error("You are not Admin");}
?>