
<?php 

include 'connection.php';



if(isset($_POST['login'])){

  	$user = $_POST['user'];
    $pass = $_POST['pass'];
    if($user==""){
      ?>
      <script>
        alert("Pls Enter your Email or Phone No.");
        </script>
        <?php
       } 
       else if($pass==""){
      ?>
      <script>
        alert("Pls Enter your Password");
        </script>
        <?php
       }

    $selectquery = "select * from signupdetails where emailno='$user'";
    $query = mysqli_query($con,$selectquery);   // connect query and database
    $check = 'true';
    
    
    $record = mysqli_fetch_array($query);  //  fetching all records
    $_SESSION['emailno'] = $record['emailno'];
    
    if($user == $record['emailno'] && $pass == $record['password']){
    	?>
    	<script type="text/javascript">
        window.location.assign("wctimeline.php?eno=<?php echo $user ?>");
      </script>
       
    	<?php
    	 $check = 'true';
    }else{
    	$check = 'false';
    }

 //while end
      if($check == 'false'){
      	
    	?>
    	<script type="text/javascript">alert("You  Have Entered Wrong username and password..");
          window.location.assign("index.php");
        </script>
    	<?php
       
      }    

}


?>