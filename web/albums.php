<?php
 include_once "php_scripts/database_connect.php";
?>
<?php
  if (isset($_POST['album_title_new'])) {
  
  db_connect();
  mysql_query("INSERT INTO albums_tbl (album_name, album_desc, album_cover, album_owner_id, album_date_created)
    VALUES ('".$_POST['album_title_new']."','".$_POST['album_desc_new']."','system_img/folder_icon_blk.png',1,now())");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Capicar &middot; Pic Inside Calendar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 60px;
      }

      .container {
        margin: 0 auto;
        max-width: 1000px;
      }
      .container > hr {
        margin: 60px 0;
      }

      .jumbotron {
        margin: 80px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 100px;
        line-height: 1;
      }
      .jumbotron .lead {
        font-size: 24px;
        line-height: 1.25;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }


      .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
      .album_cover{
        width: 200px;
        height: 170px;
        overflow: hidden;
      }
      #photo_bg {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 1;
      display:none;
      background-color:#000;
      opacity:0.5;
    }

    #photo_container {
      position:relative;
      top: -170px;
      z-index: 2;
      display:none;
      margin:none;
    }


    </style>
    <script type="text/javascript">
      function focusPhoto(loc)
    {
      document.getElementById('photo_bg').style.display='block';
      var x = document.documentElement.clientWidth * 0.8;
      var lf = document.documentElement.clientWidth *  0.05;
      document.getElementById('photo_container').innerHTML="<center><img src='"+loc+"' /></center>";
      document.getElementById('photo_container').style.minHeight=lf+"px";
      document.getElementById('photo_container').style.width=x+"px";
      document.getElementById('photo_container').style.left=lf+"px";
      document.getElementById('photo_container').style.display='block'; 
    }

    function closePic()
    {
      document.getElementById('photo_bg').style.display='none';
      document.getElementById('photo_container').style.display='none';  
    }

      function changeImage(alm){
        //alert(1);
          document.getElementById(alm).src="system_img/folder_icon.png";
      }
      function changeImage2(alm){
        //alert(1);
          document.getElementById(alm).src="system_img/folder_icon_blk.png";
      }

      function openAlbum(date_select)
    {
    document.getElementById('create_album_btn').style.display='none';
    var xmlhttp;

    if (window.XMLHttpRequest)
      {
      xmlhttp=new XMLHttpRequest();
      }
    else
      {
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("body_content").innerHTML=xmlhttp.responseText;
        }
      }
    xmlhttp.open("GET","ajax/ajax_getpics2.php?q="+date_select,true);
    xmlhttp.send();
    }
    </script>
    </script>

    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <img src="assets/ico/icon_logo.png" height=120 width=140 />
        <div style="height:120px;width:750px;overflow:hidden;float:right;">
          <img src="system_img/banner.png" height=100px width=700px />
        </div>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li><a href="calendar.php">Gallery</a></li>
                <li class="active"><a href="albums.php">Albums</a></li>
                <li><a href="#">Photos</a></li>
                <li><a href="#">Downloads</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      
<div id="photo_bg" onclick="closePic()"></div>
<div id="photo_container"></div>

      <div id="body_content" style="width:100%;overflow:auto; height:400px; border-radius:8px; border-width:thin;border-style:solid; border-color:#CCC;">
          <?php
              db_connect();
              $sql=mysql_query("SELECT * FROM albums_tbl");
              while ($cols=mysql_fetch_array($sql))
              {
                echo "<div style='width:200px; height:200px; border-radius:4px; box-shadow:0px 2px 5px #000; float:left; margin:15px;'>
                      <div class='album_cover' style='cursor:pointer;' onclick='openAlbum(".$cols['album_id'].")'>
                        <img src='" . $cols['album_cover'] . "' width='100%' id='album_".$cols['album_id']."'
                        onmouseover='changeImage(\"album_".$cols['album_id']."\");'
                        onmouseout='changeImage2(\"album_".$cols['album_id']."\");'/>
                      </div>
                      <div style='text-align:center;'>".$cols['album_name']."</div>
                      </div>
                      ";
              }
          ?>
        
      </div>

      <button type="submit" id="create_album_btn" style="margin:10px;" class="btn btn-large btn-primary" onclick="
      document.getElementById('create_album').style.display='block';
      this.style.display='none'">Create Album</button>
      <div id="create_album" class="span4" style="border-radius:5px;box-shadow:0px 0px 5px #000;margin:15px;display:none;">
        <form class="span4" method="post" action="">
        <fieldset>
          <h3>Create new album</h3>
          <label>Title:</label>
          <input name='album_title_new' type="text" placeholder="Type something…" />
          <label>Description:</label>
          <textarea name='album_desc_new' rows="3"></textarea>
          <br/>
          <button type="submit" class="btn btn-medium btn-primary">Create</button>
          <button type="button" class="btn btn-medium" onclick="
      document.getElementById('create_album').style.display='none';
      document.getElementById('create_album_btn').style.display='block'">Cancel</button>
        </fieldset>
        </form>
      </div>


      <br><br>
      <br><br>
      <br><br>
      <hr>





      <div class="footer">
        <p>&copy; Evil Genius Studios 2013</p>
      </div>

    </div> 

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
