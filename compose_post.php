<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Compose a new TechPost</title>
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
        <h3 style="font-family:'Muli';font-weight:500" >A new article @ TechPost</h3><BR>
        <form action="compose_post_submit.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" class="form-control" maxlength="1000" id="fname" name="title_art" placeholder="Title of the article" autofocus required />
              </div><BR><BR><BR>
               <div class="col-sm-12">
                <input type="text" class="form-control" maxlength="32767" id="fname" name="caption_art" placeholder="Caption to the article (Brief to max of 32767 characters)" autofocus required />
              </div>
              </div><BR><BR>
              <div class="col-sm-12"><center>
                <label for="postattachmentupload">
                  <span class="btn btn-default">Upload pictures</span>
                  <input type="file" name="post_attach[]" id="postattachmentupload" accept="image/*" style="display:none" >
                </label></center>
              </div>
            <div class="form-group">
              <div class="col-sm-6">
                <button type="submit" style="font-size:12pt;letter-spacing:1pt;font-weight:500;font-family:Raleway;background-color:#555;border-color:#555;border-style:none;padding:8pt;border-radius:3pt;padding-left:15pt;color:#fff;padding-right:15pt">Post globally ...</button>
              </div>
            </div>
            </form>
            <div class="form-group">
              <div class="col-sm-6" style="text-align:right;padding-top:0pt;">
                <a href="dashboard.php"><span style="font-size:14pt;font-weight:600;letter-spacing:0.5pt;font-family:Raleway;border-radius:1pt;padding-left:15pt;color:#888;padding-right:15pt">Back</span></a>
              </div>
            </div>
          </div><BR><BR>
      </div>
    </center>
  </body>
</html>