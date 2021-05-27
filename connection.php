<?php  

$username="root";
$password="";
$server='localhost';
$db='facebook';

$con = mysqli_connect($server,$username,$password,$db);

if(!$con){
	?>
	<script>alert("Not Successfully..")</script>
	<?php
}

?>