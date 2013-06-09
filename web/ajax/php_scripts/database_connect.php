<?php
function db_connect()
{
  $db_host="localhost";
	$db_username="root";
	$db_password="chessy";
	$db_name="capicar_db";

	mysql_connect("$db_host","$db_username","$db_password") or die ("could not connect to mysql");
	mysql_select_db("$db_name") or die ("no database");
}
?>
