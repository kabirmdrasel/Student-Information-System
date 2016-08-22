// form validation function //

function validate(form) {
  var name = form.name.value;
  var nameRegex = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;
  
  var student_id = form.student_id.value;
   
  var email = form.email.value;
  var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/; 
  var dob = form.dob.value;
  var address = form.address.value;
  var contactnumber = form.contactnumber.value;
  var blood = form.blood.value;
  var interest = form.interest.value;
 
  
  
   
  
 
 
  
  
 if(name == "") {
    inlineMsg('name','Please Enter Your Full Name.',2);
    return false;
  }
  if(!name.match(nameRegex)) {
    inlineMsg('name','You Have Entered An Invalid Name.',2);
    return false;
  }
  
  if(student_id == "") {
    inlineMsg('student_id','Enter Your Student ID.',2);
    return false;
  }
  
  if(student_id.length !=10) {
    inlineMsg('student_id','You Must Enter A Valid ID.',2);
    return false;
  }
  
  if(isNaN(student_id)|| student_id.indexOf(" ")!=-1) {
    inlineMsg('student_id','You must enter valid ID.',2);
    return false;
  }
  
  if(email == "") {
    inlineMsg('email','You Must Enter Your Email!',2);
    return false;
  }
  if(!email.match(emailRegex)) {
    inlineMsg('email','Your Email Is Invalid!',2);
    return false;
  }
   
   if(dob == "") {
    inlineMsg('dob','Enter Your Date of Birth!',2);
    return false;
  }
      
   if(address == "") {
    inlineMsg('address','Enter Your Emergency Address!',2);
    return false;
  }
  
  if(contactnumber == "") {
    inlineMsg('contactnumber','Enter Your Emergency Contact!',2);
    return false;
  }
   
    if(blood == 0) {
    inlineMsg('blood','Select Your Blood Group!',2);
    return false;
  }
     
  if(interest == 0) {
    inlineMsg('interest','Select Your Interest!',2);
    return false;
  }
  
  
   
  
  return true;
}

function checkCheckBoxes() {	
	 
    if (document.getElementById("gender1").checked == false &&	    
        document.getElementById("gender2").checked == false )	    
    {
        inlineMsg('gender','You must enter your gender.',2);
        return false;
    }
	if (document.getElementById("ssc").checked == false &&	    
        document.getElementById("hsc").checked == false &&	    
        document.getElementById("alevel").checked == false &&	    
        document.getElementById("olevel").checked == false)	    
    {
        inlineMsg('gender','You must enter your qualification.',2);
        return false;
    }
   return true;
}


// START OF MESSAGE SCRIPT //

var MSGTIMER = 20;
var MSGSPEED = 5;
var MSGOFFSET = 3;
var MSGHIDE = 3;

// build out the divs, set attributes and call the fade function //
function inlineMsg(target,string,autohide) {
  var msg;
  var msgcontent;
  if(!document.getElementById('msg')) {
    msg = document.createElement('div');
    msg.id = 'msg';
    msgcontent = document.createElement('div');
    msgcontent.id = 'msgcontent';
    document.body.appendChild(msg);
    msg.appendChild(msgcontent);
    msg.style.filter = 'alpha(opacity=0)';
    msg.style.opacity = 0;
    msg.alpha = 0;
  } else {
    msg = document.getElementById('msg');
    msgcontent = document.getElementById('msgcontent');
  }
  msgcontent.innerHTML = string;
  msg.style.display = 'block';
  var msgheight = msg.offsetHeight;
  var targetdiv = document.getElementById(target);
  targetdiv.focus();
  var targetheight = targetdiv.offsetHeight;
  var targetwidth = targetdiv.offsetWidth;
  var topposition = topPosition(targetdiv) - ((msgheight - targetheight) / 2);
  var leftposition = leftPosition(targetdiv) + targetwidth + MSGOFFSET;
  msg.style.top = topposition + 'px';
  msg.style.left = leftposition + 'px';
  clearInterval(msg.timer);
  msg.timer = setInterval("fadeMsg(1)", MSGTIMER);
  if(!autohide) {
    autohide = MSGHIDE;  
  }
  window.setTimeout("hideMsg()", (autohide * 1000));
}

// hide the form alert //
function hideMsg(msg) {
  var msg = document.getElementById('msg');
  if(!msg.timer) {
    msg.timer = setInterval("fadeMsg(0)", MSGTIMER);
  }
}

// face the message box //
function fadeMsg(flag) {
  if(flag == null) {
    flag = 1;
  }
  var msg = document.getElementById('msg');
  var value;
  if(flag == 1) {
    value = msg.alpha + MSGSPEED;
  } else {
    value = msg.alpha - MSGSPEED;
  }
  msg.alpha = value;
  msg.style.opacity = (value / 100);
  msg.style.filter = 'alpha(opacity=' + value + ')';
  if(value >= 99) {
    clearInterval(msg.timer);
    msg.timer = null;
  } else if(value <= 1) {
    msg.style.display = "none";
    clearInterval(msg.timer);
  }
}

// calculate the position of the element in relation to the left of the browser //
function leftPosition(target) {
  var left = 0;
  if(target.offsetParent) {
    while(1) {
      left += target.offsetLeft;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;
    }
  } else if(target.x) {
    left += target.x;
  }
  return left;
}

// calculate the position of the element in relation to the top of the browser window //
function topPosition(target) {
  var top = 0;
  if(target.offsetParent) {
    while(1) {
      top += target.offsetTop;
      if(!target.offsetParent) {
        break;
      }
      target = target.offsetParent;

    }
  } else if(target.y) {
    top += target.y;
  }
  return top;
}

// preload the arrow //
if(document.images) {
  arrow = new Image(7,80); 
}// JavaScript Document




