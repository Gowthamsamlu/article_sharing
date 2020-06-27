<?php
	$conn = mysqli_connect('localhost','root','','article_share');
	$post_id = $_POST['postid'];
	$sql = 'UPDATE art_shr_posts SET VALIDFLAG=1 WHERE POST_ID = '.$post_id;
	$res = mysqli_query($conn, $sql);
	header('Location:manage_posts.php');
?>