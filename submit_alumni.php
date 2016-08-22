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
     <h2 id=title>Submit Alumni</h2>  
    <div id="maincol_container4">
      <div class="maincol_middle">
            <div class="maincol1">
         
<form action="action.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="639" border="1">
      

       <tr>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Student Id</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Name Of The Candidate</strong></td>
		<td align="center" style="background-color: #1D5174;"><font color="white"><strong>CGPA(On Scale Of 4)</strong></font></td>  
        </tr>


       <tr>
        <td>
        <input type="text" name="student_id" id="student_id" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name" id="name" size="40"></td>
        <td><input type="text" name="cgpa" id="cgpa" size="22"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id1" id="student_id1" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
	    ?>
        </td>
        <td><input type="text" name="name1" id="name1" size="40"></td>
        <td><input type="text" name="cgpa1" id="cgpa1" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id2" id="student_id2" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name2" id="name2" size="40"></td>
        <td><input type="text" name="cgpa2" id="cgpa2" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id3" id="student_id3" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name3" id="name3" size="40"></td>
        <td><input type="text" name="cgpa3" id="cgpa3" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id4" id="student_id4" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name4" id="name4" size="40"></td>
        <td><input type="text" name="cgpa4" id="cgpa4" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id5" id="student_id5" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name5" id="name5" size="40"></td>
        <td><input type="text" name="cgpa5" id="cgpa5" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id6" id="student_id6" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name6" id="name6" size="40"></td>
        <td><input type="text" name="cgpa6" id="cgpa6" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id7" id="student_id7" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name7" id="name7" size="40"></td>
        <td><input type="text" name="cgpa7" id="cgpa7" size="22"</td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id8" id="student_id8" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name8" id="name8" size="40"></td>
        <td><input type="text" name="cgpa8" id="cgpa8" size="22"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id9" id="student_id9" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name9" id="name9" size="40"></td>
        <td><input type="text" name="cgpa9" id="cgpa9" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id10" id="student_id10" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name10" id="name10" size="40"></td>
        <td><input type="text" name="cgpa10" id="cgpa10" size="22"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id11" id="student_id11" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name11" id="name11" size="40"></td>
        <td><input type="text" name="cgpa11" id="cgpa11" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id12" id="student_id12" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name12" id="name12" size="40"></td>
        <td><input type="text" name="cgpa12" id="cgpa12" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id13" id="student_id13" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name13" id="name13" size="40"></td>
        <td><input type="text" name="cgpa13" id="cgpa13" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id14" id="student_id14" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name14" id="name14" size="40"></td>
        <td><input type="text" name="cgpa14" id="cgpa14" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id15" id="student_id15" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name15" id="name15" size="40"></td>
        <td><input type="text" name="cgpa15" id="cgpa15" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id16" id="student_id16" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name16" id="name16" size="40"></td>
        <td><input type="text" name="cgpa16" id="cgpa16" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id17" id="student_id17" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name17" id="name17" size="40"></td>
        <td><input type="text" name="cgpa17" id="cgpa17" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id18" id="student_id18" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name18" id="name18" size="40"></td>
        <td><input type="text" name="cgpa18" id="cgpa18" size="22"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id19" id="student_id19" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name19" id="name19" size="40"></td>
        <td><input type="text" name="cgpa19" id="cgpa19" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id20" id="student_id20" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name20" id="name20" size="40"></td>
        <td><input type="text" name="cgpa20" id="cgpa20" size="22"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id21" id="student_id21" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name21" id="name21" size="40"></td>
        <td><input type="text" name="cgpa21" id="cgpa21" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id22" id="student_id22" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name22" id="name22" size="40"></td>
        <td><input type="text" name="cgpa22" id="cgpa22" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id23" id="student_id23" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name23" id="name23" size="40"></td>
        <td><input type="text" name="cgpa23" id="cgpa23" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id24" id="student_id24" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name24" id="name24" size="40"></td>
        <td><input type="text" name="cgpa24" id="cgpa24" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id25" id="student_id25" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name25" id="name25" size="40"></td>
        <td><input type="text" name="cgpa25" id="cgpa25" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id26" id="student_id26" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name26" id="name26" size="40"></td>
        <td><input type="text" name="cgpa26" id="cgpa26" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id27" id="student_id27" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name27" id="name27" size="40"></td>
        <td><input type="text" name="cgpa27" id="cgpa27" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id28" id="student_id28" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name28" id="name28" size="40"></td>
        <td><input type="text" name="cgpa28" id="cgpa28" size="22"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id29" id="student_id29" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name29" id="name29" size="40"></td>
        <td><input type="text" name="cgpa29" id="cgpa29" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id30" id="student_id30" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name30" id="name30" size="40"></td>
        <td><input type="text" name="cgpa30" id="cgpa30" size="22"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id31" id="student_id31" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name31" id="name31" size="40"></td>
        <td><input type="text" name="cgpa31" id="cgpa31" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id32" id="student_id32" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name32" id="name32" size="40"></td>
        <td><input type="text" name="cgpa32" id="cgpa32" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id33" id="student_id33" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name33" id="name33" size="40"></td>
        <td><input type="text" name="cgpa33" id="cgpa33" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id34" id="student_id34" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name34" id="name34" size="40"></td>
        <td><input type="text" name="cgpa34" id="cgpa34" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id35" id="student_id35" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name35" id="name35" size="40"></td>
        <td><input type="text" name="cgpa35" id="cgpa35" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id36" id="student_id36" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name36" id="name36" size="40"></td>
        <td><input type="text" name="cgpa36" id="cgpa36" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id37" id="student_id37" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name37" id="name37" size="40"></td>
        <td><input type="text" name="cgpa37" id="cgpa37" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id38" id="student_id38" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name38" id="name38" size="40"></td>
        <td><input type="text" name="cgpa38" id="cgpa38" size="22"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id39" id="student_id39" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name39" id="name39" size="40"></td>
        <td><input type="text" name="cgpa39" id="cgpa39" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id40" id="student_id40" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name40" id="name40" size="40"></td>
        <td><input type="text" name="cgpa40" id="cgpa40" size="22"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id41" id="student_id41" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name41" id="name41" size="40"></td>
        <td><input type="text" name="cgpa41" id="cgpa41" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id42" id="student_id42" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name42" id="name42" size="40"></td>
        <td><input type="text" name="cgpa42" id="cgpa42" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id43" id="student_id43" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name43" id="name43" size="40"></td>
        <td><input type="text" name="cgpa43" id="cgpa43" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id44" id="student_id44" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name44" id="name44" size="40"></td>
        <td><input type="text" name="cgpa44" id="cgpa44" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id45" id="student_id45" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name45" id="name45" size="40"></td>
        <td><input type="text" name="cgpa45" id="cgpa45" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id46" id="student_id46" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name46" id="name46" size="40"></td>
        <td><input type="text" name="cgpa46" id="cgpa46" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id47" id="student_id47" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name47" id="name47" size="40"></td>
        <td><input type="text" name="cgpa47" id="cgpa47" size="22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id48" id="student_id48" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name48" id="name48" size="40"></td>
        <td><input type="text" name="cgpa48" id="cgpa48" size="22"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id49" id="student_id49" size="30">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="name49" id="name49" size="40"></td>
        <td><input type="text" name="cgpa49" id="cgpa49" size="22"></td>
       
       </tr>
       </table>
