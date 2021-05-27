<?php 

session_start();

if(!isset($_SESSION['emailno'])){
   header('location:index.php');
}

 ?>
<?php include 'login.php';
    $userno = $_GET['eno']; 
	$selectquery = "select * from signupdetails where emailno = $userno";
    $query = mysqli_query($con,$selectquery);   // connect query and database
    $record = mysqli_fetch_array($query); 
	$name = $record['fname'].' '.$record['lname']; 
    
	?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<?php include 'connection.php'; ?>
	<?php include 'css\timeline.css' ?>
	<?php include 'css\userprofile.css' ?>
</head>
<body>
	<!-- <?php include 'login.php';
      $userno = $_GET['eno']; 
	$selectquery = "select * from signupdetails where emailno = $userno";
    $query = mysqli_query($con,$selectquery);   // connect query and database
    $record = mysqli_fetch_array($query); 
	$name = $record['fname'].' '.$record['lname']; 
    
	?> -->
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
					<a href="logout.php" data-toggle="tooltip" title="Account"><i class="fa fa-caret-down"></i></a>
				</div>
			</div>
		</div>

		
	</header>
	<div id="changeprofile">
				<h5>Update Profile Picture</h5><span><i class="fa fa-times" aria-hidden="true" onclick="cross()" id="cross"></i></span>
				<form method="post" enctype="multipart/form-data">
					<div class="box"><i class="fa fa-plus"></i><input type="file" name="file" value="upload" required></div>
                    
                    <input type="submit" name="submit" value="Upload">
                    <?php 
                     if(isset($_POST['submit'])){
                        
                      $filedetails = $_FILES['file'];   /*// its create an array and stores all details of file*/
                      $filename = $filedetails['name'];
                      $fileerror = $filedetails['error'];
                      $tmpname =$filedetails['tmp_name'];
                      $destination = 'usersprofiles/'.$filename;
                      move_uploaded_file($tmpname,$destination);
                      $userno = $_GET['eno']; 
	                  $selectquery = "update signupdetails set profile='$destination' where emailno = $userno";
                      $query = mysqli_query($con,$selectquery);
                         // connect query and database
                       ?>                       
                      <script>
                              window.location.assign("userprofile.php?eno=<?php echo $userno ?>");
                      </script>
                      <?php	
                      
                      
                     }
                     ?>

				</form>
							
	</div>
	<section id="profile-area">
		<div class="cover-photo">
			<div class="profile"><img src="<?php echo $record['profile'] ?>"><i class="fa fa-camera" onclick="updateprofile()"></i></div>
			<script>
				function updateprofile(){
					document.getElementById('changeprofile').style.zIndex="0";
				}
				function cross(){
					document.getElementById('changeprofile').style.zIndex="-1";
				}
				

			</script>
			
            <div class="change-cover-photo"><i class="fa fa-camera"></i><span>Edit Cover Photo</span></div>
		</div>
		
		<h2><?php echo $name ?></h2>
		<h6><a href="#">Add Bio</a></h6>
		<hr>
		<div id="navigation">
			<div class="navigations">
				<ul>
					<li>Posts</li>
					<li>About</li>
					<li>Friends&nbsp<span><?php echo '2587' ?></span></li>
					<li>Photos</li>
					<li>More <i class="fa fa-caret-down"></i></li>
				</ul>
			</div>
			<div class="navigations">
				<div class="add-story"><i class="fa fa-plus"></i><span>Add to Story</span></div>
				<div class="edit-profile"><i class="fa fa-edit"></i><span>Edit Profile</span></div>
				<div class="dots"><span>...</span></div>
			</div>
		</div>

	</section>

	<!--------- Body section start ------->
	<section class="body">

	    <div class="part-1">
		<div class="userinfo">
			<h5>Intro</h5>
			<ul>
				<li><i class="fa fa-briefcase"></i><span><a href="#">Study(Chess)</a></span></li>
				<li><i class="fa fa-graduation-cap"></i><span>Studies at <a href="#"> SMS Lucknow</a></span></li>
				<li><i class="fa fa-graduation-cap"></i><span>Goes to <a href="#"> Bal Vidya Mandir</a></span></li>
				<li><i class="fa fa-graduation-cap"></i><span>Went to <a href="#"> City Monetessori School</a></span></li>
				<li><i class="fa fa-home"></i><span>Lives in <a href="#"> Lucknow, Uttar Pradesh</a></span></li>
				<li><i class="fa fa-map-marker"></i><span>From <a href="#"> Lucknow, Uttar Pradesh</a></span></li>
				<li class="buttons"><input type="submit" name="" value="Edit details"></li>
				<li class="buttons"><input type="submit" name="" value="Add Hobies"></li>
				<li class="buttons"><input type="submit" name="" value="Edit Featured"></li>
			</ul>
		</div>
		<div class="userphotos">
			   <h5><a href="#">Photos</a><span><a href="#">See All Photos</a></span></h5>
		</div>
		<div class="userfriends">
			   <h5><a href="#">Friends</a><span><a href="#">See All Friends</a></span></h5>
		</div>
	    
	    </div>

	   <!--  part-1 over -->
	   <div class="part-2">
	   	<!-- write some text -->
	   	 <div class="writesometext">
	   	 	<div class="parts">
	   	 		<img src="<?php echo $record['profile'] ?>" onclick="link()"><input type="text" name=""  value="What's on Your Mind?" disabled>
	   	 		
	   	 		<script>
	   	 			function link(){	   	 				
                 window.location.assign("userprofile.php?eno=8957134631#");       
	   	 			}
	   	 		</script>	   	 		
	   	 	</div>
	   	 	<hr color="grey">
	   	 	<div class="parts one">
	   	 		<div class="elements"><i class="fa fa-video-camera"></i><span>Live video</span></div>
	   	 		<div class="elements"><i class="fa fa-picture-o"></i><span>Photo/Video</span></div>
	   	 		<div class="elements"><i class="fa fa-flag"></i><span>Life Event</span></div>
	   	 	</div>
	   	 </div>

	   	<!--  posts box -->
	   	<div class="post-box">
	   		<div class="one">
	   			<span class="post">Posts</span>
	   		   <div class="filters"><i class="fa fa-sliders"></i><span>Filters</span></div>
	   			<div class="setting"><i class="fa fa-cog"></i><span>Manage Posts</span></div>
	   		</div>
	   		<div class="two">
	   			<div class="views">
	   				<div class="list-view"><i class="fa fa-bars"></i><span>List view</span></div>
	   			</div>
	   			<div class="views">
	   				<div class="grid-view"><i class="fa fa-th-large"></i><span>Grid view</span></div>
	   			</div>
	   		</div>
	   	</div>
	   </div>
	</section>

</body>
</html>