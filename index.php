<?php 

session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>www.webchat.com</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <style>
		.body-parts-2 h2{
	color:red;
	font-size:35px;
	font-family: arial;
	padding-left: 2%;
	padding-top: 3%;
}
	</style> -->
	<?php include 'style.css' ?>
	<?php include 'facebook.js' ?>

</head>
<body>
	<header>
		<div id="face-heading">WebChat</div>
		<div id="login-input">
			<form action="" method="post">
				<div class="input-feilds">
					<span>Email or phone</span><br><input type="text" name="user" id="uname">
				</div>
				<div class="input-feilds">
					<span>Password</span><br><input type="Password" name="pass" id="pass">
					<label class="msg-show">Forgotten account?</label>
				</div>
				<input type="submit" name="login" value="Log In" onclick="">
				
			</form>
		</div>
		
	</header>
	<section id="fb-body">
		<!----------body part 1 --------->
		<div class="body-parts-1">
			<h2>Recent Logins</h2>
			<h3>Click your picture or add an account.</h3>
			<div id="recent-log">
				<div class="profiles-1"><img src="1.jpg"></div>
				<div class="profiles-2"><img src="2.jpg"></div>
				<div class="profiles-3"></div>
			</div>
		</div>
		
		<!----------body part 2 --------->
		<div class="body-parts-2">
			<h2>Create a new account</h2>
			<h3>It's quick and easy</h3>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
				<input type="text" name="fname" placeholder="First name" required/>
				<input type="text" name="lname" placeholder="Surname" required/><br>
				<input type="email_number" name="emailno" placeholder="Mobile no or email address" required/><br>
				<input type="password" name="password" placeholder="New password" required/><br>
				<span class="span-1">Birthday</span><br>
				<select value="01" name="date" >
					<option>01</option>
					<option>02</option>
					<option>03</option>
					<option>04</option>
					<option>05</option>
					<option>06</option>
					<option>07</option>
					<option>08</option>
					<option>09</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
					<option>14</option>
					<option>15</option>
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>
					<option>25</option>
					<option>26</option>
					<option>27</option>
					<option>28</option>
					<option>29</option>
					<option>30</option>
					<option>31</option>

				</select>
				<select value="01" name="month">
					<option>01</option>
					<option>02</option>
					<option>03</option>
					<option>04</option>
					<option>05</option>
					<option>06</option>
					<option>07</option>
					<option>08</option>
					<option>09</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
				</select>
				<select value="2000" name="year">
					<option>2000</option>
					<option>2001</option>
					<option>2002</option>
					<option>2003</option>
					<option>2004</option>
					<option>2005</option>
					<option>2006</option>
					<option>2007</option>
					<option>2008</option>
					<option>2009</option>
					<option>2010</option>
					<option>2011</option>
					<option>2012</option>
					<option>2013</option>
					<option>2014</option>
					<option>2015</option>
					<option>2016</option>
					<option>2017</option>
					<option>2018</option>
					<option>2019</option>
					<option>2020</option>
				</select> &nbsp&nbsp<i class="fa fa-question-circle" class="icons"></i><br>
				<span class="span-2">Gender</span><br>
				<input type="radio" name="gender" value="female"> Female    &nbsp     <input type="radio" name="gender" value="male"> Male    &nbsp     <input type="radio" name="gender" value="custom"> Custom &nbsp&nbsp&nbsp<i class="fa fa-question-circle" class="icons"></i>
				<p>By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Data Policy</a> and <br><a href="#">Cookie Policy</a>. You may receive SMS notifications from us and<br>can opt out at any time.</p>
                <input type="submit" name="signup" value="Sign Up" class="sign-up btn">
                <hr>
                <p id="para"><a href="#">Create a Page</a> for a celebrity, band and business.</p>
				
				
			</form>
		</div>
		
	</section>

<!-- <script type="text/javascript" src="facebook.js"></script> -->
</body>
</html>
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
   $insertquery = "insert into signupdetails(fname,lname,emailno,password,dob,gender) values('$fn','$ln','$ENum','$pass','$dob','$gender')";

   $res = mysqli_query($con,$insertquery);

   if($res){

       ?>
       <script>
       alert("Insert Successfully..");
       </script>
     <?php 
          
    }else{
      ?>
      <script>
        alert("Not Inserted..");
      </script>
     <?php 
      
    }

}

?>
<?php

include 'login.php';

?>
