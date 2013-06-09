<?php 

include_once "php_scripts/database_connect.php";
 $monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
"August", "September", "October", "November", "December");

if (!isset($_GET["month"])) $_GET["month"] = date("n");
if (!isset($_GET["year"])) $_GET["year"] = date("Y");

$cMonth = $_GET["month"];
$cYear = $_GET["year"];

$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
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
      .calendar {
        height: 100px;
      }

      .calendar_head{
        background-color:#0958b1;
        color:#FFFFFF;
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
    .album_cover{
        width: 200px;
        height: 170px;
        overflow: hidden;
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

    function openAlbum(date_select)
    {
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
    xmlhttp.open("GET","ajax/ajax_getpics.php?q="+date_select,true);
    xmlhttp.send();
    }
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
                <li class="active"><a href="calendar.php">Gallery</a></li>
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

<div id="body_content">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr align="center">
  <td class="calendar_head">
    <table width="100%" border="0" height="60px" cellpadding="5" cellspacing="5">
      <tr>
        <td width="30%" align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Previous</a></td>
        <td width="40%" align="center" class="calendar_head"><h4><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></h4></td>
        <td width="30%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Next</a>  </td>
      </tr>
    </table>
  </td>
</tr>

<tr>
  <td align="center">
    <table width="100%" border="1" style="border-color:#0958b1;border-style:solid;border-weight:thin;" cellpadding="5" cellspacing="2">
    
    <tr>
      <td align="center" class="calendar_head" ><strong>Sunday</strong></td>
      <td align="center" class="calendar_head"><strong>Monday</strong></td>
      <td align="center" class="calendar_head"><strong>Tuesday</strong></td>
      <td align="center" class="calendar_head"><strong>Wednesday</strong></td>
      <td align="center" class="calendar_head"><strong>Thursday</strong></td>
      <td align="center" class="calendar_head"><strong>Friday</strong></td>
      <td align="center" class="calendar_head"><strong>Sunday</strong></td>
    </tr>
    <?php 


    $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
    $maxday = date("t",$timestamp);
    $thismonth = getdate ($timestamp);
    $startday = $thismonth['wday'];

    for ($i=0; $i<($maxday+$startday); $i++) {

        $minis="";
        db_connect();
        $sql=mysql_query("SELECT * FROM pic_tbl WHERE pic_date_taken = '$cYear-$cMonth-". ($i - $startday + 1) ."'");
        while ($rows=mysql_fetch_array($sql))
        {
          $minis.="<img src='".$rows['pic_loc']."'  style='float:right;width:33px;height:33px;border-radius:5px;'>";
        }


        if(($i % 7) == 0 ) echo "<tr>";
        if($i < $startday) echo "<td></td>";
        else echo "<td style='cursor:pointer;' align='left' valign='top' height='80px' width='100px' onclick='openAlbum(\"$cYear-$cMonth-". ($i - $startday + 1) . "\")'>"
        . ($i - $startday + 1) . $minis ."</td>";
        if(($i % 7) == 6 ) echo "</tr>";
    }
    ?>
</tr>
</table>
</div>


     

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
