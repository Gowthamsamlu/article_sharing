<?php
  session_start();
  $check_sql = "SELECT ACTIVE_FLG FROM art_shr_login WHERE USER_ID=".$_SESSION['USER_ID'];
  $conn = mysqli_connect('localhost','root','','article_share');
  $res = mysqli_query($conn, $check_sql);
  $flg=mysqli_fetch_array($res)[0];
  if($flg==1)
  {
    require_once('PHPMailer/PHPMailerAutoload.php');
    require("PHPMailer/class.PHPMailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth=true;
    //$mail->SMTPAutoTLS = false; 
    $mail->SMTPDebug = 2;
    $mail->Host = "ssl://smtp.gmail.com";
    //$mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->IsHTML(true);
    $mail->Username = 'psgtecharticlesharing@gmail.com';
    $mail->Password = 'psgarticle';
    $mail->setFrom('psgtecharticlesharing@gmail.com','Psg Tech Article Sharing');
    $mail->Subject = 'Account activation link';
    $mail->Body = '<html>
    <head>
      <style>
        #submitbut{
        font-size:12pt;letter-spacing:0.5pt;font-weight:500;font-family:Raleway;background-color:#555;border-color:#555;border-style:none;padding:8pt;border-radius:1.5pt;padding-left:15pt;color:#fff;padding-right:15pt;font-family:Calibri;}
        body{
          font-family: Calibri;
        }
      </style>
    </head>
    <body>
      <form action="http://192.168.1.21/article/confirm_acc.php" method="post">
        <span style="font-size:14pt">Hi <b>'.$_SESSION['FNAME'].'</b>,</span><BR>Please provided is the activation link for your TechPost account that was created recently. Kindly activate the account to stay tuned with updates of MXians family.<BR><BR>
        <input type="text" name="rollno" style="display:none" value="'.$_SESSION['ROLL_NO'].'">
        <input type="text" name="userid" style="display:none" value="'.$_SESSION['USER_ID'].'">
        <input type="submit" id="submitbut" value="Activate my account">
      </form>
    </body>
  </html>';
    $mail->AddAddress($_SESSION['EMAIL_ID']);
    ?>
    <!DOCTYPE html>
      <html lang="en">
        <head>
            <title>Activate your TechPost account</title>
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
    <div id="mail_log" style="display:">
    <?php
    if($mail->Send()) {
       ?>
     </div>
      <nav class="navbar navbar-default" style="background-color: white; box-shadow:4px 4px 3px #DDD;">
            <div class="container-fluid" style="padding:5pt">
              <div class="navbar-header" style="vertical-align:middle; padding:5pt;">
                <img src="article_logo2.png" width="50px" height="35px" alt="">&nbsp;
                <span onclick="loadpage('index.html')" style="vertical-align:middle;font-family:'Google Sans','Nanum Gothic',Calibri;font-size: 20pt;font-weight: 500; cursor:pointer">TechPost</span>
              </div>
              <ul class="nav navbar-nav navbar-right" style="padding-right:16pt; padding-top:3pt">
              <a href="signout.php"><button style="font-size:12pt;letter-spacing:0.5pt;font-weight:500;font-family:Raleway;background-color:#555;border-color:#555;border-style:none;padding:8pt;border-radius:3pt;padding-left:15pt;color:#fff;padding-right:15pt">Sign out</button></a>
            </ul>
            </div>
          </nav>
          <center>
            <div style="width:65%;text-align:left;border-radius:5pt; border:solid 1px #999;padding-top:15pt;padding-left:40pt;padding-right:40pt">
              <h3 style="font-family:'Muli';font-weight:500">Activate my TechPost account</h3><BR>
                <center>
                <h4>Account activation link have been sent to your gmail account.</h4><BR>
                <a href="https://gmail.com" target="_blank"><button style="font-size:12pt;letter-spacing:0.5pt;font-weight:500;font-family:Raleway;background-color:#555;border-color:#555;border-style:none;padding:8pt;border-radius:2pt;padding-left:15pt;color:#fff;padding-right:15pt">Continue to Gmail</button></a><BR><BR>
                <a href="update_details.php"><span style="font-size:12pt;font-weight:600;letter-spacing:0.5pt;font-family:Raleway;border-radius:1pt;padding-left:15pt;color:#888;padding-right:15pt">Update Account</span></a>
              <BR><BR>
            </div>
          </center>
        </body></html>
       <?php
    }
    else{
      //header('Location:index.html');
    }
}
else{
  header('Location:index.html');
}
?>