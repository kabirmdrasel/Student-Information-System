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
<h1 id=title>Submit Result</h2>   
    <div id="maincol_container4">
      <div class="maincol_middle">
            <div class="maincol1">         
<form action="action.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="639" border="5">
      

       <tr>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Student Id</strong></td>
        <td align="center" style="background-color: #1D5174;"><font color="white"><strong>Quiz</strong></td>
	<td align="center" style="background-color: #1D5174;"><font color="white"><strong>Attendence</strong></td> 
	<td align="center" style="background-color: #1D5174;"><font color="white"><strong>Final Exam</strong></font></td>  
        </tr>


       <tr>
        <td>
        <input type="text" name="student_id" id="student_id" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz" id="quiz"></td>
        <td><input type="text" name="attendence" id="attendence"></td>
        <td><input type="text" name="final_exam" id="final_exam"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id1" id="student_id1" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz1" id="quiz1"></td>
        <td><input type="text" name="attendence1" id="attendence1"></td>
        <td><input type="text" name="final_exam1" id="final_exam1"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id2" id="student_id2" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz2" id="quiz2"></td>
        <td><input type="text" name="attendence2" id="attendence2"></td>
        <td><input type="text" name="final_exam2" id="final_exam2"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id3" id="student_id3" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz3" id="quiz3"></td>
        <td><input type="text" name="attendence3" id="attendence3"></td>
        <td><input type="text" name="final_exam3" id="final_exam3"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id4" id="student_id4" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz4" id="quiz4"></td>
        <td><input type="text" name="attendence4" id="attendence4"></td>
        <td><input type="text" name="final_exam4" id="final_exam4"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id5" id="student_id5" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz5" id="quiz5"></td>
        <td><input type="text" name="attendence5" id="attendence5"></td>
        <td><input type="text" name="final_exam5" id="final_exam5"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id6" id="student_id6" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz6" id="quiz6"></td>
        <td><input type="text" name="attendence6" id="attendence6"></td>
        <td><input type="text" name="final_exam6" id="final_exam6"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id7" id="student_id7" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz7" id="quiz7"></td>
        <td><input type="text" name="attendence7" id="attendence7"></td>
        <td><input type="text" name="final_exam7" id="final_exam7"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id8" id="student_id8" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz8" id="quiz8"></td>
        <td><input type="text" name="attendence8" id="attendence8"></td>
        <td><input type="text" name="final_exam8" id="final_exam8"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id9" id="student_id9" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz9" id="quiz9"></td>
        <td><input type="text" name="attendence9" id="attendence9"></td>
        <td><input type="text" name="final_exam9" id="final_exam9"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id10" id="student_id10" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz10" id="quiz10"></td>
        <td><input type="text" name="attendence10" id="attendence10"></td>
        <td><input type="text" name="final_exam10" id="final_exam10"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id11" id="student_id11" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz11" id="quiz11"></td>
        <td><input type="text" name="attendence11" id="attendence11"></td>
        <td><input type="text" name="final_exam11" id="final_exam11"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id12" id="student_id12" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz12" id="quiz12"></td>
        <td><input type="text" name="attendence12" id="attendence12"></td>
        <td><input type="text" name="final_exam12" id="final_exam12"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id13" id="student_id13" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz13" id="quiz13"></td>
        <td><input type="text" name="attendence13" id="attendence13"></td>
        <td><input type="text" name="final_exam13" id="final_exam13"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id14" id="student_id14" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz14" id="quiz14"></td>
        <td><input type="text" name="attendence14" id="attendence14"></td>
        <td><input type="text" name="final_exam14" id="final_exam14"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id15" id="student_id15" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz15" id="quiz15"></td>
        <td><input type="text" name="attendence15" id="attendence15"></td>
        <td><input type="text" name="final_exam15" id="final_exam15"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id16" id="student_id16" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz16" id="quiz16"></td>
        <td><input type="text" name="attendence16" id="attendence16"></td>
        <td><input type="text" name="final_exam16" id="final_exam16"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id17" id="student_id17" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz17" id="quiz17"></td>
        <td><input type="text" name="attendence17" id="attendence17"></td>
        <td><input type="text" name="final_exam17" id="final_exam17"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id18" id="student_id18" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz18" id="quiz18"></td>
        <td><input type="text" name="attendence18" id="attendence18"></td>
        <td><input type="text" name="final_exam18" id="final_exam18"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id19" id="student_id19" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz19" id="quiz19"></td>
        <td><input type="text" name="attendence19" id="attendence19"></td>
        <td><input type="text" name="final_exam19" id="final_exam19"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id20" id="student_id20" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz20" id="quiz20"></td>
        <td><input type="text" name="attendence20" id="attendence20"></td>
        <td><input type="text" name="final_exam20" id="final_exam20"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id21" id="student_id21" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz21" id="quiz21"></td>
        <td><input type="text" name="attendence21" id="attendence21"></td>
        <td><input type="text" name="final_exam21" id="final_exam21"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id22" id="student_id22" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz22" id="quiz22"></td>
        <td><input type="text" name="attendence22" id="attendence22"></td>
        <td><input type="text" name="final_exam22" id="final_exam22"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id23" id="student_id23" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz23" id="quiz23"></td>
        <td><input type="text" name="attendence23" id="attendence23"></td>
        <td><input type="text" name="final_exam23" id="final_exam23"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id24" id="student_id24" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz24" id="quiz24"></td>
        <td><input type="text" name="attendence24" id="attendence24"></td>
        <td><input type="text" name="final_exam24" id="final_exam24"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id25" id="student_id25" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz25" id="quiz25"></td>
        <td><input type="text" name="attendence25" id="attendence25"></td>
        <td><input type="text" name="final_exam25" id="final_exam25"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id26" id="student_id26" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz26" id="quiz26"></td>
        <td><input type="text" name="attendence26" id="attendence26"></td>
        <td><input type="text" name="final_exam26" id="final_exam26"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id27" id="student_id27" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz27" id="quiz27"></td>
        <td><input type="text" name="attendence27" id="attendence27"></td>
        <td><input type="text" name="final_exam27" id="final_exam27"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id28" id="student_id28" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz28" id="quiz28"></td>
        <td><input type="text" name="attendence28" id="attendence28"></td>
        <td><input type="text" name="final_exam28" id="final_exam28"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id29" id="student_id29" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz29" id="quiz29"></td>
        <td><input type="text" name="attendence29" id="attendence29"></td>
        <td><input type="text" name="final_exam29" id="final_exam29"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id30" id="student_id30" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz30" id="quiz30"></td>
        <td><input type="text" name="attendence30" id="attendence30"></td>
        <td><input type="text" name="final_exam30" id="final_exam30"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id31" id="student_id31" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz31" id="quiz31"></td>
        <td><input type="text" name="attendence31" id="attendence31"></td>
        <td><input type="text" name="final_exam31" id="final_exam31"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id32" id="student_id32" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz32" id="quiz32"></td>
        <td><input type="text" name="attendence32" id="attendence32"></td>
        <td><input type="text" name="final_exam32" id="final_exam32"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id33" id="student_id33" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz33" id="quiz33"></td>
        <td><input type="text" name="attendence33" id="attendence33"></td>
        <td><input type="text" name="final_exam33" id="final_exam33"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id34" id="student_id34" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz34" id="quiz34"></td>
        <td><input type="text" name="attendence34" id="attendence34"></td>
        <td><input type="text" name="final_exam34" id="final_exam34"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id35" id="student_id35" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz35" id="quiz35"></td>
        <td><input type="text" name="attendence35" id="attendence35"></td>
        <td><input type="text" name="final_exam35" id="final_exam35"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id36" id="student_id36" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz36" id="quiz36"></td>
        <td><input type="text" name="attendence36" id="attendence36"></td>
        <td><input type="text" name="final_exam36" id="final_exam36"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id37" id="student_id37" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz37" id="quiz37"></td>
        <td><input type="text" name="attendence37" id="attendence37"></td>
        <td><input type="text" name="final_exam37" id="final_exam37"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id38" id="student_id38" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz38" id="quiz38"></td>
        <td><input type="text" name="attendence38" id="attendence38"></td>
        <td><input type="text" name="final_exam38" id="final_exam38"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id39" id="student_id39" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz39" id="quiz39"></td>
        <td><input type="text" name="attendence39" id="attendence39"></td>
        <td><input type="text" name="final_exam39" id="final_exam39"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id40" id="student_id40" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz40" id="quiz40"></td>
        <td><input type="text" name="attendence40" id="attendence40"></td>
        <td><input type="text" name="final_exam40" id="final_exam40"></td>
       
       </tr>
       <tr>
        <td>
        <input type="text" name="student_id41" id="student_id41" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz41" id="quiz41"></td>
        <td><input type="text" name="attendence41" id="attendence41"></td>
        <td><input type="text" name="final_exam41" id="final_exam41"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id42" id="student_id42" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz42" id="quiz42"></td>
        <td><input type="text" name="attendence42" id="attendence42"></td>
        <td><input type="text" name="final_exam42" id="final_exam42"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id43" id="student_id43" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz43" id="quiz43"></td>
        <td><input type="text" name="attendence43" id="attendence43"></td>
        <td><input type="text" name="final_exam43" id="final_exam43"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id44" id="student_id44" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo$_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz44" id="quiz44"></td>
        <td><input type="text" name="attendence44" id="attendence44"></td>
        <td><input type="text" name="final_exam44" id="final_exam44"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id45" id="student_id45" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz45" id="quiz45"></td>
        <td><input type="text" name="attendence45" id="attendence45"></td>
        <td><input type="text" name="final_exam45" id="final_exam45"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id46" id="student_id46" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz46" id="quiz46"></td>
        <td><input type="text" name="attendence46" id="attendence46"></td>
        <td><input type="text" name="final_exam46" id="final_exam46"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id47" id="student_id47" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz47" id="quiz47"></td>
        <td><input type="text" name="attendence47" id="attendence47"></td>
        <td><input type="text" name="final_exam47" id="final_exam47"></td>
       
       </tr>
       <tr>

        <td>
        <input type="text" name="student_id48" id="student_id48" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz48" id="quiz48"></td>
        <td><input type="text" name="attendence48" id="attendence48"></td>
        <td><input type="text" name="final_exam48" id="final_exam48"></td>
       
       </tr>

       <tr>

        <td>
        <input type="text" name="student_id49" id="student_id49" size="24">
        <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
	?>
        </td>
        <td><input type="text" name="quiz49" id="quiz49"></td>
        <td><input type="text" name="attendence49" id="attendence49"></td>
        <td><input type="text" name="final_exam49" id="final_exam49"></td>
       
       </tr>
       </table>
