<?php
session_start();

error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);
?>
<html>
<head>
<title>PHP Project</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/contact_validation.js"></script>
</head>
<body>

<div id="main_section">
	<div id="header">
    	<div class="logo"><img src="images/logo.jpg" alt="" width="242" height="109" title="" border="0" /> <img src="images/banner.jpg" alt="" width="755" height="109" title="" border="0" /></div>       
    </div>
        <div class="menu">
        	<ul>                                                                         
        		<li><a href="index.php">Home</a></li>
                <li><a href="about.php">About School</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="photos.php">Photo Gallery</a></li>
                <li  class="selected"><a href="contact.php">Contact Us</a></li>
        	</ul>
        </div>  
    <div id="container">
  <div id="main">
    <div id="leftcol_container">
      <div class="leftcol">     
	<h2 id=title style="text-align:left; margin-left:20px;font-size:22px;"> STAY IN TOUCH </h2> 	  
        
		<p> <strong>Address:</strong><em> 141-142 Love Road, 
			Tejgaon Industrial Area,
			Dhaka- 1208, Bangladesh</em><br/>
			<strong>Mobile:</strong> +880 01710-006999,                   01933-364664, 01727-559233, 01715-008034<br/>
			Email:</strong><u> vc@aust.edu</u><br/>
			Website:	</strong>www.aust.edu<strong></p>
         <div class="leftcol_bottom"></div><h4> FOLLOW US ON </h4> 
         </strong></p></em>
        
        <div class="leftcol_bottom" id="social_bookmark_box"> <a href="#"><img src="images/twitter_icon.png" alt="" /></a> <a href="#"><img src="images/facebook_icon.png" alt="" /></a> <a href="#"><img src="images/linkdin_icon.png" alt="" /></a></div>
        
      </div>
      <div class="leftcol_bottom"></div>
    </div>
<h2 id=title>CONTACT US</h2>      
    <div id="maincol_container3">
      <div class="maincol_middle">
            <div class="maincol">
          <div class="left_content_body">
            <p align="center">&nbsp;</p>
            <div>
              <div align="center">
              <form action="action.php" method="post" onSubmit="return validate(this)">
                <table width="633" border="0">
                  <tr>
                    <td width="117"> Name </td>
                    <td width="495"><input type="text" name="name" id="name" size="40"> <?php 
			session_start();
			if($_SESSION['msg']!="")
			{echo $_SESSION['msg'];$_SESSION['msg']="";}
			
			?></td>
                  </tr>
                  <tr>
                    <td width="117">ID </td>
                    <td><input type="text" name="student_id" id="student_id" size="40"></td>
                  </tr>
                  <tr>
                    <td width="117">E-mail </td>
                    <td><input type="text" name="email" id="email" size="40"></td>
                  </tr>
                  <tr>
                    <td width="117" height="157"> Your Message</td>
                    <td><textarea name="message" id="message" cols="30" rows="6">
                  </textarea></td>
                  </tr>
                  <tr>
                    <td width="117" height="63">&nbsp;</td>
                    <td align="right"><p align="left"><input class="btn" name="action" type="submit"  value="Send"></p>                    </td>
                  </tr>
                </table>
                </form>
              </div>
            </div>
            <hr style="border:1px #900 dashed" />

            <h2 id=title>Our Location</h2>
              <blockquote>
                  <h4 id=title style="font-size:15px;"><em>Find Us On The Map</em></h4>
                </blockquote>
  <div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <p><a href="#"><img src="images/Aust_location.jpg" alt="" width="583" height="300" /></a></p>
  <p>&nbsp;</p>
          </div> 
  <hr style="border:1px #900 dashed" />
  <p style="margin-top:15px;">&nbsp;</p>
          </div>
            </div>
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