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
<h2 id=title>Submit Lab Result</h2>     
    <div id="maincol_container4">
      <div class="maincol_middle">
            <div class="maincol1">
          
<form action="action.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="639" border="1">
      

       <tr>
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Student Id</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Online</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Attendence</strong></td>
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Mid Term</strong></td> 
	    <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Final Exam</strong></font></td> 
		<td align="center" style="background-color: #1D5174;"><font color="white"><strong>Assaingment<br>/Project</strong></font></td> 		
       </tr>


        <tr>
        <td>
        <input type="text" name="student_id" id="student_id" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online" id="online" size="10"></td>
        <td><input type="text" name="attendence" id="attendence"  size="15"></td>
		<td><input type="text" name="mid_term" id="mid_term"  size="10"></td>
        <td><input type="text" name="final_exam" id="final_exam"  size="13"></td>
		<td><input type="text" name="assignment_project" id="assignment_project"  size="14"></td>
        </tr>

<tr>
        <td>
        <input type="text" name="student_id1" id="student_id1" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online1" id="online1" size="10"></td>
        <td><input type="text" name="attendence1" id="attendence1"  size="15"></td>
		<td><input type="text" name="mid_term1" id="mid_term1"  size="10"></td>
        <td><input type="text" name="final_exam1" id="final_exam1"  size="13"></td>
		<td><input type="text" name="assignment_project1" id="assignment_project1"  size="14"></td>
        </tr>
		
		<tr>
        <td>
        <input type="text" name="student_id2" id="student_id2" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online2" id="online2" size="10"></td>
        <td><input type="text" name="attendence2" id="attendence2"  size="15"></td>
		<td><input type="text" name="mid_term2" id="mid_term2"  size="10"></td>
        <td><input type="text" name="final_exam2" id="final_exam2"  size="13"></td>
		<td><input type="text" name="assignment_project2" id="assignment_project2"  size="14"></td>
        </tr>
	   	
		<tr>
        <td>
        <input type="text" name="student_id4" id="student_id4" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online4" id="online4" size="10"></td>
        <td><input type="text" name="attendence4" id="attendence4"  size="15"></td>
		<td><input type="text" name="mid_term4" id="mid_term4"  size="10"></td>
        <td><input type="text" name="final_exam4" id="final_exam4"  size="13"></td>
		<td><input type="text" name="assignment_project4" id="assignment_project4"  size="14"></td>
        </tr>
		
		<tr>
        <td>
        <input type="text" name="student_id5" id="student_id5" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online5" id="online5" size="10"></td>
        <td><input type="text" name="attendence5" id="attendence5"  size="15"></td>
		<td><input type="text" name="mid_term5" id="mid_term5"  size="10"></td>
        <td><input type="text" name="final_exam5" id="final_exam5"  size="13"></td>
		<td><input type="text" name="assignment_project5" id="assignment_project5"  size="14"></td>
        </tr>
		
		<tr>
        <td>
        <input type="text" name="student_id6" id="student_id6" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online6" id="online6" size="10"></td>
        <td><input type="text" name="attendence6" id="attendence6"  size="15"></td>
		<td><input type="text" name="mid_term6" id="mid_term6"  size="10"></td>
        <td><input type="text" name="final_exam6" id="final_exam6"  size="13"></td>
		<td><input type="text" name="assignment_project6" id="assignment_project6"  size="14"></td>
        </tr>
		
		<tr>
        <td>
        <input type="text" name="student_id7" id="student_id7" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online7" id="online7" size="10"></td>
        <td><input type="text" name="attendence7" id="attendence7"  size="15"></td>
		<td><input type="text" name="mid_term7" id="mid_term7"  size="10"></td>
        <td><input type="text" name="final_exam7" id="final_exam7"  size="13"></td>
		<td><input type="text" name="assignment_project7" id="assignment_project7"  size="14"></td>
        </tr>
		
		<tr>
        <td>
        <input type="text" name="student_id8" id="student_id8" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online8" id="online8" size="10"></td>
        <td><input type="text" name="attendence8" id="attendence8"  size="15"></td>
		<td><input type="text" name="mid_term8" id="mid_term8"  size="10"></td>
        <td><input type="text" name="final_exam8" id="final_exam8"  size="13"></td>
		<td><input type="text" name="assignment_project8" id="assignment_project8"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id9" id="student_id9" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online9" id="online9" size="10"></td>
        <td><input type="text" name="attendence9" id="attendence9"  size="15"></td>
		<td><input type="text" name="mid_term9" id="mid_term9"  size="10"></td>
        <td><input type="text" name="final_exam9" id="final_exam9"  size="13"></td>
		<td><input type="text" name="assignment_project9" id="assignment_project9"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id10" id="student_id10" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online10" id="online10" size="10"></td>
        <td><input type="text" name="attendence10" id="attendence10"  size="15"></td>
		<td><input type="text" name="mid_term10" id="mid_term10"  size="10"></td>
        <td><input type="text" name="final_exam10" id="final_exam10"  size="13"></td>
		<td><input type="text" name="assignment_project10" id="assignment_project10"  size="14"></td>
        </tr>
		
		<tr>
        <td>
        <input type="text" name="student_id11" id="student_id11" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online11" id="online11" size="10"></td>
        <td><input type="text" name="attendence11" id="attendence11"  size="15"></td>
		<td><input type="text" name="mid_term11" id="mid_term11"  size="10"></td>
        <td><input type="text" name="final_exam11" id="final_exam11"  size="13"></td>
		<td><input type="text" name="assignment_project11" id="assignment_project11"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id12" id="student_id12" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online12" id="online12" size="10"></td>
        <td><input type="text" name="attendence12" id="attendence12"  size="15"></td>
		<td><input type="text" name="mid_term12" id="mid_term12"  size="10"></td>
        <td><input type="text" name="final_exam12" id="final_exam12"  size="13"></td>
		<td><input type="text" name="assignment_project12" id="assignment_project12"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id13" id="student_id13" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online13" id="online13" size="10"></td>
        <td><input type="text" name="attendence13" id="attendence13"  size="15"></td>
		<td><input type="text" name="mid_term13" id="mid_term13"  size="10"></td>
        <td><input type="text" name="final_exam13" id="final_exam13"  size="13"></td>
		<td><input type="text" name="assignment_project13" id="assignment_project13"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id14" id="student_id14" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online14" id="online14" size="10"></td>
        <td><input type="text" name="attendence12" id="attendence14"  size="15"></td>
		<td><input type="text" name="mid_term14" id="mid_term14"  size="10"></td>
        <td><input type="text" name="final_exam14" id="final_exam14"  size="13"></td>
		<td><input type="text" name="assignment_project14" id="assignment_project14"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id15" id="student_id15" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online15" id="online15" size="10"></td>
        <td><input type="text" name="attendence15" id="attendence15"  size="15"></td>
		<td><input type="text" name="mid_term15" id="mid_term15"  size="10"></td>
        <td><input type="text" name="final_exam15" id="final_exam15"  size="13"></td>
		<td><input type="text" name="assignment_project15" id="assignment_project15"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id16" id="student_id16" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online16" id="online16" size="10"></td>
        <td><input type="text" name="attendence16" id="attendence16"  size="15"></td>
		<td><input type="text" name="mid_term16" id="mid_term16"  size="10"></td>
        <td><input type="text" name="final_exam16" id="final_exam16"  size="13"></td>
		<td><input type="text" name="assignment_project16" id="assignment_project16"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id17" id="student_id17" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online17" id="online17" size="10"></td>
        <td><input type="text" name="attendence17" id="attendence17"  size="15"></td>
		<td><input type="text" name="mid_term17" id="mid_term17"  size="10"></td>
        <td><input type="text" name="final_exam17" id="final_exam17"  size="13"></td>
		<td><input type="text" name="assignment_project17" id="assignment_project17"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id18" id="student_id18" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online18" id="online18" size="10"></td>
        <td><input type="text" name="attendence18" id="attendence18"  size="15"></td>
		<td><input type="text" name="mid_term18" id="mid_term18"  size="10"></td>
        <td><input type="text" name="final_exam18" id="final_exam18"  size="13"></td>
		<td><input type="text" name="assignment_project18" id="assignment_project18"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id19" id="student_id19" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online19" id="online19" size="10"></td>
        <td><input type="text" name="attendence19" id="attendence19"  size="15"></td>
		<td><input type="text" name="mid_term19" id="mid_term19"  size="10"></td>
        <td><input type="text" name="final_exam19" id="final_exam19"  size="13"></td>
		<td><input type="text" name="assignment_project19" id="assignment_project19"  size="14"></td>
        </tr>
		<tr>
        <td>
        <input type="text" name="student_id20" id="student_id20" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online20" id="online20" size="10"></td>
        <td><input type="text" name="attendence20" id="attendence20"  size="15"></td>
		<td><input type="text" name="mid_term20" id="mid_term20"  size="10"></td>
        <td><input type="text" name="final_exam20" id="final_exam20"  size="13"></td>
		<td><input type="text" name="assignment_project20" id="assignment_project20"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id21" id="student_id21" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online21" id="online21" size="10"></td>
        <td><input type="text" name="attendence21" id="attendence21"  size="15"></td>
		<td><input type="text" name="mid_term21" id="mid_term21"  size="10"></td>
        <td><input type="text" name="final_exam21" id="final_exam21"  size="13"></td>
		<td><input type="text" name="assignment_project21" id="assignment_project21"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id22" id="student_id22" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online22" id="online22" size="10"></td>
        <td><input type="text" name="attendence22" id="attendence22"  size="15"></td>
		<td><input type="text" name="mid_term22" id="mid_term22"  size="10"></td>
        <td><input type="text" name="final_exam22" id="final_exam22"  size="13"></td>
		<td><input type="text" name="assignment_project22" id="assignment_project22"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id23" id="student_id23" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online23" id="online23" size="10"></td>
        <td><input type="text" name="attendence23" id="attendence23"  size="15"></td>
		<td><input type="text" name="mid_term23" id="mid_term23"  size="10"></td>
        <td><input type="text" name="final_exam23" id="final_exam23"  size="13"></td>
		<td><input type="text" name="assignment_project23" id="assignment_project23"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id24" id="student_id24" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online24" id="online24" size="10"></td>
        <td><input type="text" name="attendence24" id="attendence24"  size="15"></td>
		<td><input type="text" name="mid_term24" id="mid_term24"  size="10"></td>
        <td><input type="text" name="final_exam24" id="final_exam24"  size="13"></td>
		<td><input type="text" name="assignment_project24" id="assignment_project24"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id25" id="student_id25" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online25" id="online25" size="10"></td>
        <td><input type="text" name="attendence25" id="attendence25"  size="15"></td>
		<td><input type="text" name="mid_term25" id="mid_term25"  size="10"></td>
        <td><input type="text" name="final_exam25" id="final_exam25"  size="13"></td>
		<td><input type="text" name="assignment_project25" id="assignment_project25"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id26" id="student_id26" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online26" id="online26" size="10"></td>
        <td><input type="text" name="attendence26" id="attendence26"  size="15"></td>
		<td><input type="text" name="mid_term26" id="mid_term26"  size="10"></td>
        <td><input type="text" name="final_exam26" id="final_exam26"  size="13"></td>
		<td><input type="text" name="assignment_project26" id="assignment_project26"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id27" id="student_id27" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online27" id="online27" size="10"></td>
        <td><input type="text" name="attendence27" id="attendence27"  size="15"></td>
		<td><input type="text" name="mid_term27" id="mid_term27"  size="10"></td>
        <td><input type="text" name="final_exam27" id="final_exam27"  size="13"></td>
		<td><input type="text" name="assignment_project27" id="assignment_project27"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id28" id="student_id28" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online28" id="online28" size="10"></td>
        <td><input type="text" name="attendence28" id="attendence28"  size="15"></td>
		<td><input type="text" name="mid_term28" id="mid_term28"  size="10"></td>
        <td><input type="text" name="final_exam28" id="final_exam28"  size="13"></td>
		<td><input type="text" name="assignment_project28" id="assignment_project28"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id29" id="student_id29" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online29" id="online29" size="10"></td>
        <td><input type="text" name="attendence29" id="attendence29"  size="15"></td>
		<td><input type="text" name="mid_term29" id="mid_term29"  size="10"></td>
        <td><input type="text" name="final_exam29" id="final_exam29"  size="13"></td>
		<td><input type="text" name="assignment_project29" id="assignment_project29"  size="14"></td>
        </tr>

		<tr>
        <td>
        <input type="text" name="student_id30" id="student_id30" size="13">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	    ?>
        </td>
        <td><input type="text" name="online30" id="online30" size="10"></td>
        <td><input type="text" name="attendence30" id="attendence30"  size="15"></td>
		<td><input type="text" name="mid_term30" id="mid_term30"  size="10"></td>
        <td><input type="text" name="final_exam30" id="final_exam30"  size="13"></td>
		<td><input type="text" name="assignment_project30" id="assignment_project30"  size="14"></td>
        </tr>
				
       </table>
