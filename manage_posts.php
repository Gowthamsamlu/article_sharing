<?php
	session_start();
	$check_sql = "SELECT ACTIVE_FLG,ACCTYPE FROM art_shr_login WHERE USER_ID=".$_SESSION['USER_ID'];
  $conn = mysqli_connect('localhost','root','','article_share');
  $res = mysqli_query($conn, $check_sql);
  $frow = mysqli_fetch_array($res);
  $flg=$frow[0];
  $level = $frow[1];
  if($flg==1 && $level=='A')
  {
		//echo $_SESSION['USER_ID'];
		$conn = mysqli_connect('localhost','root','','article_share');
		$name_sql = "SELECT CONCAT(UPPER(SUBSTRING(FNAME,1,1)),LOWER(SUBSTRING(FNAME,2,LENGTH(FNAME)-1)),' ',LOWER(LNAME)) FULLNAME,EVENT_CREATE_FLG,PROFILEPICPATH FROM art_shr_login WHERE USER_ID=".$_SESSION['USER_ID'];
		$name_res = mysqli_query($conn,$name_sql);
		$row = mysqli_fetch_array($name_res);
		$name = $row[0];
		$profilepicpath = $row[2];
		//echo $name;
	?>
	<!DOCTYPE html>
	<html lang="en">
	  <head>
	      <title>TechPost - Easy and fast access to the updates</title>
	      <link rel="icon" type="image/ico" href="article_logo.png">
	      <meta charset="utf-8">
	      <meta name="viewport" content="width=device-width, initial-scale=1">
	      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	      <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Roboto|Raleway|Muli&display=swap" rel="stylesheet">
	      <style>
				      	/* width */
			::-webkit-scrollbar {
			  width: 8px;
			}

			/* Track */
			::-webkit-scrollbar-track {
			  background: #f1f1f1; 
			}
			 
			/* Handle */
			::-webkit-scrollbar-thumb {
			  background: #888; 
			  border-radius:10pt;
			  transition: background 1s;
			}

			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
			  background: #555; 
			}
	      </style>
	  </head>
	  <body style="background-color: #EEE;overflow-x: hidden;"> 
	      <nav class="navbar navbar-default" style="background-color: white; box-shadow:4px 4px 3px #DDD;">
	        <div class="container-fluid" style="padding:5pt">
	          <div class="navbar-header" style="vertical-align:middle; padding:5pt;">
	            <img src="article_logo2.png" width="50px" height="35px" alt="">&nbsp;
	            <span style="vertical-align:middle;font-family:'Google Sans','Nanum Gothic',Calibri;font-size: 20pt;font-weight: 500">TechPost - <?php echo $name ?> - Manage Posts</span>
	          </div>
	        </div>
	      </nav>
	      <div style="height:500px; background-color: #EEE">
	      	<table width="100%">
	      		<tr>
	      			<td width="10%">
	      				<div style=" padding-top:10pt; padding-left:15pt; border-right:solid 2px #aaa; height:538px">
	      					<CENTER><img src="<?php echo $profilepicpath; ?>" height="150" width="150" style="border-radius: 50% 50%; border:solid 1px #888">
	      					<BR><BR><BR>
	      					<a href="dashboard.php"><span style="font-size:12pt;font-weight:600;letter-spacing:0.5pt;font-family:Raleway;color:#888;padding-right:15pt; padding-bottom: 8pt">Back</span></a><BR><BR></CENTER>
	      				</div>
	      			</td>
	      			<td width="70%">
	      				<div style="border-right:solid 2px #aaa;padding-left: 15pt; padding-right:15pt; padding-top: 0pt;height:538px;width:99%; overflow-y: scroll" >
	      				<?php
	      					$sql='SELECT 
	      							asl.PROFILEPICPATH, 
	      							CONCAT(asl.FNAME," ",asl.LNAME," (",asl.ROLL_NO,")") NAME_WITH_ROLL, 
	      							DATE_FORMAT(asp.CREATED_TIME, "%a %d %b %Y %h:%i %p") CREATED_TIME, 
	      							asp.TITLE, 
	      							asp.CAPTION1, 
	      							asp.POST_ID,
	      							asp.VALIDFLAG,
	      							asp.POST_ID,
	      							CONCAT(aslb.FNAME," ",aslb.LNAME) BLOCKED_NAME
	      						FROM art_shr_posts asp 
	      						INNER JOIN art_shr_login asl 
	      						ON 	asp.POSTED_BY = asl.USER_ID 
	      						LEFT JOIN art_shr_login aslb
	      						ON asp.BLOCKED_BY = aslb.USER_ID
	      						WHERE asp.BLOCKABLE = 1
	      					 	ORDER BY asp.CREATED_TIME DESC';
	      					$post_res = mysqli_query($conn, $sql);
	      					while($post_row = mysqli_fetch_array($post_res)){
	      						?>
	      					<div style="background-color:#efefef;border:solid 1px #ccc;border-top-left-radius: 2pt;border-top-right-radius: 2pt;min-height: 150px;box-shadow:0 5px 5px 5px #ccc; border-top-left-radius: 15pt;">
	      					<div style="height:30%; background-color: #898989;border-top-right-radius: 2pt; border-top-left-radius: 2pt; padding:5pt; border:solid 1px #777;<?php 
	      						if($post_row[6]==0)
	      							echo 'opacity:0.3; pointer-events: none; user-select:none' ?>">
	      							<table>
	      								<tr>
	      									<td rowspan="2">
	      										<img src="<?php echo $post_row[0] ?>"  height="50" width="50" style="border-radius: 1pt">
	      									</td>
	      									<td>&nbsp;&nbsp;&nbsp;<span style="font-family: Muli; font-weight: 900; color:#fff; font-size: 13pt; letter-spacing: 0.5pt"><?php echo $post_row[3]; ?></span>
	      									</td>
	      								</tr>
	      								<tr>
	      									<td>&nbsp;&nbsp;&nbsp;<span style="font-family: Muli; font-weight: 500; color:#eee; font-size: 10pt">posted by <?php echo $post_row[1]; ?> &#8226;<i> <?php echo $post_row[2] ?> </i></span>
	      									</td>
	      								</tr>
	      							</table>
	      						</div>
	      						<p style="padding:10pt; padding-bottom:0pt;
	      						<?php 
	      						if($post_row[6]==0)
	      							echo 'opacity:0.3; pointer-events: none; user-select:none' ?>"> <?php echo $post_row[4]; ?> </p>
	      							<?php
	      								$attach_sql = "SELECT ATTACHMENT_PATH FROM art_shr_attachments WHERE POST_ID=".$post_row[5];
	      								//echo $attach_sql;
	      								$attach_res = mysqli_query($conn, $attach_sql);
	      								if(mysqli_num_rows($attach_res)>0){
	      								$picpath = mysqli_fetch_array($attach_res)[0];
	      							?>
	      							<center><img style="border-radius:5pt; border:solid 1px #999;<?php 
	      						if($post_row[6]==0)
	      							echo 'opacity:0.3; pointer-events: none; user-select:none' ?>" src="<?php echo $picpath; ?>" style="max-height:400px;max-width:200px
	      							<?php 
	      						if($post_row[6]==0)
	      							echo 'opacity:0.3; pointer-events: none; user-select:none' ?>"></center><BR>
	      							<?php
	      								}
	      								if($post_row[6]==1){
	      									?>
	      										<span style="padding-right: 10pt; padding-bottom: 5pt; position:relative; right:1%; bottom:1%;">
	      											<form action="block_post.php" method="post">
	      											<input type="text" style="display:none" name="postid" value="<?php echo $post_row[7]; ?> ">
	      											<input type="submit" class="btn btn-danger" style="background-color:rgb(191,51,51); color: #ffe6e6;float:right; " value="Block Post">
	      											</form>
	      										</span><BR><BR>
	      									<?php
	      								}
	      								else{
	      							?>
	      							<div style="z-index:1;opacity:1 !important; padding-left: 5pt;">
													<form action="unblock_post.php" method="post">
	      											<input type="text" style="display:none" name="postid" value="<?php echo $post_row[7]; ?> ">
	      								<input type="submit" class="btn btn-success" value="Unblock this Post"> &nbsp;&nbsp;&nbsp;<span style="font-size:12pt">Blocked by <i><?php echo $post_row[8]; ?></i></span> </form></div>
	      							<?php
	      								}
	      							?>
	      					</div>
	      					<?php
	      					/*	if($post_row[6]==0){
	      						?>
	      							<div style="position:relative; left:0pt; top:0pt; height:100%; width:100%;"></div>
	      					?>*/
	      					echo '<BR>';
	      					/*<?php
	      						}*/
	      					}
	      				?>
	      			</td>
	      			<td>
	      			</td>
	      		</tr>
	      	</table>
	      </div>
	  </body>
	</html>
	<?php
}
else{
	header('Location:signout.php');
}
?>