<table>
    <tr>
                  <td>Enter Year: </td>
                  <td><select name="year">
                    <option value="0" selected="selected">Chose One</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
					<option value="2000">2000</option>
                    <option value="2001">2001</option>
					<option value="2002">2002</option>
					<option value="2003">2003</option>
					<option value="2004">2004</option>
					<option value="2005">2005</option>
					<option value="2006">2006</option>
					<option value="2007">2007</option>
					<option value="2008">2008</option>
					<option value="2009">2009</option>
					<option value="2010">2010</option>
                    <option value="2011">2011</option>
					<option value="2012">2012</option>
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
                    <option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>					
					<option value="2030">2030</option>
                    <option value="2031">2031</option>
					<option value="2032">2032</option>
					<option value="2033">2033</option>
					<option value="2034">2034</option>
					<option value="2035">2035</option>
					<option value="2036">2036</option>
					<option value="2037">2037</option>
					<option value="2038">2038</option>
					<option value="2039">2039</option>
					<option value="2040">2040</option>
                    <option value="2041">2041</option>
					<option value="2042">2042</option>
					<option value="2043">2043</option>
					<option value="2044">2044</option>
					<option value="2045">2045</option>
					<option value="2046">2046</option>
					<option value="2047">2047</option>
					<option value="2048">2048</option>
					<option value="2049">2049</option>
					<option value="2050">2050</option>
                    </select>
		<td width="230" align="center"  style="color:#69F;border-radius:10px" bgcolor="#AFD3EB" >
           <?php
            session_start();
	    if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
	    ?> 
	    </td> 
       <td>
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="      Submit Alumni      ">
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