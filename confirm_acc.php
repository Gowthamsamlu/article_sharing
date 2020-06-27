<?php
	$conn = mysqli_connect('localhost','root','','article_share');
	$rollno = $_POST['rollno'];
	$user_id = $_POST['userid'];
	$sql = "UPDATE art_shr_login SET AUTHEN_FLG=1 WHERE ROLL_NO='".$rollno."' AND USER_ID='".$user_id."'";
	?>
		<html>
		<body><script>
	<?php
	if(mysqli_query($conn,$sql)){
		?>
		alert('Account successfully activated. SignIn to continue');
		<?php
	}
	else{
		?>
		alert('Account activation failed. Retry later');
		<?php
	}
	?>
	window.location.href='index.html';
</script></body></html>