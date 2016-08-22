// form validation function //

function validate(form) {
  var subject = form.subject.value;
  var subjectRegex = /^[a-zA-Z\ ]+[a-zA-Z]*$/;
  var subject1 = form.subject1.value;
  var subject1Regex = /^[a-zA-Z\ ]+[a-zA-Z]*$/;
  var subject2 = form.subject2.value;
  var subject2Regex = /^[a-zA-Z\ ]+[a-zA-Z]*$/;
  var subject3 = form.subject3.value;
  var subject3Regex = /^[a-zA-Z\ ]+[a-zA-Z]*$/;
  var subject4 = form.subject4.value;
  var subject4Regex = /^[a-zA-Z\ ]+[a-zA-Z]*$/;

  var date = form.date.value;
  var dateRegex = /^[0-9\-]+[0-9\-]+[0-9\-]*$/;
  var date1 = form.date1.value;
  var date1Regex = /^[0-9\-]+[0-9\-]+[0-9\-]*$/;
  var date2 = form.date2.value;
  var date2Regex = /^[0-9\-]+[0-9\-]+[0-9\-]*$/;
  var date3 = form.date3.value;
  var date3Regex = /^[0-9\-]+[0-9\-]+[0-9\-]*$/;
  var date4 = form.date4.value;
  var date4Regex = /^[0-9\-]+[0-9\-]+[0-9\-]*$/;

  var time = form.time.value;
  var timeRegex = /^[0-9\:\0-9]*$/;
  var time1 = form.time1.value;
  var time1Regex = /^[0-9\:\0-9]*$/;
  var time2 = form.time2.value;
  var time2Regex = /^[0-9\:\0-9]*$/;
  var time3 = form.time3.value;
  var time3Regex = /^[0-9\:\0-9]*$/;
  var time4 = form.time4.value;
  var time4Regex = /^[0-9\:\0-9]*$/; 
  
  if(!subject.match(subjectRegex)) {
    inlineMsg('subject','Invalid Subject!',2);
    return false;
  }
  if(!subject1.match(subject1Regex)) {
    inlineMsg('subject1','Invalid Subject!',2);
    return false;
  }
  if(!subject2.match(subject2Regex)) {
    inlineMsg('subject2','Invalid Subject!',2);
    return false;
  }
  if(!subject3.match(subject3Regex)) {
    inlineMsg('subject3','Invalid Subject!',2);
    return false;
  }
  if(!subject4.match(subject4Regex)) {
    inlineMsg('subject4','Invalid Subject!',2);
    return false;
  }

  if(!date.match(dateRegex)) {
    inlineMsg('date','Invalid Date!',2);
    return false;
  }
  if(!date1.match(date1Regex)) {
    inlineMsg('date1','Invalid Date!',2);
    return false;
  }
  if(!date2.match(date2Regex)) {
    inlineMsg('date2','Invalid Date!',2);
    return false;
  }
  if(!date3.match(date3Regex)) {
    inlineMsg('date3','Invalid Date!',2);
    return false;
  }
  
 if(!date4.match(date4Regex)) {
    inlineMsg('date4','Invalid Date!',2);
    return false;
  }

  if(!time.match(timeRegex)) {
    inlineMsg('time','Invalid Time!',2);
    return false;
  }
  if(!time1.match(time1Regex)) {
    inlineMsg('time1','Invalid Time!',2);
    return false;
  }
  if(!time2.match(time2Regex)) {
    inlineMsg('time2','Invalid Time!',2);
    return false;
  }
  if(!time3.match(time3Regex)) {
    inlineMsg('time3','Invalid Time!',2);
    return false;
  }
  
 if(!time4.match(time4Regex)) {
    inlineMsg('time4','Invalid Time!',2);
    return false;
  }

 if(subject == "") {
    inlineMsg('subject','Enter The Subject',2);
    return false;
  }

 if(date == "") {
    inlineMsg('date','Enter The date',2);
    return false;
  }

 if(time == "") {
    inlineMsg('time','Enter The time',2);
    return false;
  }

 if(subject1 == "") {
    inlineMsg('subject1','Enter The Subject',2);
    return false;
  }

 if(date1 == "") {
    inlineMsg('date1','Enter The date',2);
    return false;
  }

 if(time1 == "") {
    inlineMsg('time1','Enter The time',2);
    return false;
  }
 if(subject2 == "") {
    inlineMsg('subject2','Enter The Subject',2);
    return false;
  }

 if(date2 == "") {
    inlineMsg('date2','Enter The date',2);
    return false;
  }

 if(time2 == "") {
    inlineMsg('time2','Enter The time',2);
    return false;
  }

 if(subject3 == "") {
    inlineMsg('subject3','Enter The Subject',2);
    return false;
  }
 
if(date3 == "") {
    inlineMsg('date3','Enter The date',2);
    return false;
  }

 if(time3 == "") {
    inlineMsg('time3','Enter The time',2);
    return false;
  }
 if(subject4 == "") {
    inlineMsg('subject4','Enter The Subject',2);
    return false;
  }

  if(date4 == "") {
    inlineMsg('date4','Enter The date',2);
    return false;
  }

 if(time4 == "") {
    inlineMsg('time4','Enter The time',2);
    return false;
  }

   if(subject == subject1) 
  {
    inlineMsg('subject1','Same Subject!',2);
    return false;
  }
   if(subject == subject2) 
  {
    inlineMsg('subject2','Same Subject!',2);
    return false;
  }
   if(subject == subject3) 
  {
    inlineMsg('subject3','Same Subject!',2);
    return false;
  }
   if(subject == subject4) 
  {
    inlineMsg('subject4','Same Subject!',2);
    return false;
  }

   if(subject1 == subject) 
  {
    inlineMsg('subject','Same Subject!',2);
    return false;
  }
   if(subject1 == subject2) 
  {
    inlineMsg('subject2','Same Subject!',2);
    return false;
  }
   if(subject1 == subject3) 
  {
    inlineMsg('subject3','Same Subject!',2);
    return false;
  }

   if(subject1 == subject4) 
  {
    inlineMsg('subject4','Same Subject!',2);
    return false;
  }

   if(subject2 == subject) 
  {
    inlineMsg('subject','Same Subject!',2);
    return false;
  }
   if(subject2 == subject1) 
  {
    inlineMsg('subject1','Same Subject!',2);
    return false;
  }
   if(subject2 == subject3) 
  {
    inlineMsg('subject3','Same Subject!',2);
    return false;
  }

   if(subject2 == subject4) 
  {
    inlineMsg('subject4','Same Subject!',2);
    return false;
  }

   if(subject3 == subject) 
  {
    inlineMsg('subject','Same Subject!',2);
    return false;
  }
   if(subject3 == subject1) 
  {
    inlineMsg('subject1','Same Subject!',2);
    return false;
  }
   if(subject3 == subject2) 
  {
    inlineMsg('subject2','Same Subject!',2);
    return false;
  }

   if(subject3 == subject4) 
  {
    inlineMsg('subject4','Same Subject!',2);
    return false;
  }
   
   if(subject4 == subject) 
  {
    inlineMsg('subject','Same Subject!',2);
    return false;
  }
   if(subject4 == subject1) 
  {
    inlineMsg('subject1','Same Subject!',2);
    return false;
  }
   if(subject4 == subject2) 
  {
    inlineMsg('subject2','Same Subject!',2);
    return false;
  }

   if(subject4 == subject3) 
  {
    inlineMsg('subject3','Same Subject!',2);
    return false;
  }




   if(date == date1) 
  {
    inlineMsg('date1','Same Date!',2);
    return false;
  }
   if(date == date2) 
  {
    inlineMsg('date2','Same Date!',2);
    return false;
  }
   if(date == date3) 
  {
    inlineMsg('date3','Same Date!',2);
    return false;
  }
   if(date == date4) 
  {
    inlineMsg('date4','Same Date!',2);
    return false;
  }

   if(date1 == date) 
  {
    inlineMsg('date','Same Date!',2);
    return false;
  }
   if(date1 == date2) 
  {
    inlineMsg('date2','Same Date!',2);
    return false;
  }
   if(date1 == date3) 
  {
    inlineMsg('date3','Same Date!',2);
    return false;
  }

   if(date1 == date4) 
  {
    inlineMsg('date4','Same Date!',2);
    return false;
  }

   if(date2 == date) 
  {
    inlineMsg('date','Same Date!',2);
    return false;
  }
   if(date2 == date1) 
  {
    inlineMsg('date1','Same Date!',2);
    return false;
  }
   if(date2 == date3) 
  {
    inlineMsg('date3','Same Date!',2);
    return false;
  }

   if(date2 == date4) 
  {
    inlineMsg('date4','Same Date!',2);
    return false;
  }

   if(date3 == date) 
  {
    inlineMsg('date','Same Date!',2);
    return false;
  }
   if(date3 == date1) 
  {
    inlineMsg('date1','Same Date!',2);
    return false;
  }
   if(date3 == date2) 
  {
    inlineMsg('date2','Same Date!',2);
    return false;
  }

   if(date3 == date4) 
  {
    inlineMsg('date4','Same Date!',2);
    return false;
  }
   
   if(date4 == date) 
  {
    inlineMsg('date','Same Date!',2);
    return false;
  }
   if(date4 == date1) 
  {
    inlineMsg('date1','Same Date!',2);
    return false;
  }
   if(date4 == date2) 
  {
    inlineMsg('date2','Same Date!',2);
    return false;
  }

   if(date4 == date3) 
  {
    inlineMsg('date3','Same Date!',2);
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




