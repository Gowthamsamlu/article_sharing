<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$rollno = $_POST['rollno'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$yoc = $_POST['yoc'];
	$pass1 = $_POST['pass1'];
	//echo "FName: $fname Lname: $lname ROLLNO: $rollno email: $email dob: $dob gender:$gender yoc:$yoc passw1:$pass1";
	$profilepicpath="profile_pic_uploads/default_image.png";
	if(isset($_FILES["profilepicupload"])){
		$target_dir = "profile_pic_uploads/";
		$target_file = $target_dir.str_replace(" ","",$rollno."_".substr(microtime(),2));
		$imageFileType = strtolower(pathinfo($_FILES["profilepicupload"]["name"],PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["profilepicupload"]["tmp_name"]);
		if($check!=false){
			move_uploaded_file($_FILES["profilepicupload"]["tmp_name"], $target_file.".".$imageFileType);
			$profilepicpath=$target_file.".".$imageFileType;
		}
		else{
			;//$img="File Upload failed";
		}
	}
	$conn = mysqli_connect('localhost','root','','article_share');
	$res = mysqli_query($conn, "SELECT * FROM art_shr_login WHERE ROLL_NO='$rollno'");
	$num = mysqli_num_rows($res);
	if($num==0){
		$sql = "INSERT INTO art_shr_login(FNAME,LNAME,EMAIL,ROLL_NO,DOB,YOC,PASSWORD1,GENDER,PROFILEPICPATH) 
				VALUES ('$fname','$lname','$email','$rollno','$dob','$yoc','$pass1','$gender','$profilepicpath')";
				//echo $sql;
		if(mysqli_query($conn,$sql)){
			session_start();
			$_SESSION['ROLL_NO']=$rollno;
			$_SESSION['FNAME']=$fname;
			$_SESSION['EMAIL_ID'] = $email;
			header('Location:activatemyaccount.php');
		}
	}
	else
		echo "Given RollNo already exists.Forgot Password";
?>