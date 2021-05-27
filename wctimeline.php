<?php 

session_start();

if(!isset($_SESSION['emailno'])){
   header('location:index.php');
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>www.webchat.com</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<?php include 'connection.php'; ?>
	<?php include 'css\timeline.css' ?>

</head>
<body id="body">
	<?php include 'login.php';
      $userno = $_GET['eno']; 
	$selectquery = "select * from signupdetails where emailno = $userno";
    $query = mysqli_query($con,$selectquery);   // connect query and database
    $record = mysqli_fetch_array($query); 
	$name = $record['fname'].' '.$record['lname']; 
    
	?>
	<!------- header part ------->
	<header>
		<div class="logo-search">
			
			<div id="logo"><i class="fa fa-weixin" aria-hidden="true"></i></div>
			
			<div id="search-bar">
			<div class="icon-1"><i class="fa fa-search"></i></div>
			<div class="search"><input type="text" name="search" placeholder="Search WebChatters"/></div>
			<div class="icon-2"></div>
			</div>		
		
		</div>
		<!---------- navbar-start -------------->
		<div class="navbar">
			<div class="menu"><a href="wctimeline.php?eno=<?php echo $userno ?>" data-toggle="tooltip" data-placement="bottom" title="Home" onclick="changeborder()" id="menu-1">
				<i class="fa fa-home"></i></a></div>
			<div class="menu"><a href="mediaplay.php" data-toggle="tooltip" title="play">
				<i class="fa fa-viadeo-square"></i></a></div>
			<div class="menu"><a href="marketplace.php" data-toggle="tooltip" title="Marketplace"><i class="fa fa-shopping-basket"></i></a></div>
			<div class="menu"><a href="Groups.php" data-toggle="tooltip" title="Groups"><i class="fa fa-users"></i></a></div>
			<div class="menu"><a href="#" data-toggle="tooltip" title="Games"><i class="fa fa-gamepad"></i></a></div>
		</div>

		<!--------- logout-nav start ------>
		<div class="logout-nav">
			<div class="parts">
				<div id="logo"><img src="<?php echo $record['profile'] ?>"></div>
				<span><?php echo $record['fname'] ?></span>
			</div>
			<div class="parts">
				<div class="options">
					<a href="#" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
				</div>
				<div class="options">
					<a href="#" data-toggle="tooltip" title="Chatting"><i class="fa fa-commenting"></i></a>
				</div>
				<div class="options">
					<a href="#" data-toggle="tooltip" title="Notifications"><i class="fa fa-bell"></i></a>
				</div>
				<div class="options">
					<a href="logout.php" data-toggle="tooltip" title="Account"><i class="fa fa-caret-down" onclick="logout()"></i></a>

				</div>
			</div>
		</div>

		
	</header>


    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script type="text/javascript">
    	function changeborder(){
    		var x = document.getElementById("menu-1");
    		x.style.borderColor = "purple";
    	}
    </script>
   <!-------- header-ends ---->
    <!--    Main Body starts--------->

    <section id="main-body">
    	<div class="body-part-left">
    		<ul>
    			<a href="userprofile.php?eno=<?php echo $userno ?>"><li><img src="<?php echo $record['profile'] ?>"><span><?php echo $name ?></span></li></a>
    			<li><i class="fa fa-facebook"></i><span>COVID-19 Information Center</span></li>
    			<li><i class="fa fa-user"></i><span>Friends</span></li>
    			<li><i class="fa fa-facebook"></i><span>Most recent</span></li>
    			<li><i class="fa fa-star"></i><span>Favourites</span></li>
    			<li><i class="fa fa-users"></i><span>Groups</span></li>
    			<li><i class="fa fa-shopping-basket"></i><span>Marketplace</span></li>
    			<li><i class="fa fa-television"></i><span>Watch</span></li>
    			<li><i class="fa fa-calendar"></i><span>Events</span></li>
    			<li><i class="fa fa-facebook"></i><span>Ad Center</span></li>
    			<li><i class="fa fa-facebook"></i><span>Ads Manager</span></li>
    			<li><i class="fa fa-tint"></i><span>Blood Donations</span></li>
    			<li><i class="fa fa-facebook"></i><span>Climate Science information Center</span></li>
    			<li><i class="fa fa-facebook"></i><span>Community Help</span></li>
    			<li><i class="fa fa-youtube"></i><span>Films</span></li>
    			<li><i class="fa fa-facebook"></i><span>Friend lists</span></li>
    			<li><i class="fa fa-facebook"></i><span>Fundraisers</span></li>
    			<li><i class="fa fa-gamepad"></i><span>Games</span></li>
    			<li><i class="fa fa-camera"></i><span>Gaming video</span></li>
    			<li><i class="fa fa-facebook"></i><span>Jobs</span></li>
    			<li><i class="fa fa-facebook"></i><span>Live videos</span></li>
    			<li><i class="fa fa-facebook"></i><span>Memories</span></li>
    			<li><i class="fa fa-commenting"></i><span>Messenger</span></li>
    			<li><i class="fa fa-facebook"></i><span>Messenger kids</span></li>
    			<li><i class="fa fa-facebook"></i><span>Offers</span></li>
    			<li><i class="fa fa-file-o"></i><span>Pages</span></li>
    		</ul>
    	</div>

    	<!-- ------------main part start------------->
    <div id="blur">
        <div id="create-post">
        	<h5>Create Post</h5><span><i class="fa fa-times" aria-hidden="true" onclick="cross()" id="cross"></i></span>
        	<hr color="grey">
        	<div id="box">
        		<img src="<?php echo $record['profile'] ?>"><span><?php echo $name ?></span>
        	</div>
        	<form method="post">
        		<!-- <input type="text" name="text" placeholder="What's on Your Mind, <?php echo $record['fname'] ?>?"> -->
        		<textarea name="text" placeholder="What's on Your Mind, <?php echo $record['fname'] ?>?"></textarea>
        	    <input type="submit" name="submit" value="Post">
        	    <?php 
                 
                 if(isset($_POST['submit'])){
                    $user = $_GET['eno'];
                 	$utext = $_POST['text'];
                 	$insert = "insert into userspost (emailno,text) values('$user','$utext')";
                 	$query = mysqli_query($con,$insert);
                 	?>
                 	<script type="text/javascript">
                 		window.location.assign("wctimeline.php?eno=<?php echo $user ?>")
                 	</script>
                 	<?php
                 }

        	     ?>
        	</form>
        	
        </div>  
    </div>
    	<div class="body-part-main">

    		<!-------- write some text------>
    		<div class="writesometext">
	   	 	<div class="parts">
	   	 		<img src="<?php echo $record['profile'] ?>" onclick="link()"><span onclick="call()"><input type="text" name=""  value="What's on Your Mind, <?php echo $record['fname'] ?>?" disabled ><span>
	   	 		
	   	 		<script>
	   	 			function link(){	   	 				
                 window.location.assign("userprofile.php?eno=8957134631#");       
	   	 			}
	   	 			
	   	 			function call(){
	   	 				document.getElementById('create-post').style.zIndex="250";
	   	 				document.getElementById('blur').style.zIndex="200";



	   	 			}
	   	 			
	   	 			function cross(){
					document.getElementById('create-post').style.zIndex="-1";
					document.getElementById('blur').style.zIndex="-1";
				}
	   	 		</script>	   	 		
	   	 	</div>
	   	 	<hr color="grey">
	   	 	<div class="parts one">
	   	 		<div class="elements"><i class="fa fa-video-camera"></i><span>Live video</span></div>
	   	 		<div class="elements"><i class="fa fa-picture-o"></i><span>Photo/Video</span></div>
	   	 		<div class="elements"><i class="fa fa-smile-o"></i><span>Feeling/Activity</span></div>
	   	 	</div>
	   	 </div>

         <!------- output area ------->
          <?php 
             $user = $_GET['eno'];
            $selectq = "Select * from signupdetails,userspost where signupdetails.emailno = userspost.emailno order by postno desc";
             $q = mysqli_query($con,$selectq);
             
             while( $result = mysqli_fetch_array($q)){
        	 ?>
         <div class="outputs">
         	<div id="box">
        		<img src="<?php echo $result['profile'] ?>"><span><?php echo $result['fname'].' '.$result['lname'] ?></span>
        	</div>
        	
        	<div class="post"><?php echo $result['text'] ?></div>
        	<div class="like-comment">
        		<div class="like"><i class="fa fa-thumbs-o-up"></i>&nbsp&nbspLike</div>
        		<div class="comment"><i class="fa fa-commenting"></i>&nbsp&nbspComment</div>
        	</div>
         </div>
         <?php
         }
          ?>
    	</div>




    	<!--------- body-right-part ------------>
    	<div class="body-part-right">
    		<h1>Kaam <br>Abhi <br>Chal <br>Raha <br>hai</h1>
    	</div>
    </section>
</body>
</html>

