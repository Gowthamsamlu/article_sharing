<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Update your TechPost account</title>
      <link rel="icon" type="image/ico" href="article_logo.png">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Roboto|Raleway|Muli&display=swap" rel="stylesheet">
      <style>
        .form-control{
          background-color: #FFF;
        }
        
      </style>
  </head>
  <body style="background-color: #EEE;overflow-x: hidden;"> 
<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','article_share');
    $sql = "SELECT * FROM art_shr_login WHERE USER_ID=".$_SESSION['USER_ID'];
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
?>
    <nav class="navbar navbar-default" style="background-color: white; box-shadow:4px 4px 3px #DDD;">
      <div class="container-fluid" style="padding:5pt">
        <div class="navbar-header" style="vertical-align:middle; padding:5pt;">
          <img src="article_logo2.png" width="50px" height="35px" alt="">&nbsp;
          <span onclick="loadpage('index.html')" style="vertical-align:middle;font-family:'Google Sans','Nanum Gothic',Calibri;font-size: 20pt;font-weight: 500; cursor:pointer">TechPost</span>
        </div>
      </div>
    </nav>
    <center>
      <div style="width:65%;text-align:left;border-radius:5pt; border:solid 1px #999;padding-top:15pt;padding-left:40pt;padding-right:40pt">
        <h3 style="font-family:'Muli';font-weight:500" >Update your TechPost account</h3><BR>
        <form action="update_details_submit.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group">
              <div class="col-sm-6">
                <input type="text" class="form-control" maxlength="15" id="fname" name="fname" placeholder="First Name" value="<?php echo $row[1] ?>" autofocus required />
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" maxlength="15" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row[2] ?>" required />
              </div>
            </div><BR><BR>
            <div class="form-group">
              <div class="col-sm-6">
                <input type="text" class="form-control" maxlength="7" id="rollno" name="rollno" placeholder="Roll Number" value="<?php echo $row[4] ?>" required />
              </div>
              <div class="col-sm-6">
                <select id="yoc_select" class="form-control" name="yoc">
                  <option value="<?php echo $row[9] ?>"><?php echo $row[9] ?></option>
                </select>
              </div>
            </div><BR><BR>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" class="form-control" maxlength="40" id="gmailid" name="email" placeholder="Gmail Address (xxx@gmail.com)" value="<?php echo $row[3] ?>" required />
              </div>
            </div><BR><BR>
            <div class="form-group">
              <div class="col-sm-6">
                <input type="date" class="form-control" maxlength="7" id="dob" name="dob" placeholder="Date Of Birth" value="<?php echo $row[8] ?>" required />
              </div>
              <div class="col-sm-6">
                <?php
                  if($row[11]=='M'){
                ?>
                <label class="radio-inline"><input type="radio" value="M" name="gender" checked>Male</label>
                <label class="radio-inline"><input type="radio" value="F" name="gender">Female</label>
                <?php
                  }
                  else{
                  ?>
                <label class="radio-inline"><input type="radio" value="M" name="gender">Male</label>
                <label class="radio-inline"><input type="radio" value="F" name="gender" checked>Female</label>
                <?php
                }
                ?>
              </div>
            </div><BR><BR>
            <div class="form-group">
              <div class="col-sm-6">
                <input type="password" class="form-control" maxlength="30" id="pass1" value="<?php echo $row[10] ?>" name="pass1" placeholder="Password" required />
              </div>
              <div class="col-sm-6"><center>
                <label for="profilepicupload">
                  <span class="btn btn-default">Profile picture update</span>
                  <input type="file" name="profile_pic_upload" accept="image/*" id="profilepicupload" style="display:none">
                </label></center>
              </div>
            </div><BR><BR><BR>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" style="font-size:12pt;letter-spacing:1pt;font-weight:500;font-family:Raleway;background-color:#555;border-color:#555;border-style:none;padding:8pt;border-radius:3pt;padding-left:15pt;color:#fff;padding-right:15pt">Next</button>
              </div>
            </form>
              <div class="col-sm-6" style="text-align:right;padding-top:5pt;">
                <a href="dashboard.php"><span style="font-size:14pt;font-weight:600;letter-spacing:0.5pt;font-family:Raleway;border-radius:1pt;padding-left:15pt;color:#888;padding-right:15pt">Discard</span></a>
              </div>
            </div>
          </div><BR><BR>
      </div>
    </center>
    <script>
      var num = <?php echo $row[9]; ?>;
      loadyoc();
        function loadyoc(){
          var m = document.getElementById("yoc_select");
          var date = new Date();
          if(date.getMonth()<6)
            var startyear = date.getFullYear();
          else
            var startyear = date.getFullYear()+1;
          for (var i=1; i<=3 ;i++){
            if((startyear+(i-1))!=num){
              var obj = document.createElement("option");
              obj.text = startyear+(i-1);
              obj.value = startyear+(i-1);
              m.add(obj);   
            }
          }
        }
        function loadpage(m){
          window.location.href=m;
        }
      </script>
  </body>
</html>