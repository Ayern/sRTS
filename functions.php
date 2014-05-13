<?php

function connect()
{
	mysql_connect("mysql13.000webhost.com", "a1285188_ayern", "q1w2e3r4");
	mysql_select_db("a1285188_game");
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