
var phoneNum =document.getElementById("phone-num");
//Clean phone number from any alphabet

function cleanPhoneNum()
{
     var v = phoneNum.value.replace(/\D+/gi, "");
      if(v.length>10)
         v=v.substring(0,10);
     if(v.length>3)
     {
         v = v.substring(0, 3)+ "-" + v.substring(3);
     }
     if(v.length>7)
     {
         v = v.substring(0, 7)+ "-" + v.substring(7);
     }

    phoneNum.value=v;
}



