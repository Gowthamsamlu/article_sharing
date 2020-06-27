<?php
	session_start();
	$conn = mysqli_connect('localhost','root','','article_share');
	$title = $_POST['title_art'];
	$caption = $_POST['caption_art'];
	$userid = $_SESSION['USER_ID'];;
	$sql = "INSERT INTO art_shr_posts(POSTED_BY, TITLE, CAPTION1) VALUES($userid,'$title','$caption')";
	//echo $sql;
	mysqli_query($conn, $sql);
	$res = mysqli_query($conn, "SELECT MAX(POST_ID) FROM art_shr_posts WHERE POSTED_BY=$userid");
	$row = mysqli_fetch_array($res);
	$postid = $row[0];
	$attach_cnt = count($_FILES['post_attach']['name']);
	for($i=0 ; $i<$attach_cnt ; $i++){
		$targetfile=str_replace(" ","","posts/".$_SESSION['ROLL_NO']."_".($i+1)."_".substr(microtime(),2));
		$imageFileType = strtolower(pathinfo($_FILES["post_attach"]["name"][$i],PATHINFO_EXTENSION));
		if(move_uploaded_file($_FILES["post_attach"]["tmp_name"][$i], $targetfile.".".$imageFileType)){
			$uploadedname = $targetfile.".".$imageFileType;
			$sql = "INSERT INTO art_shr_attachments(POST_ID,ATTACHMENT_ORDER,ATTACHMENT_PATH) VALUES($postid,".($i+1).",'$uploadedname')";
			mysqli_query($conn, $sql);
		}
	}
	header('Location:dashboard.php');
?>