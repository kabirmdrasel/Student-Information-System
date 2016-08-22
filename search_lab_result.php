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
if($_GET['did']){mysql_query("delete from submit_lab_result where id='$_GET[did]'"); }
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
	{window.location="search_lab_result.php?did="+did;}
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
<h2 id=title>Search Lab Result</h2>     
    <div id="maincol_container4">
            <div class="maincol1">        
<form action="search_lab_result.php" method="post" onSubmit="return validate(this)">

  <div align="center">
    <table width="639">
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
					<td width="45"></td>
					</td>
                  <td>Enter Semester: </td>
                    <td><select name="semester">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="Spring">Spring</option>
                    <option value="fall">Fall</option>
					</select>
					</tr>
					<tr>
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
					<td width="45"></td>
				  <td>Enter Group: </td>
                    <td><select name="section">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="a1">A1</option>
                    <option value="a2">A2</option>
					<option value="b1">B1</option>
					<option value="b2">B2</option>
                    <option value="c1">C1</option>
					<option value="c2">C2</option>
					</select>
					</td>
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
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="   Search Lab Result   ">
       </td>
    </tr> 
</table>
  </div>
</form>
<?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.submit_lab_result where section='$_POST[section]' and year='$_POST[year]' and semester='$_POST[semester]' and ays='$_POST[ays]' and subject='$_POST[subject]'");
		$total=mysql_query("select online+attendence+mid_term+final_exam+assignment_project from bac.submit_lab_result where section='$_POST[section]' and year='$_POST[year]' and semester='$_POST[semester]' and subject='$_POST[subject]'");
		echo "<table border=\"1\" width=\"100%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">Student Id</th>";
		echo "<th style=\"background-color:#1D5174;\">Online</th>";
		echo "<th style=\"background-color:#1D5174;\">Attendence</th>";
		echo "<th style=\"background-color:#1D5174;\">Mid Term</th>";
		echo "<th style=\"background-color:#1D5174;\">Final Exam</th>";
		echo "<th style=\"background-color:#1D5174;\">Assignment<br>/project</th>";
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
		echo "<td>".$user['online']."</td>";
		echo "<td>".$user['attendence']."</td>";
		echo "<td>".$user['mid_term']."</td>";
		echo "<td>".$user['final_exam']."</td>";
		echo "<td>".$user['assignment_project']."</td>";
        
		while($use=mysql_fetch_array($total))
{
		echo "<td>".$use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']."</td>";
            if($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<40)
			{
            echo "<td> F </td>";
			echo "<td> 0.00 </td>";
			}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<45)
		{
            echo "<td> D </td>";
			echo "<td> 2.00 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<50)
		{
            echo "<td> C </td>";
			echo "<td> 2.25 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<55)
		{
            echo "<td> C+ </td>";
			echo "<td> 2.50 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<60)
		{
            echo "<td> B- </td>";
			echo "<td> 2.75 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<65)
		{
            echo "<td> B </td>";
			echo "<td> 3.00 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<70)
		{
            echo "<td> B+ </td>";
			echo "<td> 3.25 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<75)
		{
            echo "<td> A- </td>";
			echo "<td> 3.50 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']<80)
		{
            echo "<td> A </td>";
			echo "<td> 3.75 </td>";
		}
		else if ($use['online'+'attendence'+'mid_term'+'final_exam'+'assignment_project']>=80)
		{
            echo "<td> A+ </td>";
			echo "<td> 4.00 </td>";
		}
		break;
		}
		echo "<td><a href=\"edit_lab_result.php?eid=".$user['id']."\">Edit</a></td>";
		echo "<td><a class=\"foot_style\" href=\"javascript:deluser(did=$user[id])\">Delete</a></td>";
}
		echo "<tr>";		
		echo "</table>";
?>	

</div>
        <p>&nbsp;</p>
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