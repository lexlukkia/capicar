<?php
 include_once "php_scripts/database_connect.php";
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
      


    </style>
    

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
                <li><a href="albums.php">Albums</a></li>
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

      <div id="body_content" style="width:750px;overflow:auto; max-height:600px; border-radius:8px; border-width:thin;border-style:solid; border-color:#CCC; float:left;">
          <?php
              db_connect();
              $sql=mysql_query("SELECT * FROM pic_tbl WHERE pic_id=".$_GET['q']);
              while ($cols=mysql_fetch_array($sql))
              {
                echo "<img src='".$cols['pic_loc']."' width='100%' />";
              }
          ?>
      </div>

      <div>
        <button class='btn btn-large span2'>Facebook</button>
        <button class='btn btn-large span2'>Twitter</button>
        <button class='btn btn-large span2'>Google+</button>
        <button class='btn btn-large span2'>Flickr</button>
        <button class='btn btn-large span2'>Thumbler</button>

      </div>


      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><hr>





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
