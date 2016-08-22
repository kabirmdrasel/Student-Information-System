var text="Welcome to BAC, School of IT";
var delay=100;
var currentChar=1;
var destination="[not defined]";
var message="Welcome to BAC, School of IT";
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