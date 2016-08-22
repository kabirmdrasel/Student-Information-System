<?php
session_start();

error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);
?>
<html>
<head>
<title>PHP Project</title>
<link rel="stylesheet" type="text/css" href="main.css" />
<script type="text/javascript" src="js/script.js"></script>
<SCRIPT LANGUAGE="JavaScript">
<!--
var text="Welcome to AUST, Department of CSE";
var delay=100;
var currentChar=1;
var destination="[not defined]";
var message="Welcome to AUST, Department of CSE";
function type()
{
  if (document.getElementById)
  {
    var dest=document.getElementById(destination);
    if (dest)
    {
      dest.innerHTML=text.substr(0, currentChar);
      currentChar++
      if (currentChar>text.length)
      {
        currentChar=1;
        setTimeout("type()", 2000);
      }
      else
      {
        setTimeout("type()", delay);
      }
    }
  }
}

function startTyping(text, delayParam, destinationParam, message)
{
  delay=delayParam;
  currentChar=1;
  destination=destinationParam;

  type();
}// JavaScript Document
</SCRIPT>
</head>
<body>

<div id="main_section">
	<div id="header">
    	<div class="logo"><img src="images/logo.jpg" alt="" width="242" height="109" title="" border="0" /> <img src="images/banner.jpg" alt="" width="755" height="109" title="" border="0" /></div>      
    </div>
        <div class="menu">
        	<ul>                                                                         
        		<li class="selected"><a href="index.php">Home</a></li>
                <li><a href="about.php">About School</a></li>
                <li><a href="registration.php">Registration</a></li>
                <li><a href="photos.php">Photo Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
        	</ul>
        </div>
    
      <div id="container">
	<div id="main">
  <div id="leftcol_container">
<div class="leftcol">
<h2><div class=leftcol_height ></div>Quick Navigation</h2>
          <ul>
          <li><a href="academic.php">Academic Calender</a></li>
          <li> <a href="view_news.php">News & Events</a></li>
          <li> <a href="view_extra.php">Extra/Co-curricular Activity</a> </li>
          <li> <a href="view_seminar.php">Seminar</a></li>
          <li>  <a href="view_old_alumni.php">Alumni (Graduates)</a></li>
          <li> <a href="view_alumni.php">Recent Graduates</a></li>
		  </ul>
<div class=leftcol_height ></div>
</div>		  
<div class="leftcol1">
<h2><div class=leftcol_height ></div>Study Material</h2>
          <ul>
          <li><a href="view_subject.php">Subject List</a></li>
          <li> <a href="request.php">Request Materials</a></li>
		  <li> <a href="view_request.php">View Convesation</a> </li>
          <li> <a href="view_exam_info.php">Exam Info</a></li>
          </ul>
<div class=leftcol_height ></div>
</div>
<div class="leftcol2">        	
<h2><div class=leftcol_height ></div>Routine</h2>
          <ul>
          <li><a href="view_class.php">Class Routine</a></li>
          <li> <a href="view_exam_routine.php">Exam Routine</a></li>
          </ul>
<div class=leftcol_height ></div>
</div>
<div class="leftcol3">			  
<h2><div class=leftcol_height ></div>Know Your Faculty</h2>
          <ul>
          <li><a href="head.php">Head of the Faculty</a></li>
          <li> <a href="view_teacher.php">Teachers of the Faculty</a></li>
          <li> <a href="view_staff.php">Other Staffs of the Faculty</a> </li>
          </ul>
<div class=leftcol_height ></div>
</div>
<div class=height ></div>
  </div>
   </div> 
      
        <div id="maincol_container">
          <div class="maincol_middl">
            <div class="maincol1">
              <div id="welcome_message">
        	    <div align="center" ID="message" style="color:#1D5174;font:bold 25px times new roman;"></DIV>
			    <SCRIPT LANGUAGE="JavaScript">startTyping(text, 50, "message", message);</script>
                </div>
                     <p align="center">
					 <marquee behavior="alternate" scrollamount="4"><font size="5" color="white">
                     <em><strong>Student Database</strong></em></font></marquee></p>
            </div>
            
            <div class="maincol_bottom"></div>
            <div class="slide">
            <p>&nbsp;</p>
              <div id="wrapper">
            <div id="slidecontainer">
		<div class="sliderbutton" id="slideleft" onClick="slideshow.move(-1)"></div>
		<div id="slider">
			<ul>
				<li><img src="photos/1.jpg" alt="Image One" width="410" height="235" align="middle" /></li>
				<li><img src="photos/2.jpg" width="410" height="235" alt="Image Two" /></li>
				<li><img src="photos/3.jpg" width="410" height="235" alt="Image Three" /></li>
				<li><img src="photos/4.jpg" width="410"  height="235" alt="Image Four" /></li>
                <li><img src="photos/5.jpg" width="410" height="235"  alt="Image Five" /></li>
				<li><img src="photos/6.jpg" width="410" height="235" alt="Image Six" /></li>
				<li><img src="photos/7.jpg" width="410" height="235" alt="Image Seven" /></li>
				<li><img src="photos/8.jpg" width="410"  height="235" alt="Image Eight" /></li>
			</ul>
		</div>
		<div class="sliderbutton" id="slideright" onClick="slideshow.move(1)"></div>
		<ul id="pagination" class="pagination">
			<li onClick="slideshow.pos(0)"></li>
			<li onClick="slideshow.pos(1)"></li>
			<li onClick="slideshow.pos(2)"></li>
			<li onClick="slideshow.pos(3)"></li>
            <li onClick="slideshow.pos(4)"></li>
			<li onClick="slideshow.pos(5)"></li>
			<li onClick="slideshow.pos(6)"></li>
			<li onClick="slideshow.pos(7)"></li>
		</ul>
	</div>
