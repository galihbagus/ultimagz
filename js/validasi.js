
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8){ 
		if (unicode<48||unicode>57)
								return false 
	}
}

function letternumber(e)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// alphas and numbers
else if ((("abcdefghijklmnopqrstuvwxyz0123456789_").indexOf(keychar) > -1))
   return true;
else
   return false;
}

function letter(e)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();

// control keys
if ((key==null) || (key==0) || (key==8) || 
    (key==9) || (key==13) || (key==27) )
   return true;

// alphas and numbers
else if ((("abcdefghijklmnopqrstuvwxyz ").indexOf(keychar) > -1))
   return true;
else
   return false;
}

function checkpass(){
    
      var pass1 = document.getElementById('password');
      var pass2 = document.getElementById('cpassword');
  
      var message = document.getElementById('passwordcheck');

      var goodColor = "#66cc66";
      var badColor = "#ff6666";

	  if(pass1.value.length<6){

        message.style.color = badColor;
        message.innerHTML = "Passwords need to be 6 character or more!"
	  
	  
	  }
	  
      else if(pass1.value == pass2.value){
 
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
      }else{
 
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
      }
    }  
  

function checknim(){

      var nim = document.getElementById('nim');
      var message = document.getElementById('nimcheck');
   
      var goodColor = "#66cc66";
      var badColor = "#ff6666";
   
	  if(nim.value.length<11){
	
        message.style.color = badColor;
        message.innerHTML = "NIM need to be 11 character"
      }else{
     
		
        message.style.color = goodColor;
        message.innerHTML = "NIM correct"
      }
    }  
function checknama(){
     
      var nim = document.getElementById('nama');
      var message = document.getElementById('namacheck');

      var goodColor = "#66cc66";
      var badColor = "#ff6666";
      
	  if(nim.value.length<2){

        message.style.color = badColor;
        message.innerHTML = "Name must be 3 character or more !"
      }else{
       
        message.style.color = goodColor;
        message.innerHTML = "Name correct"
      }
    }  


