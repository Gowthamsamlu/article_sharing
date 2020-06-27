<?php
	session_start();
	$user_id = $_SESSION['USER_ID'];
	$postid = $_GET['postid'];
	$conn = mysqli_connect('localhost','root','','article_share');
	$check_sql= "SELECT * FROM POST_VIEWS WHERE USER_ID=$user_id AND POSTID=$postid";
	$check_res = mysqli_query($conn, $check_sql);
	if(mysqli_num_rows($check_res)>0){
		$check_row = mysqli_fetch_array($check_res);
		$cur_date = date('Y-m-d');
		if($cur_date!=$check_row[3]){
			$view_cnt = $check_row[4]+1;
			$insert_sql = "UPDATE POST_VIEWS SET VIEW_CNT=$view_cnt WHERE REC_ID=".$check_row[0];
			$res = mysqli_query($conn, $insert_sql);
		}
	}
	else{
		$insert_sql = "INSERT INTO POST_VIEWS(POSTID, USER_ID, LAST_SEEN_DATE, VIEW_CNT) VALUES ($postid,$user_id,NOW(),1)";
		$res = mysqli_query($conn, $insert_sql);
	}
?>