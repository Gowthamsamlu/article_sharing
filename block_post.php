<?php
	$conn = mysqli_connect('localhost','root','','article_share');
	$post_id = $_POST['postid'];
	session_start();
	$user_id = $_SESSION['USER_ID'];
	$sql = 'UPDATE art_shr_posts SET VALIDFLAG=0, BLOCKED_BY = '.$user_id.' WHERE POST_ID = '.$post_id;
	$res = mysqli_query($conn, $sql);
	header('Location:manage_posts.php');
?>