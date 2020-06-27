<?php
	$conn = mysqli_connect('localhost','root','','article_share');
	session_start();
	$update_sql = "UPDATE art_shr_login SET ACTIVE_FLG=0 WHERE USER_ID=".$_SESSION['USER_ID'];
	$res = mysqli_query($conn, $update_sql);
	header('Location:index.html');
?>