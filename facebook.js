<script>

const usernames = [
	      {
          user:"faiz",
          pass:"12345678",
          }
	];
function login(){
	var username = document.getElementById("uname").value;
	var password = document.getElementById("pass").value;
    
     if(username==""){
       	alert("Pls Enter your Email or Phone No.");
       } 
     else if(password==""){
       	alert("Pls Enter your Password");
       }
   else if(username === usernames[0].user && password === usernames[0].pass){

    	window.location.assign("wctimeline.php");
      
    }else{
    	alert("You have entered wrong username or password:");
    }
     

    }

 </script>