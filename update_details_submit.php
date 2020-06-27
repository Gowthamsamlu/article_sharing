<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$rollno = $_POST['rollno'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$yoc = $_POST['yoc'];
	$pass1 = $_POST['pass1'];
	session_start();
	$conn = mysqli_connect('localhost','root','','article_share');
	$img="";
	if(isset($_FILES["profile_pic_upload"])){
		$target_dir = "profile_pic_uploads/";
		$target_file = $target_dir.str_replace(" ","",$rollno."_".substr(microtime(),2));
		$imageFileType = strtolower(pathinfo($_FILES["profile_pic_upload"]["name"],PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["profile_pic_upload"]["tmp_name"]);
		if($check!=false){
			move_uploaded_file($_FILES["profile_pic_upload"]["tmp_name"], $target_file.".".$imageFileType);
			$update_pic_sql = "UPDATE art_shr_login SET PROFILEPICPATH='".$target_file.".".$imageFileType."' WHERE USER_ID=".$_SESSION['USER_ID'];
			mysqli_query($conn, $update_pic_sql);
			$img="Profile pic upload successful";
		}
		else{
			;//$img="File Upload failed";
		}
	}
	//echo "FName: $fname Lname: $lname ROLLNO: $rollno email: $email dob: $dob gender:$gender yoc:$yoc passw1:$pass1";
	$update_sql = "UPDATE art_shr_login SET FNAME='$fname', LNAME='$lname',ROLL_NO='$rollno',EMAIL='$email',DOB='$dob', YOC='$yoc', PASSWORD1='$pass1', GENDER='$gender' WHERE USER_ID=".$_SESSION['USER_ID'];
	mysqli_query($conn,$update_sql);
?>
<script>
alert('Details updated successfully. <?php echo $img ?>');
window.location.href='signin.html';
	</script>