<table>
    <tr>
                  <td>Subject: </td>
                    <td><select name="subject">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="English Language Sessional">English Language Sessional</option>
                    <option value="Physics Lab">Physics Lab</option>
					<option value="Elementary Structured Programming Lab">Elementary Structured Programming Lab</option>
                    <option value="Introduction to Computer Systems">Introduction to Computer Systems</option>
					<option value="Engineering Drawing">Engineering Drawing</option>
                    <option value="Basic Electrical Engineering Lab">Basic Electrical Engineering Lab</option>
					<option value="Software Development-I">Software Development-I</option>
                    <option value="Object Oriented Programming Lab">Object Oriented Programming Lab</option>
					<option value="Electronic Devices & Circuits Lab">Electronic Devices & Circuits Lab</option>
					<option value="Software Development-II">Software Development-II</option>
                    <option value="Data Structures Lab">Data Structures Lab</option>
					<option value="Digital Logic Design Lab">Digital Logic Design Lab</option>
                    <option value="Software Development-III">Software Development-III</option>
					<option value="Numerical Methods Lab">Numerical Methods Lab</option>
                    <option value="Algorithms Lab">Algorithms Lab</option>
					<option value="Digital Electronics and Pulse Techniques Lab">Digital Electronics and Pulse Techniques Lab</option>
					<option value="Assembly Language Programming">Assembly Language Programming</option>
                    <option value="Software Development-IV">Software Development-IV</option>
					<option value="Database Lab">Database Lab</option>
                    <option value="Microprocessors Lab">Microprocessors Lab</option>
					<option value="Digital System Design Lab">Digital System Design Lab</option>
                    <option value="Software Development-V">Software Development-V</option>
					<option value="Operating System Lab">Operating System Lab</option>
					<option value="Microcontroller Based System Design Lab">Microcontroller Based System Design Lab</option>
                    <option value="Information System Design and Software Engineering Lab">Information System Design and Software Engineering Lab</option>
					<option value="Computer Networks Lab">Computer Networks Lab</option>
                    <option value="Artificial Intelligence Lab">Artificial Intelligence Lab</option>
					<option value="Distributed Database Systems Lab">Distributed Database Systems Lab</option>
                    <option value="Formal Languages & Compilers Lab">Formal Languages & Compilers Lab</option>
					<option value="Computer Graphics Lab">Computer Graphics Lab</option>
                    <option value="Simulation of Products, Processes & Services Lab">Simulation of Products, Processes & Services Lab</option>
					<option value="Digital Image Processing Lab">Digital Image Processing Lab</option>
					<option value="Advanced Algorithms Lab">Advanced Algorithms Lab</option>
                    <option value="Network Programming Lab">Network Programming Lab</option>
					<option value="Multimedia Computing Lab">Multimedia Computing Lab</option>
                    <option value="Soft Computing Lab">Soft Computing Lab</option>
					<option value="Web Computing Lab">Web Computing Lab</option>
                    <option value="Pattern Recognition Lab">Pattern Recognition Lab</option>
					<option value="Expert & Decision Support Systems Lab">Expert & Decision Support Systems Lab</option>
                    <option value="Artificial Neural Networks Lab">Artificial Neural Networks Lab</option>		
					</select>
				  <td width="8"></td>
				  <td>Enter Group:</td>
                    <td><select name="section">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="a1">A1</option>
                    <option value="a2">A2</option>
					<option value="b1">B1</option>
                    <option value="b2">B2</option>
					<option value="c1">C1</option>
                    <option value="c2">C2</option>
					</select></td>
				</table>
				<table>
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
					<td width="90"></td>
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
					</td>
					</tr>
					</table>
</table>
<table>
	<tr>
	                  <td>Enter Semester: </td>
                    <td><select name="semester">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="Spring">Spring</option>
                    <option value="fall">Fall</option>
					</select>
	    <td width="230" align="center"  style="color:#69F;border-radius:10px" bgcolor="#AFD3EB" >
           <?php
            session_start();
	    if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
	    ?> 
	    </td> 
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="     Submit Lab Result     ">
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