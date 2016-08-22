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

<?php extract($_POST);$fileName=$_FILES["files"]["name"];?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Project</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
    	</div>
    </div>  
    <div id="maincol_container3">
      <div class="maincol_middle">
        <div class="maincol1">
      
        <h2 id=title><?php if(isset($_SESSION['name'])){
    echo "Welcome {$_SESSION['name']}";
}?></h2>
  <p align="center" style="background-color:#663456; font-family:Arial, Helvetica, sans-serif; font-size:16px;"> <?php
                    session_start();
					
					if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
					
					?> </p>

<table width="158" height="246" border="1" cellpadding="5" align="left">
  <tr>
    <td width="144"><?php
	session_start();
    
	move_uploaded_file($_FILES["files"]["tmp_name"], "image/".$fileName);
	?>
      <img src="image/<?php echo $fileName;?>" alt="" width="189" height="238" />
	</td>
  </tr>
<br>
<p style="font-family:Tahoma, Geneva, sans-serif; font-size:16px;">
<?php
include("dbconnect.php");
$name = $_SESSION['username'];
$pass = $_SESSION['password'];
$sql=mysql_query("select * from bac.user where username='$name' and password='$pass' ");
						$cnt=mysql_num_rows($sql);
					$data=mysql_fetch_array($sql);	

echo "<table border=\"1\" width=\"60%\" style=\"color: #1D5174;\">";
		echo "<tr>";
		echo "<th width=\"35%\">Name</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['name']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Student ID</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['student_id']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>User Name</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['username']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Email</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['email']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Date of Birth</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['dob']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Address</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['address']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Contact No.</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['contactnumber']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Gender</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['gender']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Blood Group</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['blood']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Interest</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['interest']."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>User Type</th>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;".$data['user_type']."</td>";
		echo "</tr>";	
			
		echo "</table>";
?>
</p>
&nbsp;
<p>&nbsp;</p>
        </div>
        <br>
      
                    
                    
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