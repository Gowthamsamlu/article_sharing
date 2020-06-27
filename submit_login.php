<?php
	$rollno = $_POST['rollno'];
	$passw1 = $_POST['pass1'];
	$conn = mysqli_connect('localhost','root','','article_share');
	$res = mysqli_query($conn, "SELECT * FROM art_shr_login WHERE ROLL_NO='$rollno' AND PASSWORD1='$passw1'");
	$num = mysqli_num_rows($res);
	if($num==1){
		session_start();
		$row = mysqli_fetch_array($res);
		$_SESSION['USER_ID'] = $row[0];
		$_SESSION['ROLL_NO'] = $row[4];
		$_SESSION['EMAIL_ID'] = $row[3];
		$_SESSION['authen_flg']  =$row[12];
		$_SESSION['FNAME'] = $row[1];
	//	echo $_SESSION['USER_ID'];
		//echo $authen_flg;
		$update_sql = "UPDATE art_shr_login SET ACTIVE_FLG=1 WHERE USER_ID=".$_SESSION['USER_ID'];
		mysqli_query($conn, $update_sql);
		if($_SESSION['authen_flg']=='0')
			header('Location:activatemyaccount.php');
		else
			header('Location:dashboard.php');
	}
	else{
		header('Location:badcredentials.html');
		echo "Invalid account credentials. Kindly retry again";
	}
?>