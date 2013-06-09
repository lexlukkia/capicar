<?php
 include_once "../php_scripts/database_connect.php";

$return="";

db_connect();
$sql=mysql_query("SELECT * FROM pic_tbl WHERE pic_album_id = '".$_GET["q"]."'");
while ($cols=mysql_fetch_array($sql))
{
   $return.= "<div style='width:200px; height:200px; border-radius:4px; box-shadow:0px 2px 5px #000; float:left; margin:15px;'>
        <div class='album_cover' style='cursor:pointer;' onclick='focusPhoto(\"" . $cols['pic_loc'] . "\");' >
          <img src='" . $cols['pic_loc'] . "' width='100%' />
        </div>
        <div style='text-align:center;width:180px;float:left;'>".$cols['pic_name']."</div>
        <div style='float:left;'><a href='inspect.php?q=".$cols['pic_id']."' target='_blank' title='Inspect'><i class='icon-search'></i></a></div>
        </div>
        ";
}
          

echo $return;
  ?>