</div>
              <div align="center">
                <script type="text/javascript">
var slideshow=new TINY.slider.slide('slideshow',{
	id:'slider',
	auto:8,
	resume:false,
	vertical:false,
	navid:'pagination',
	activeclass:'current',
	position:0,
	rewind:false,
	elastic:true,
	left:'slideleft',
	right:'slideright'
});
                </script>
                <p>&nbsp;</p>
              </div>
            </div>
          </div>
        <div class="maincol_bottom">
          <div class="maincol_bottom_sec1">
           <br> <h2 align="center"><font color=#1D5174>Weekly Quiz & Quotes</font></h2>
            <br><p align="center"><strong><font color=red>Today's Question</font></strong></p>
            <p align="center"><a href="#"><strong><em><font color=white>Which team will win 2014 worldcup football ?</font></em></strong></a></p>
           
          </div>
          
          <div class="maincol_bottom_sec3">
           <br> <h2 align="center"><blink><strong><font color="yellow">Join In</font></strong></blink></h2>
            <p align="center"><em><font color="white">To Our Social Networks</font></em>
            </p>
            <div id="social_bookmark_box"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
              <div align="center"><a href="#"><img src="images/twitter_icon.png" ></a> &nbsp;&nbsp;<a href="#"><img src="images/facebook_icon.png" ></a> &nbsp;&nbsp;<a href="#"><img src="images/linkdin_icon.png"  ></a> </div>
            </div>
          </div>
         
        </div>
        </div>
        
        
    <div id="rightcol_container">
      <div class="rightcol_bottom1"> </div>
      <div class="rightcol">
        	 <h4 align="left"> <dfn><font color="white">Want To Find Something?</font></dfn>        </h4>
  
<form name="cse" id="searchbox_demo" action="http://www.google.com/cse">
  <input type="hidden" name="cref" value="" />
  <input type="hidden" name="ie" value="utf-8" />
  <input type="hidden" name="hl" value="" />
  <input name="q" type="text" size="35" />
  <input class="btn" align="right" type="submit" name="sa" value="Search" />
</form>
<script>
  (function() {
    var cx = '017312610867553844124:utxfj1q4_68';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search> 
                                
      <p>&nbsp;</p>
        
      </div>
      <div class="rightcol_bottom"> </div> 
        <div class="rightcol">
        <div id="login">
          <form action="action.php" method="post">
          <div class="title">User login</div>
            <table border="0" align="center">
              <tr>
                <td align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="blue">Username</font>
                  <input class="form" name="username" type="text" size="20" /></td> </tr>
                <tr> <td align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="blue">Password</font>
                  <input class="form" name="password" type="password" size="20" /> </td></tr>
                <tr> <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn" name="action" type="submit"  value="Login" /></td></tr>
              <div>
              <tr>
                <td align="center"  style="color:#69F;border-radius:10px" bgcolor="#FC3" >
               <?php
                    session_start();
					
					if($_SESSION['msg']){echo $_SESSION['msg'];$_SESSION['msg']="";}
					
					?> 
		</td>
              </tr> </div>
              <tr>
                <td align="right" colspan="4"> <a href="forget_password.php" style="font-size:16px">Forgot Password?</a><br> 
                <a href="registration.php" style="font-size:16px">Don't have a account?</a></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
	  <div class="rightcol_bottom"></div>
        <div class="rightcol_bottom"> 
          <div class="rightcol">
                    <h2><div class=leftcol_height ></div>News Feeds<div class=leftcol_height ></div></h2>
        <marquee direction="up" width="200px" height="165" onMouseOver="this.stop();" onMouseOut="this.start();">
       	  <ul>
           	  <li>
            	  <div align="right"><a href="#">AUST Picnic Was Held</a>          	    </div>
           	  </li>
            	<li>
            	  <div align="right"><a href="#">Coding Contest</a></div>
            	</li>
            	<li>
            	  <div align="right"><a href="#">Computer Gaming Contest </a>          	    </div>
            	</li>
            	<li>
            	  <div align="right"><a href="#">Photography workshop</a>          	    </div>
            	</li>
            	<li>
            	  <div align="right"><a href="#">Photography Contest</a>          	    </div>
            	</li>
            	<li>
            	  <div align="right"><a href="#">App Developping workshop</a>          	    </div>
            	</li>
            	<li>
            	  <div align="right"><a href="#">Windows App Developing Contest</a>          	    </div>
            	</li>
          </ul></marquee>
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