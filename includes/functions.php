<?php

function connect()
{
	mysql_connect("your_db_host.com", "db_user", "db_pass");
	mysql_select_db("db_name");
}

function protect($string)
{
	return mysql_real_escape_string(strip_tags(addslashes($string)));
}

function output($string)
{
	echo "<div id=\"output\">" . $string . "</div>";
}
?>