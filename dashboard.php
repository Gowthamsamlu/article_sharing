<?php
	session_start();
	$check_sql = "SELECT ACTIVE_FLG FROM art_shr_login WHERE USER_ID=".$_SESSION['USER_ID'];
  $conn = mysqli_connect('localhost','root','','article_share');
  $res = mysqli_query($conn, $check_sql);
  $flg=mysqli_fetch_array($res)[0];
  if($flg==1)
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
	      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

			/* Change background color of buttons on hover */
			.tab button:hover {
			  background-color: #ddd;
			}

			/* Create an active/current tablink class */
			.tab button.active {
			  background-color: #ccc;
			}
			.tabbbutton {
			  background-color: inherit;
			  float: left;
			  border: none;
			  outline: none;
			  cursor: pointer;
			  padding: 14px 16px;
			  transition: 0.3s;
			  font-size: 17px;
			}

	      </style>
	  </head>
	  <body style="background-color: #EEE;overflow-x: hidden;"> 
	      <nav class="navbar navbar-default" style="background-color: white; box-shadow:4px 4px 3px #DDD;">
	        <div class="container-fluid" style="padding:5pt">
	          <div class="navbar-header" style="vertical-align:middle; padding:5pt;">
	            <img src="article_logo2.png" width="50px" height="35px" alt="">&nbsp;
	            <span style="vertical-align:middle;font-family:'Google Sans','Nanum Gothic',Calibri;font-size: 20pt;font-weight: 500"><?php echo $name ?></span>
	          </div>
	        </div>
	      </nav>
	      <div style="height:500px; background-color: #EEE">
	      	<table width="100%">
	      		<tr>
	      			<td width="20%">
	      				<div style=" padding-top:10pt; padding-left:15pt; border-right:solid 2px #aaa; height:538px">
	      					<CENTER><img src="<?php echo $profilepicpath; ?>" height="150" width="150" style="border-radius: 50% 50%; border:solid 1px #888"></CENTER>
	      					<BR>
	      					<a href="compose_post.php" ><button style="font-size:12pt;letter-spacing:0.5pt;font-weight:500;font-family:Raleway;background-color:#555;border-color:#555;border-style:none;padding:8pt;border-radius:5pt;padding-left:15pt;color:#fff;padding-right:15pt">Compose</button></a><BR><BR>
	      					<?php
	      						if($row[1]!=0){
	      							?>
	      								<a href="manage_posts.php"><span style="font-size:12pt;font-weight:600;letter-spacing:0.5pt;font-family:Raleway;color:#888;padding-right:15pt; padding-bottom: 8pt">Manage Posts</span></a><BR><BR>
	      							<?php
	      						}
	      					?>
	      					<a href="update_details.php"><span style="font-size:12pt;font-weight:600;letter-spacing:0.5pt;font-family:Raleway;color:#888;padding-right:15pt; padding-bottom: 8pt">Update Account</span></a><BR><BR>
	      					<a href="signout.php"><span style="font-size:12pt;font-weight:600;letter-spacing:0.5pt;font-family:Raleway;color:#888;padding-right:15pt; padding-bottom: 8pt">Sign Out</span></a>
	      				</div>
	      			</td>
	      			<td width="60%" style="vertical-align: top">
	      				<div style="display:block;border-right:solid 2px #aaa;padding-left: 15pt; padding-right:15pt; padding-top: 0pt;height:538px;width:99%; overflow-y: scroll" >
	      					<div class="tab" style="position: fixed; width:55.7%; background-color: #eee"><center>
							  <button class="tablinks tabbbutton active" style="width:50%" onclick="ManageTabs(event, 'newsfeed')"><span style="font-size:16pt" class="glyphicon glyphicon-list-alt"></span></button>
							  <button class="tablinks tabbbutton" style="width:50%" onclick="ManageTabs(event, 'trending')"><span style="font-size:16pt" class="glyphicon glyphicon-fire"></span></button></center>
							</div><BR><BR><BR>
	      					<div id="newsfeed" class="tabcontent">
	      				<?php
	      					$sql='SELECT 
	      							asl.PROFILEPICPATH, 
	      							CONCAT(asl.FNAME," ",asl.LNAME," (",asl.ROLL_NO,")") NAME_WITH_ROLL, 
	      							DATE_FORMAT(asp.CREATED_TIME, "%a %d %b %Y %h:%i %p") CREATED_TIME, 
	      							asp.TITLE, 
	      							asp.CAPTION1, 
	      							asp.POST_ID 
	      						FROM art_shr_posts asp 
	      						INNER JOIN art_shr_login asl 
	      						ON 
	      							asp.POSTED_BY = asl.USER_ID 
	      					 	WHERE asp.VALIDFLAG=1 
	      					 	ORDER BY asp.CREATED_TIME DESC';
	      					$post_res = mysqli_query($conn, $sql);
	      					while($post_row = mysqli_fetch_array($post_res)){
	      						?>
	      					<div style="background-color:#efefef;border:solid 1px #ccc;border-top-left-radius: 2pt;border-top-right-radius: 2pt;min-height: 150px;box-shadow:0 5px 5px 5px #ccc; border-top-left-radius: 15pt;" onmouseover="addview(<?php echo $post_row[5]?>)">
	      						<div style="height:30%; background-color: #898989;border-top-right-radius: 2pt; border-top-left-radius: 2pt; padding:5pt; border:solid 1px #777">
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
	      						<p style="padding:10pt; padding-bottom:0pt"> <?php echo $post_row[4]; ?> </p>
	      							<?php
	      								$attach_sql = "SELECT ATTACHMENT_PATH FROM art_shr_attachments WHERE POST_ID=".$post_row[5];
	      								//echo $attach_sql;
	      								$attach_res = mysqli_query($conn, $attach_sql);
	      								if(mysqli_num_rows($attach_res)>0){
	      								$picpath = mysqli_fetch_array($attach_res)[0];
	      							?>
	      							<center><img style="border-radius:5pt; border:solid 1px #999" src="<?php echo $picpath; ?>" style="max-height:400px;max-width:200px"></center><BR>
	      							<?php
	      								}
	      							?>
	      					</div>
	      					<BR>
	      						<?php
	      					}
	      				?>
	      				</div>
	      				<div id="trending" class="tabcontent" style="display: none">
	      					<?php
	      						$trend_sql = 'SELECT 
												asl.PROFILEPICPATH, 
												CONCAT(asl.FNAME," ",asl.LNAME," (",asl.ROLL_NO,")") NAME_WITH_ROLL, 
												DATE_FORMAT(asp.CREATED_TIME, "%a %d %b %Y %h:%i %p") CREATED_TIME, 
												asp.TITLE, 
												asp.CAPTION1, 
												asp.POST_ID,
											    TIME_TO_SEC(TIMEDIFF(NOW(),asp.CREATED_TIME))/pv.vc TREND_RATIO
											FROM art_shr_posts asp 
											INNER JOIN art_shr_login asl 
											ON asp.POSTED_BY = asl.USER_ID 
											LEFT JOIN(
											    SELECT POSTID,SUM(VIEW_CNT) VC
											    FROM post_views
											    GROUP BY POSTID
											) pv
											ON asp.POST_ID = pv.POSTID
											WHERE asp.VALIDFLAG=1 
											ORDER BY TREND_RATIO DESC, asp.CREATED_TIME ASC';
								$trend_res = mysqli_query($conn, $sql);
								$ite=1;
	      					while($trend_row = mysqli_fetch_array($trend_res)){
	      						?>
	      					<div style="background-color:#efefef;border:solid 1px #ccc;border-top-left-radius: 2pt;border-top-right-radius: 2pt;min-height: 150px;box-shadow:0 5px 5px 5px #ccc; border-top-left-radius: 15pt;" onmouseover="addview(<?php echo $trend_row[5]?>)">
	      						<div style="height:30%; background-color: #898989;border-top-right-radius: 2pt; border-top-left-radius: 2pt; padding:5pt; border:solid 1px #777">
	      							<table>
	      								<tr>
	      									<td rowspan="2">
	      										<img src="<?php echo $trend_row[0] ?>"  height="50" width="50" style="border-radius: 1pt">
	      									</td>
	      									<td>&nbsp;&nbsp;&nbsp;<span style="font-family: Muli; font-weight: 900; color:#fff; font-size: 13pt; letter-spacing: 0.5pt"><?php echo $trend_row[3]; ?></span>
	      										&nbsp;&nbsp;&nbsp;<span style="color:#EEE; font-size: 10pt"><b>#<?php echo $ite;
	      										$ite++; ?></b> ON TRENDING</span>
	      									</td>
	      								</tr>
	      								<tr>
	      									<td>&nbsp;&nbsp;&nbsp;<span style="font-family: Muli; font-weight: 500; color:#eee; font-size: 10pt">posted by <?php echo $trend_row[1]; ?> &#8226;<i> <?php echo $trend_row[2] ?> </i></span>
	      									</td>
	      								</tr>
	      							</table>
	      						</div>
	      						<p style="padding:10pt; padding-bottom:0pt"> <?php echo $trend_row[4]; ?> </p>
	      							<?php
	      								$attach_sql = "SELECT ATTACHMENT_PATH FROM art_shr_attachments WHERE POST_ID=".$trend_row[5];
	      								//echo $attach_sql;
	      								$attach_res = mysqli_query($conn, $attach_sql);
	      								if(mysqli_num_rows($attach_res)>0){
	      								$picpath = mysqli_fetch_array($attach_res)[0];
	      							?>
	      							<center><img style="border-radius:5pt; border:solid 1px #999" src="<?php echo $picpath; ?>" style="max-height:400px;max-width:200px"></center><BR>
	      							<?php
	      								}
	      							?>
	      					</div>
	      					<BR>
	      						<?php
	      					}
	      					?>
	      				</div>
	      			</div>
	      			</td>
	      			<td>

	      			</td>
	      		</tr>
	      	</table>
	      </div>
	      <script>
	      	function addview(postid){
	      		var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
				   // alert(this.responseText);// document.getElementById("demo").innerHTML = this.responseText;
				    }
				  };
				xhttp.open("GET", "add_view_script.php?postid="+postid, true);
				xhttp.send();
	      	}
	      	function ManageTabs(evt, tabname) {
			  var i, tabcontent, tablinks;
			  tabcontent = document.getElementsByClassName("tabcontent");
			  for (i = 0; i < tabcontent.length; i++) {
			    tabcontent[i].style.display = "none";
			  }
			  tablinks = document.getElementsByClassName("tablinks");
			  for (i = 0; i < tablinks.length; i++) {
			    tablinks[i].className = tablinks[i].className.replace(" active", "");
			  }
			  document.getElementById(tabname).style.display = "block";
			  evt.currentTarget.className += " active";
			}
	      </script>
	  </body>
	</html>
	<?php
}
else{
	header('Location:index.html');
}
?>