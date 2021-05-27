<?php 






$to_email ="razaqureshi8577@gmail.com";
$subject ="Company Joining Letter";
$body = "Congratulations Raza Qureshi Webchat is hiring you of post of webdesigning ";
$headers = "From:mfaizq786@gmail.com";

if(mail($to_email,$subject,$body,$headers)){
	?>
	<script type="text/javascript">
		alert("Mail Sent Succussfully to $to_email");
	</script>
	<?php
}else{
	?>
	<script type="text/javascript">
		alert("Mail Not Sent to $to_email");
	</script>
	<?php
}


 ?>