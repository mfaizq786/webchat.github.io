<?php

include 'connection.php';

if(isset($_POST['signup'])){
	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$ENum = $_POST['emailno'];
	$pass = $_POST['password'];
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$dob = $year.'-'.$month.'-'.$date;

	$gender = $_POST['gender'];

  echo $fn; 
   
   $insertquery = "insert into signupdetails (fname,lname,emailno,password,dob,gender) values('$fn','$ln','ENum','$pass',$dob,'$gender')";

   $res = mysqli_query($con,$insertquery);

   if($res){

       ?>
       <script>
       alert("Insert Successfully..");
       </script>
     <?php 
     header("location:index.php");       
    }else{
      ?>
      <script>
        alert("Not Inserted..");
      </script>
     <?php 
      header("location:index.php");
    }

}

?>