<table>
    <tr>
                  <td>Subject: </td>
                    <td><select name="subject">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="Critical Thinking & Communication">Critical Thinking & Communication</option>
                    <option value="Mathematics-I">Mathematics-I</option>
					<option value="Physics">Physics</option>
                    <option value="Chemistry">Chemistry</option>
					<option value="Elementary Structured Programming">Elementary Structured Programming</option>
                    <option value="Mathematics-II">Mathematics-II</option>
					<option value="Basic Mechanical Engineering">Basic Mechanical Engineering</option>
                    <option value="Basic Electrical Engineering">Basic Electrical Engineering</option>
					<option value="Discrete Mathematics">Discrete Mathematics</option>
					<option value="Object Oriented Programming">Object Oriented Programming</option>
                    <option value="Society, Ethics and Technology">Society, Ethics and Technology</option>
					<option value="Mathematics-III">Mathematics-III</option>
                    <option value="Electronic Devices & Circuits">Electronic Devices & Circuits</option>
					<option value="Data Structures">Data Structures</option>
                    <option value="Digital Logic Design">Digital Logic Design</option>
					<option value="Mathematics- IV">Mathematics- IV</option>
					<option value="Numerical Methods">Numerical Methods</option>
                    <option value="Algorithms">Algorithms</option>
					<option value="Digital Electronics and Pulse Techniques">Digital Electronics and Pulse Techniques</option>
                    <option value="Computer Architecture">Computer Architecture</option>
					<option value="Economics and Accounting">Economics and Accounting</option>
                    <option value="Mathematical Analysis for Computer Science">Mathematical Analysis for Computer Science</option>
					<option value="Database">Database</option>
					<option value="Microprocessors">Microprocessors</option>
                    <option value="Digital System Design">Digital System Design</option>
					<option value="Industrial Law and Safety Management">Industrial Law and Safety Management</option>
                    <option value="Data Communication">Data Communication</option>
					<option value="Operating System">Operating System</option>
                    <option value="Microcontroller Based System Design">Microcontroller Based System Design</option>
					<option value="Information System Design and Software Engineering">Information System Design and Software Engineering</option>
                    <option value="Industrial Management">Industrial Management</option>
					<option value="Project & Thesis-I">Project & Thesis-I</option>
					<option value="Computer Networks">Computer Networks</option>
                    <option value="Artificial Intelligence">Artificial Intelligence</option>
					<option value="Distributed Database Systems">Distributed Database Systems</option>
                    <option value="Formal Languages & Compilers">Formal Languages & Compilers</option>
					<option value="Computer Graphics">Computer Graphics</option>
                    <option value="Project and Thesis-II">Project and Thesis-II</option>
					<option value="Simulation of Products, Processes & Services">Simulation of Products, Processes & Services</option>
                    <option value="Digital Image Processing">Digital Image Processing</option>
					<option value="Advanced Algorithms">Advanced Algorithms</option>
                    <option value="Network Programming">Network Programming</option>
					<option value="Multimedia Computing">Multimedia Computing</option>
					<option value="Soft Computing">Soft Computing</option>
                    <option value="Web Computing">Web Computing</option>
					<option value="Pattern Recognition">Pattern Recognition</option>
					<option value="Expert & Decision Support Systems">Expert & Decision Support Systems</option>
                    <option value="Artificial Neural Networks">Artificial Neural Networks</option>
					<option value="Advanced Computer Architecture">Advanced Computer Architecture</option>
					<option value="VLSI Design">VLSI Design</option>
                    <option value="Advanced Microprocessor Architecture">Advanced Microprocessor Architecture</option>
					<option value="Telecommunication">Telecommunication</option>
					<option value="Digital Signal Processing">Digital Signal Processing</option>
                    <option value="Computational Geometry">Computational Geometry</option>
					<option value="Graph Theory">Graph Theory</option>
                    <option value="Computational Complexity Theory">Computational Complexity Theory</option>
					<option value="Parallel Processing">Parallel Processing</option>		
					</select>
				  <td width="28"></td>
				  <td>Enter Section: </td>
                    <td><select name="section">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
					<option value="c">C</option>
					</select>
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
		<td width="250" align="center"  style="color:#69F;border-radius:10px" bgcolor="#AFD3EB" >
           <?php
            session_start();
	    if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
	    ?> 
	    </td> 
       <td>
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="      Submit Result      ">
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