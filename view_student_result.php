<?php
error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();
if(isset($_SESSION['username']) and isset($_SESSION['password'])){
	
	
include("dbconnect.php");
if($_GET['did']){mysql_query("delete from submit_result where id='$_GET[did]'"); }
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
<script language="javascript">
function deluser(did)
{
	var msg=confirm("Are you sure you want to delete this user?");
	if(msg)
	{window.location="view_student_result.php?did="+did;}
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
        <br> 
      </div>
      <div class="leftcol_bottom">
        <p>&nbsp;</p>
      </div>
    </div>
            <h2 id=title>Search Result</h2>    
    <div id="maincol_container3">
      <div class="maincol_middle">
            <div class="maincol1">
          
<form action="view_student_result.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="639">
    <tr>
                  <td>Student Id: </td>
				  <td><input type="text" name="student_id" id="student_id" size="26"></td>
					</td>
					
				  <td>Academic Year & Semester: </td>
                    <td><select name="ays">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="1.1">1st year  1st Semester</option>
                    <option value="1.2">1st year  2nd Semester</option>
					<option value="2.1">2nd year  1st Semester</option>
                    <option value="2.2">2nd year  2nd Semester</option>
					<option value="3.1">3rd year  1st Semester</option>
                    <option value="3.2">3rd year  2nd Semester</option>
					<option value="4.1">4th year  1st Semester</option>
                    <option value="4.2">4th year  2nd Semester</option>
					</select>
					</tr>
</table>
<table>
	<tr>
	<td width="475"></td>
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="     Search Result     ">
       </td>
    </tr> 
</table>
  </div>
</form>
<?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.submit_result where student_id='$_POST[student_id]' and ays='$_POST[ays]'");
		$total=mysql_query("select quiz+attendence+final_exam from bac.submit_result where student_id='$_POST[student_id]' and ays='$_POST[ays]'");
		echo "<table border=\"1\" width=\"100%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">Student Id</th>";
		echo "<th style=\"background-color:#1D5174;\">Subject</th>";
		echo "<th style=\"background-color:#1D5174;\">Quiz</th>";
		echo "<th style=\"background-color:#1D5174;\">Attendence</th>";
		echo "<th style=\"background-color:#1D5174;\">Final Exam</th>";
		echo "<th style=\"background-color:#1D5174;\">Total Mark</th>";
		echo "<th style=\"background-color:#1D5174;\">Grade</th>";
		echo "<th style=\"background-color:#1D5174;\">Grade Point</th>";
		echo "<th style=\"background-color:#1D5174;\">Edit</th>";
		echo "<th style=\"background-color:#1D5174;\">Delete</th>";
		echo "<tr>";	
	    while($user=mysql_fetch_array($sql))
		{
		echo "<tr style=\"color: #1D5174;\">";
		echo "<td>".$user['student_id']."</td>";
		echo "<td>".$user['subject']."</td>";
		echo "<td>".$user['quiz']."</td>";
		echo "<td>".$user['attendence']."</td>";
		echo "<td>".$user['final_exam']."</td>";
		while($use=mysql_fetch_array($total))
{
		
		echo "<td>".$use['quiz'+'attendence'+'final_exam']."</td>";
            if($use['quiz'+'attendence'+'final_exam']<40)
			{
            echo "<td> F </td>";
			echo "<td> 0.00 </td>";
			}
		else if ($use['quiz'+'attendence'+'final_exam']<45)
		{
            echo "<td> D </td>";
			echo "<td> 2.00 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']<50)
		{
            echo "<td> C </td>";
			echo "<td> 2.25 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']<55)
		{
            echo "<td> C+ </td>";
			echo "<td> 2.50 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']<60)
		{
            echo "<td> B- </td>";
			echo "<td> 2.75 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']<65)
		{
            echo "<td> B </td>";
			echo "<td> 3.00 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']<70)
		{
            echo "<td> B+ </td>";
			echo "<td> 3.25 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']<75)
		{
            echo "<td> A- </td>";
			echo "<td> 3.50 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']<80)
		{
            echo "<td> A </td>";
			echo "<td> 3.75 </td>";
		}
		else if ($use['quiz'+'attendence'+'final_exam']>=80)
		{
            echo "<td> A+ </td>";
			echo "<td> 4.00 </td>";
		}
		break;
}
		echo "<td><a href=\"edit_result.php?eid=".$user['id']."\">Edit</a></td>";
		echo "<td><a class=\"foot_style\" href=\"javascript:deluser(did=$user[id])\">Delete</a></td>";
}
		echo "<tr>";		
		echo "</table>";
?>	

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
{trigger_error("You are not Admin");}
?>