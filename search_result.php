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
	{window.location="search_result.php?did="+did;}
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
<form action="search_result.php" method="post" onSubmit="return validate(this)">

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
				  <td>Enter Section: </td>
                    <td><select name="section">
                    <option value="0" selected="selected">Choose One</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
					<option value="c">C</option>
					</select>
					</td>
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
       <td>
          <input class="btn" name="action" id="action" type="submit"  value="     Search Result     ">
       </td>
    </tr> 
</table>
  </div>
</form>
<?php
		include('dbconnect.php');
	    $sql=mysql_query("select * from bac.submit_result where section='$_POST[section]' and year='$_POST[year]' and semester='$_POST[semester]' and ays='$_POST[ays]' and subject='$_POST[subject]'");
		$total=mysql_query("select quiz+attendence+final_exam from bac.submit_result where section='$_POST[section]' and year='$_POST[year]' and semester='$_POST[semester]' and subject='$_POST[subject]'");
		echo "<table border=\"1\" width=\"100%\" style=\"color: #fff;\">";
		echo "<tr>";
		echo "<th style=\"background-color:#1D5174;\">Student Id</th>";
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