<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

session_start(); // ready to go!

error_reporting(E_ALL^E_NOTICE);
error_reporting(E_STRICT);

include('dbconnect.php');

extract($_POST);

$action=$_POST['action'];

switch($action){

    
case "Register":
					$sql=mysql_query("select * from bac.user where username='$_POST[username]'");
					$cnt=mysql_num_rows($sql);
					if($cnt>1){
						$_SESSION['msg']="Username already exist";
						header("Location: index.php");
						}
					else{
					if(!isset($_POST['ssc'])){$_POST['ssc']=0;}
					if(!isset($_POST['hsc'])){$_POST['hsc']=0;}
					if(!isset($_POST['alevel'])){$_POST['alevel']=0;}
					if(!isset($_POST['olevel'])){$_POST['olevel']=0;}


					mysql_query("insert into bac.user
	(id, name, student_id, username, password, email, dob, address, contactnumber, ssc, hsc, olevel, alevel, gender, blood, interest, user_type) 
values (null, '$_POST[name]', '$_POST[student_id]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[dob]', '$_POST[address]', '$_POST[contactnumber]', '$_POST[ssc]', '$_POST[hsc]', '$_POST[olevel]', '$_POST[alevel]', '$_POST[gender]', '$_POST[blood]', '$_POST[interest]', 'student' )");

	$_SESSION['msg']="Successfully Registered";
					header("Location: index.php");
					}
					break;					
case "Login":
					if($_POST['username']=="" and $_POST['password']=="")
					{$_SESSION['msg']="Please Enter Your Username & Password";header("Location: index.php");}
					
					else{
						$sql=mysql_query("select * from bac.user where username='$_POST[username]' and password='$_POST[password]'");
						$cnt=mysql_num_rows($sql);
						$data=mysql_fetch_array($sql);
						
						if($cnt==1){
							$_SESSION['id']=$data['id'];
							$_SESSION['name']=$data['name'];
							$_SESSION['student_id']=$data['student_id'];
							$_SESSION['username']=$data['username'];
							$_SESSION['password']=$data['password'];
							$_SESSION['user_type']=$data['user_type'];
							
							header("Location:home.php");}
						else{$_SESSION['msg']="Wrong Login Info Or You Are Not Registered";header("Location: index.php");}
						}
					break;
case "Admin_Register":
					$sql=mysql_query("select * from bac.user where username='$_POST[username]'");
					$cnt=mysql_num_rows($sql);
					if($cnt>1){
						$_SESSION['msg']="Username already exist";
						header("Location: registration.php");
						}
					else{
					if(!isset($_POST['ssc'])){$_POST['ssc']=0;}
					if(!isset($_POST['hsc'])){$_POST['hsc']=0;}
					if(!isset($_POST['alevel'])){$_POST['alevel']=0;}
					if(!isset($_POST['olevel'])){$_POST['olevel']=0;}
					mysql_query("insert into bac.user
	(id, name, student_id, username, password, email, dob, address, contactnumber, ssc, hsc, olevel, alevel, gender, blood, interest, user_type) 
values (null, '$_POST[name]', '$_POST[student_id]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[dob]', '$_POST[address]', '$_POST[contactnumber]', '$_POST[ssc]', '$_POST[hsc]', '$_POST[olevel]', '$_POST[alevel]', '$_POST[gender]', '$_POST[blood]', '$_POST[interest]', '$_POST[user_type]' )");

	$_SESSION['msg']="Admin Successfully Registered";
					header("Location: home.php");
					}
					break;

case "      Change & Save       ":					
					$sql=mysql_query("update submit_result set student_id='$_POST[student_id]', quiz='$_POST[quiz]', attendence='$_POST[attendence]', final_exam='$_POST[final_exam]' where id='$_POST[eid]'");
					$_SESSION['msg']="Information Saved Successfully.";
					header("Location:home.php");
					break;									
case "Change Password":
					

    if(!$result){
        echo "The username entered does not exist!";
    }
    else
        if($password != mysql_result($result, 0)){
            echo "Entered an incorrect password";
            }
    if($newpassword == $confirmnewpassword){
        $sql = mysql_query("UPDATE test SET password = '$newpassword' WHERE username = '$username'");      
    }
    if(!$sql){
        echo "Congratulations, password successfully changed!";
    }
    else{

        echo "New password and confirm password must be the same!";

    }

					
					break;
					
case "Update Information":
				
								
					$sql=mysql_query("update user set name='$_POST[name]', student_id='$_POST[student_id]', email='$_POST[email]', dob='$_POST[dob]', address='$_POST[address]', contactnumber='$_POST[contactnumber]', gender='$_POST[gender]', ssc='$_POST[ssc]', hsc='$_POST[hsc]', olevel='$_POST[olevel]', alevel='$_POST[alevel]', blood='$_POST[blood]', interest='$_POST[interest]' where username='$_POST[username]'");
					$_SESSION['msg']="Information Saved Successfully.";
					header("Location:profile.php");

					break;
case "Send":
						$name = $_POST['name'];
						$id = $_POST['student_id'];
						$email = $_POST['email'];
						$message = $_POST['message'];
						
						
		mysql_query("insert into contact(name,student_id,email,message) values ('$name','$student_id','$email','$message') ");
					
					$_SESSION['msg']="Thank You For Your Message";
					header("Location: contact.php");
					break;

case "      Submit Result      ":
					$sql=mysql_query("select * from bac.submit_result where student_id='$_POST[student_id]'");
					$cnt=mysql_num_rows($sql);
					if($cnt>0){
						$_SESSION['msg']="Student Id already exist";
						header("Location: submit_result.php");
						}
                                        else
                                        {
					mysql_query("insert into bac.submit_result
	(id, student_id, quiz, attendence, final_exam, year, semester, ays, section, subject) 
values (null, '$_POST[student_id]', '$_POST[quiz]', '$_POST[attendence]', '$_POST[final_exam]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id1]', '$_POST[quiz1]', '$_POST[attendence1]', '$_POST[final_exam1]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id2]', '$_POST[quiz2]', '$_POST[attendence2]', '$_POST[final_exam2]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id3]', '$_POST[quiz3]', '$_POST[attendence3]', '$_POST[final_exam3]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id4]', '$_POST[quiz4]', '$_POST[attendence4]', '$_POST[final_exam4]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id5]', '$_POST[quiz5]', '$_POST[attendence5]', '$_POST[final_exam5]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id6]', '$_POST[quiz6]', '$_POST[attendence6]', '$_POST[final_exam6]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id7]', '$_POST[quiz7]', '$_POST[attendence7]', '$_POST[final_exam7]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id8]', '$_POST[quiz8]', '$_POST[attendence8]', '$_POST[final_exam8]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id9]', '$_POST[quiz9]', '$_POST[attendence9]', '$_POST[final_exam9]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id10]', '$_POST[quiz10]', '$_POST[attendence10]', '$_POST[final_exam10]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id11]', '$_POST[quiz11]', '$_POST[attendence11]', '$_POST[final_exam11]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id12]', '$_POST[quiz12]', '$_POST[attendence12]', '$_POST[final_exam12]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id13]', '$_POST[quiz13]', '$_POST[attendence13]', '$_POST[final_exam13]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id14]', '$_POST[quiz14]', '$_POST[attendence14]', '$_POST[final_exam14]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id15]', '$_POST[quiz15]', '$_POST[attendence15]', '$_POST[final_exam15]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id16]', '$_POST[quiz16]', '$_POST[attendence16]', '$_POST[final_exam16]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id17]', '$_POST[quiz17]', '$_POST[attendence17]', '$_POST[final_exam17]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id18]', '$_POST[quiz18]', '$_POST[attendence18]', '$_POST[final_exam18]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id19]', '$_POST[quiz19]', '$_POST[attendence19]', '$_POST[final_exam19]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id20]', '$_POST[quiz20]', '$_POST[attendence20]', '$_POST[final_exam20]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id21]', '$_POST[quiz21]', '$_POST[attendence21]', '$_POST[final_exam21]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id22]', '$_POST[quiz22]', '$_POST[attendence22]', '$_POST[final_exam22]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id23]', '$_POST[quiz23]', '$_POST[attendence23]', '$_POST[final_exam23]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id24]', '$_POST[quiz24]', '$_POST[attendence24]', '$_POST[final_exam24]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id25]', '$_POST[quiz25]', '$_POST[attendence25]', '$_POST[final_exam25]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id26]', '$_POST[quiz26]', '$_POST[attendence26]', '$_POST[final_exam26]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id27]', '$_POST[quiz27]', '$_POST[attendence27]', '$_POST[final_exam27]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id28]', '$_POST[quiz28]', '$_POST[attendence28]', '$_POST[final_exam28]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id29]', '$_POST[quiz29]', '$_POST[attendence29]', '$_POST[final_exam29]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id30]', '$_POST[quiz30]', '$_POST[attendence30]', '$_POST[final_exam30]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id31]', '$_POST[quiz31]', '$_POST[attendence31]', '$_POST[final_exam31]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id32]', '$_POST[quiz32]', '$_POST[attendence32]', '$_POST[final_exam32]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id33]', '$_POST[quiz33]', '$_POST[attendence33]', '$_POST[final_exam33]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id34]', '$_POST[quiz34]', '$_POST[attendence34]', '$_POST[final_exam34]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id35]', '$_POST[quiz35]', '$_POST[attendence35]', '$_POST[final_exam35]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id36]', '$_POST[quiz36]', '$_POST[attendence36]', '$_POST[final_exam36]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id37]', '$_POST[quiz37]', '$_POST[attendence37]', '$_POST[final_exam37]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id38]', '$_POST[quiz38]', '$_POST[attendence38]', '$_POST[final_exam38]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id39]', '$_POST[quiz39]', '$_POST[attendence39]', '$_POST[final_exam39]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id40]', '$_POST[quiz40]', '$_POST[attendence40]', '$_POST[final_exam40]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id41]', '$_POST[quiz41]', '$_POST[attendence41]', '$_POST[final_exam41]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id42]', '$_POST[quiz42]', '$_POST[attendence42]', '$_POST[final_exam42]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id43]', '$_POST[quiz43]', '$_POST[attendence43]', '$_POST[final_exam43]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id44]', '$_POST[quiz44]', '$_POST[attendence44]', '$_POST[final_exam44]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id45]', '$_POST[quiz45]', '$_POST[attendence45]', '$_POST[final_exam45]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id46]', '$_POST[quiz46]', '$_POST[attendence46]', '$_POST[final_exam46]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id47]', '$_POST[quiz47]', '$_POST[attendence47]', '$_POST[final_exam47]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id48]', '$_POST[quiz48]', '$_POST[attendence48]', '$_POST[final_exam48]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]'),
(null, '$_POST[student_id49]', '$_POST[quiz49]', '$_POST[attendence49]', '$_POST[final_exam49]', '$_POST[year]', '$_POST[semester], '$_POST[type],'$_POST[ays]', '$_POST[section]', '$_POST[subject]')
");
 mysql_query("delete from bac.submit_result where student_id=0");
	$_SESSION['msg']="Successfully Submitted";
					header("Location: submit_result.php");
					}
					break;
case "Submit Exam Routine":
					$sql=mysql_query("select * from bac.submit_exam_routine where subject='$_POST[subject]'");
					$cnt=mysql_num_rows($sql);
					if($cnt>0){
						$_SESSION['msg']="Subject Already Exists!!!";
						header("Location: submit_exam_routine.php");
						}
                                        else
                                        {
					mysql_query("insert into bac.submit_exam_routine
	(id, subject, date, time, semester, type) 
values (null, '$_POST[subject]', '$_POST[date]', '$_POST[time]', '$_POST[semester]', '$_POST[type]'),
(null, '$_POST[subject1]', '$_POST[date1]', '$_POST[time1]', '$_POST[semester]', '$_POST[type]'),
(null, '$_POST[subject2]', '$_POST[date2]', '$_POST[time2]', '$_POST[semester]', '$_POST[type]'),
(null, '$_POST[subject3]', '$_POST[date3]', '$_POST[time3]', '$_POST[semester]', '$_POST[type]'),
(null, '$_POST[subject4]', '$_POST[date4]', '$_POST[time4]', '$_POST[semester]', '$_POST[type]')
");

	$_SESSION['msg']="Successfully Submitted";
					header("Location: submit_exam_routine.php");
					}
					break;
case "      Save & Change      ":					
					$sql=mysql_query("update submit_exam_routine set subject='$_POST[subject]', date='$_POST[date]', time='$_POST[time]', type='$_POST[type]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_exam_routine_1.php");
					break;
case "      Submit Alumni      ":
					$sql=mysql_query("select * from bac.submit_alumni where student_id='$_POST[student_id]'");
					$cnt=mysql_num_rows($sql);
					if($cnt>0){
						$_SESSION['msg']="Student Id already exist";
						header("Location: submit_alumni.php");
						}
                                        else
                                        {
					mysql_query("insert into bac.submit_alumni
	(id, student_id, name, cgpa, year) 
values (null, '$_POST[student_id]', '$_POST[name]', '$_POST[cgpa]', '$_POST[year]'),
(null, '$_POST[student_id1]', '$_POST[name1]', '$_POST[cgpa1]', '$_POST[year]'),
(null, '$_POST[student_id2]', '$_POST[name2]', '$_POST[cgpa2]', '$_POST[year]'),
(null, '$_POST[student_id3]', '$_POST[name3]', '$_POST[cgpa3]', '$_POST[year]'),
(null, '$_POST[student_id4]', '$_POST[name4]', '$_POST[cgpa4]', '$_POST[year]'),
(null, '$_POST[student_id5]', '$_POST[name5]', '$_POST[cgpa5]', '$_POST[year]'),
(null, '$_POST[student_id6]', '$_POST[name6]', '$_POST[cgpa6]', '$_POST[year]'),
(null, '$_POST[student_id7]', '$_POST[name7]', '$_POST[cgpa7]', '$_POST[year]'),
(null, '$_POST[student_id8]', '$_POST[name8]', '$_POST[cgpa8]', '$_POST[year]'),
(null, '$_POST[student_id9]', '$_POST[name9]', '$_POST[cgpa9]', '$_POST[year]'),
(null, '$_POST[student_id10]', '$_POST[name10]', '$_POST[cgpa10]', '$_POST[year]'),
(null, '$_POST[student_id11]', '$_POST[name11]', '$_POST[cgpa11]', '$_POST[year]'),
(null, '$_POST[student_id12]', '$_POST[name12]', '$_POST[cgpa12]', '$_POST[year]'),
(null, '$_POST[student_id13]', '$_POST[name13]', '$_POST[cgpa13]', '$_POST[year]'),
(null, '$_POST[student_id14]', '$_POST[name14]', '$_POST[cgpa14]', '$_POST[year]'),
(null, '$_POST[student_id15]', '$_POST[name15]', '$_POST[cgpa15]', '$_POST[year]'),
(null, '$_POST[student_id16]', '$_POST[name16]', '$_POST[cgpa16]', '$_POST[year]'),
(null, '$_POST[student_id17]', '$_POST[name17]', '$_POST[cgpa17]', '$_POST[year]'),
(null, '$_POST[student_id18]', '$_POST[name18]', '$_POST[cgpa18]', '$_POST[year]'),
(null, '$_POST[student_id19]', '$_POST[name19]', '$_POST[cgpa19]', '$_POST[year]'),
(null, '$_POST[student_id20]', '$_POST[name20]', '$_POST[cgpa20]', '$_POST[year]'),
(null, '$_POST[student_id21]', '$_POST[name21]', '$_POST[cgpa21]', '$_POST[year]'),
(null, '$_POST[student_id22]', '$_POST[name22]', '$_POST[cgpa22]', '$_POST[year]'),
(null, '$_POST[student_id23]', '$_POST[name23]', '$_POST[cgpa23]', '$_POST[year]'),
(null, '$_POST[student_id24]', '$_POST[name24]', '$_POST[cgpa24]', '$_POST[year]'),
(null, '$_POST[student_id25]', '$_POST[name25]', '$_POST[cgpa25]', '$_POST[year]'),
(null, '$_POST[student_id26]', '$_POST[name26]', '$_POST[cgpa26]', '$_POST[year]'),
(null, '$_POST[student_id27]', '$_POST[name27]', '$_POST[cgpa27]', '$_POST[year]'),
(null, '$_POST[student_id28]', '$_POST[name28]', '$_POST[cgpa28]', '$_POST[year]'),
(null, '$_POST[student_id29]', '$_POST[name29]', '$_POST[cgpa29]', '$_POST[year]'),
(null, '$_POST[student_id30]', '$_POST[name30]', '$_POST[cgpa30]', '$_POST[year]'),
(null, '$_POST[student_id31]', '$_POST[name31]', '$_POST[cgpa31]', '$_POST[year]'),
(null, '$_POST[student_id32]', '$_POST[name32]', '$_POST[cgpa32]', '$_POST[year]'),
(null, '$_POST[student_id33]', '$_POST[name33]', '$_POST[cgpa33]', '$_POST[year]'),
(null, '$_POST[student_id34]', '$_POST[name34]', '$_POST[cgpa34]', '$_POST[year]'),
(null, '$_POST[student_id35]', '$_POST[name35]', '$_POST[cgpa35]', '$_POST[year]'),
(null, '$_POST[student_id36]', '$_POST[name36]', '$_POST[cgpa36]', '$_POST[year]'),
(null, '$_POST[student_id37]', '$_POST[name37]', '$_POST[cgpa37]', '$_POST[year]'),
(null, '$_POST[student_id38]', '$_POST[name38]', '$_POST[cgpa38]', '$_POST[year]'),
(null, '$_POST[student_id39]', '$_POST[name39]', '$_POST[cgpa39]', '$_POST[year]'),
(null, '$_POST[student_id40]', '$_POST[name40]', '$_POST[cgpa40]', '$_POST[year]'),
(null, '$_POST[student_id41]', '$_POST[name41]', '$_POST[cgpa41]', '$_POST[year]'),
(null, '$_POST[student_id42]', '$_POST[name42]', '$_POST[cgpa42]', '$_POST[year]'),
(null, '$_POST[student_id43]', '$_POST[name43]', '$_POST[cgpa43]', '$_POST[year]'),
(null, '$_POST[student_id44]', '$_POST[name44]', '$_POST[cgpa44]', '$_POST[year]'),
(null, '$_POST[student_id45]', '$_POST[name45]', '$_POST[cgpa45]', '$_POST[year]'),
(null, '$_POST[student_id46]', '$_POST[name46]', '$_POST[cgpa46]', '$_POST[year]'),
(null, '$_POST[student_id47]', '$_POST[name47]', '$_POST[cgpa47]', '$_POST[year]'),
(null, '$_POST[student_id48]', '$_POST[name48]', '$_POST[cgpa48]', '$_POST[year]'),
(null, '$_POST[student_id49]', '$_POST[name49]', '$_POST[cgpa49]', '$_POST[year]')
");
 mysql_query("delete from bac.submit_alumni where student_id=0");
	$_SESSION['msg']="Successfully Submitted";
					header("Location: submit_alumni.php");
					}
					break;
case "      Save Alumni     ":					
					$sql=mysql_query("update submit_alumni set student_id='$_POST[student_id]', name='$_POST[name]', cgpa='$_POST[cgpa]', year='$_POST[year]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_alumni_1.php");
					break;	
case "     Submit Lab Result     ":
					$sql=mysql_query("select * from bac.submit_lab_result where student_id='$_POST[student_id]'");
					$cnt=mysql_num_rows($sql);
					if($cnt>0){
						$_SESSION['msg']="Student Id already exist";
						header("Location: submit_lab_result.php");
						}
                                        else
                                        {
					mysql_query("insert into bac.submit_lab_result
	(id, student_id, online, attendence, mid_term, final_exam, assignment_project, subject, section, ays, year, semester) 
values (null, '$_POST[student_id]', '$_POST[online]', '$_POST[attendence]', '$_POST[mid_term]', '$_POST[final_exam]',  '$_POST[assignment_project]',  '$_POST[subject]', '$_POST[section]', '$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id1]', '$_POST[online1]', '$_POST[attendence1]', '$_POST[mid_term1]', '$_POST[final_exam1]',  '$_POST[assignment_project1]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id2]', '$_POST[online2]', '$_POST[attendence2]', '$_POST[mid_term2]', '$_POST[final_exam2]',  '$_POST[assignment_project2]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id3]', '$_POST[online3]', '$_POST[attendence3]', '$_POST[mid_term3]', '$_POST[final_exam3]',  '$_POST[assignment_project3]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id4]', '$_POST[online4]', '$_POST[attendence4]', '$_POST[mid_term4]', '$_POST[final_exam4]',  '$_POST[assignment_project4]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id5]', '$_POST[online5]', '$_POST[attendence5]', '$_POST[mid_term5]', '$_POST[final_exam5]',  '$_POST[assignment_project5]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id6]', '$_POST[online6]', '$_POST[attendence6]', '$_POST[mid_term6]', '$_POST[final_exam6]',  '$_POST[assignment_project6]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id7]', '$_POST[online7]', '$_POST[attendence7]', '$_POST[mid_term7]', '$_POST[final_exam7]',  '$_POST[assignment_project7]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id8]', '$_POST[online8]', '$_POST[attendence8]', '$_POST[mid_term8]', '$_POST[final_exam8]',  '$_POST[assignment_project8]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id9]', '$_POST[online9]', '$_POST[attendence9]', '$_POST[mid_term9]', '$_POST[final_exam9]',  '$_POST[assignment_project9]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id10]', '$_POST[online10]', '$_POST[attendence10]', '$_POST[mid_term10]', '$_POST[final_exam10]',  '$_POST[assignment_project10]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id11]', '$_POST[online11]', '$_POST[attendence11]', '$_POST[mid_term11]', '$_POST[final_exam11]',  '$_POST[assignment_project11]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id12]', '$_POST[online12]', '$_POST[attendence12]', '$_POST[mid_term12]', '$_POST[final_exam12]',  '$_POST[assignment_project12]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id13]', '$_POST[online13]', '$_POST[attendence13]', '$_POST[mid_term13]', '$_POST[final_exam13]',  '$_POST[assignment_project13]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id14]', '$_POST[online14]', '$_POST[attendence14]', '$_POST[mid_term14]', '$_POST[final_exam14]',  '$_POST[assignment_project14]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id15]', '$_POST[online15]', '$_POST[attendence15]', '$_POST[mid_term15]', '$_POST[final_exam15]',  '$_POST[assignment_project15]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id16]', '$_POST[online16]', '$_POST[attendence16]', '$_POST[mid_term16]', '$_POST[final_exam16]',  '$_POST[assignment_project16]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id17]', '$_POST[online17]', '$_POST[attendence17]', '$_POST[mid_term17]', '$_POST[final_exam17]',  '$_POST[assignment_project17]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id18]', '$_POST[online18]', '$_POST[attendence18]', '$_POST[mid_term18]', '$_POST[final_exam18]',  '$_POST[assignment_project18]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id19]', '$_POST[online19]', '$_POST[attendence19]', '$_POST[mid_term19]', '$_POST[final_exam19]',  '$_POST[assignment_project19]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id20]', '$_POST[online20]', '$_POST[attendence20]', '$_POST[mid_term20]', '$_POST[final_exam20]',  '$_POST[assignment_project20]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id21]', '$_POST[online21]', '$_POST[attendence21]', '$_POST[mid_term21]', '$_POST[final_exam21]',  '$_POST[assignment_project21]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id22]', '$_POST[online22]', '$_POST[attendence22]', '$_POST[mid_term22]', '$_POST[final_exam22]',  '$_POST[assignment_project22]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id23]', '$_POST[online23]', '$_POST[attendence23]', '$_POST[mid_term23]', '$_POST[final_exam23]',  '$_POST[assignment_project23]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id24]', '$_POST[online24]', '$_POST[attendence24]', '$_POST[mid_term24]', '$_POST[final_exam24]',  '$_POST[assignment_project24]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id25]', '$_POST[online25]', '$_POST[attendence25]', '$_POST[mid_term25]', '$_POST[final_exam25]',  '$_POST[assignment_project25]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id26]', '$_POST[online26]', '$_POST[attendence26]', '$_POST[mid_term26]', '$_POST[final_exam26]',  '$_POST[assignment_project26]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id27]', '$_POST[online27]', '$_POST[attendence27]', '$_POST[mid_term27]', '$_POST[final_exam27]',  '$_POST[assignment_project27]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id28]', '$_POST[online28]', '$_POST[attendence28]', '$_POST[mid_term28]', '$_POST[final_exam28]',  '$_POST[assignment_project28]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id29]', '$_POST[online29]', '$_POST[attendence29]', '$_POST[mid_term29]', '$_POST[final_exam29]',  '$_POST[assignment_project29]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type]),
(null, '$_POST[student_id30]', '$_POST[online30]', '$_POST[attendence30]', '$_POST[mid_term30]', '$_POST[final_exam30]',  '$_POST[assignment_project30]',  '$_POST[subject]', '$_POST[section]','$_POST[ays]', '$_POST[year]', '$_POST[semester], '$_POST[type])
");
 mysql_query("delete from bac.submit_lab_result where student_id=0");
	$_SESSION['msg']="Successfully Submitted";
					header("Location: submit_lab_result.php");
					}
					break;
case "    Change Lab Result   ":					
					$sql=mysql_query("update submit_lab_result set student_id='$_POST[student_id]', online='$_POST[online]', attendence='$_POST[attendence]', mid_term='$_POST[mid_term]', final_exam='$_POST[final_exam]', assignment_project='$_POST[assignment_project]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_lab_result.php");
					break;
case "     Submit Exam Info     ":
					mysql_query("insert into bac.exam_info
	(id, id_range, room, level, semester, type) 
values (null, '$_POST[id_range]', '$_POST[room]', '$_POST[level]', '$_POST[semester]', '$_POST[type]')
");

			$_SESSION['msg']="Submitted Successfully";
					header("Location:exam_info.php");
					break;
case "      Save Exam Info      ":					
					$sql=mysql_query("update exam_info set id_range='$_POST[id_range]', room='$_POST[room]', level='$_POST[level]', semester='$_POST[semester]', type='$_POST[type]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_exam_info.php");
					break;
case "        Submit Subject        ":
					$sql=mysql_query("select * from bac.subject where subject='$_POST[subject]'");
					$cnt=mysql_num_rows($sql);
					if($cnt>0){
						$_SESSION['msg']="Subject Already Exists!!!";
						header("Location: subject.php");
						}
                                        else
                                        {
					mysql_query("insert into bac.subject
	(id, theory, credit_1, lab, credit_2, semester) 
values (null, '$_POST[theory]', '$_POST[credit_1]', '$_POST[lab]', '$_POST[credit_2]', '$_POST[semester]'),
(null, '$_POST[theory1]', '$_POST[credit_11]', '$_POST[lab1]', '$_POST[credit_21]', '$_POST[semester]'),
(null, '$_POST[theory2]', '$_POST[credit_12]', '$_POST[lab2]', '$_POST[credit_22]', '$_POST[semester]'),
(null, '$_POST[theory3]', '$_POST[credit_13]', '$_POST[lab3]', '$_POST[credit_23]', '$_POST[semester]'),
(null, '$_POST[theory4]', '$_POST[credit_14]', '$_POST[lab4]', '$_POST[credit_24]', '$_POST[semester]')
");

	$_SESSION['msg']="Successfully Submitted";
					header("Location: subject.php");
					}
					break;
case "      Save Subject     ":					
					$sql=mysql_query("update subject set theory='$_POST[theory]', credit_1='$_POST[credit_1]', lab='$_POST[lab]', credit_2='$_POST[credit_2]', semester='$_POST[semester]'where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_subject_1.php");
					break;
case "Submit":
					mysql_query("insert into bac.request
	(id, name, student_id, email, tname, message) 
values (null, '$_POST[name]', '$_POST[student_id]', '$_POST[email]', '$_POST[tname]', '$_POST[message]')
");
header("Location: request.php");
					break;

case "      Save & Change      ":					
					$sql=mysql_query("update submit_exam_routine set subject='$_POST[subject]', date='$_POST[date]', time='$_POST[time]', type='$_POST[type]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_exam_routine_1.php");
					break;
case "  Submit Class Routine  ":
					mysql_query("insert into bac.class
	(id, day, a, b, c, d, e, f, g, h, i, j, k, l, ays, section) 
values (null, '$_POST[day]', '$_POST[1]', '$_POST[2]', '$_POST[3]', '$_POST[4]',  '$_POST[5]',  '$_POST[6]', '$_POST[7]', '$_POST[8]', '$_POST[9]', '$_POST[10]', '$_POST[222]', '$_POST[333]', '$_POST[ays]', '$_POST[section]'),
(null, '$_POST[day1]', '$_POST[11]', '$_POST[21]', '$_POST[31]', '$_POST[41]',  '$_POST[51]',  '$_POST[61]', '$_POST[71]','$_POST[81]', '$_POST[91]', '$_POST[101]', '$_POST[111]', '$_POST[121]', '$_POST[ays]', '$_POST[section]'),
(null, '$_POST[day2]', '$_POST[12]', '$_POST[22]', '$_POST[32]', '$_POST[42]',  '$_POST[52]',  '$_POST[62]', '$_POST[72]','$_POST[82]', '$_POST[92]', '$_POST[102]', '$_POST[112]', '$_POST[122]', '$_POST[ays]', '$_POST[section]'),
(null, '$_POST[day3]', '$_POST[13]', '$_POST[23]', '$_POST[33]', '$_POST[43]',  '$_POST[53]',  '$_POST[63]', '$_POST[73]','$_POST[83]', '$_POST[93]', '$_POST[103]', '$_POST[113]', '$_POST[123]', '$_POST[ays]', '$_POST[section]'),
(null, '$_POST[day4]', '$_POST[14]', '$_POST[24]', '$_POST[34]', '$_POST[44]',  '$_POST[54]',  '$_POST[64]', '$_POST[74]','$_POST[84]', '$_POST[94]', '$_POST[104]', '$_POST[114]', '$_POST[124]', '$_POST[ays]', '$_POST[section]'),
(null, '$_POST[day5]', '$_POST[15]', '$_POST[25]', '$_POST[35]', '$_POST[45]',  '$_POST[55]',  '$_POST[65]', '$_POST[75]','$_POST[85]', '$_POST[95]', '$_POST[105]', '$_POST[115]', '$_POST[125]', '$_POST[ays]', '$_POST[section]'),
(null, '$_POST[day6]', '$_POST[16]', '$_POST[26]', '$_POST[36]', '$_POST[46]',  '$_POST[56]',  '$_POST[66]', '$_POST[76]','$_POST[86]', '$_POST[96]', '$_POST[106]', '$_POST[116]', '$_POST[126]', '$_POST[ays]', '$_POST[section]')
");
	$_SESSION['msg']="Successfully Submitted";
					header("Location: class.php");
					break;
case "Change Class Routine":					
					$sql=mysql_query("update class set day='$_POST[day]', a='$_POST[1]', b='$_POST[2]', c='$_POST[3]', d='$_POST[4]',e='$_POST[5]', f='$_POST[6]', g='$_POST[7]', h='$_POST[8]', i='$_POST[9]', j='$_POST[10]', k='$_POST[222]', l='$_POST[333]', ays='$_POST[ays]',section='$_POST[section]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_class_1.php");
					break;
case "Submit Teacher/Staff":
					mysql_query("insert into bac.teacher
	(id, name, designation, phone, email, type) 
values (null, '$_POST[name]', '$_POST[designation]', '$_POST[phone]', '$_POST[email]', '$_POST[type]')");
	$_SESSION['msg']="Successfully Submitted";
					header("Location:edit_teacher.php");
case "Save Teacher/Other Staff":					
					$sql=mysql_query("update teacher set name='$_POST[name]', designation='$_POST[designation]', phone='$_POST[phone]', email='$_POST[email]', type='$_POST[type]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_teacher_1.php");
					break;
case "Submit And Save":
					mysql_query("insert into bac.news
	(id, description, date, type) 
values (null, '$_POST[description]', '$_POST[date]', '$_POST[type]')");
	$_SESSION['msg']="Successfully Submitted";
					header("Location:news.php");
case "Save The Change":					
					$sql=mysql_query("update news set description='$_POST[description]', date='$_POST[date]', type='$_POST[type]' where id='$_POST[eid]'");
					$_SESSION['msg']="Saved Successfully";
					header("Location:edit_news_1.php");
					break;
case "Submit & Send":
					mysql_query("insert into bac.t_and_p
	(id, name, tname, student_id, message) 
values (null, '$_POST[name]', '$_POST[tname]', '$_POST[student_id]', '$_POST[message]')
");
header("Location: t_and_p.php");
					break;
case "Save":

                    mysql_query("update user set email='$_POST[email]', address='$_POST[address]', contactnumber='$_POST[contactnumber]', interest='$_POST[interest]' where student_id='$_POST[student_id]'");
					$_SESSION['msg']="Successfully Saved";
					header("Location: edit_user.php");
					break;
case "Save change":

                    mysql_query("update user set email='$_POST[email]', address='$_POST[address]', contactnumber='$_POST[contactnumber]', interest='$_POST[interest]' where student_id='$_POST[student_id]'");
					$_SESSION['msg']="Successfully Saved";
					header("Location: edit_user_2.php");
					break;						
default:
					echo "Try Again";
					break;								
	
	}
?>