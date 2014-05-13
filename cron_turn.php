<?php
include("functions.php");
connect();

$get_users = mysql_query("SELECT * FROM `stats`") or die(mysql_error());
while($user = mysql_fetch_assoc($get_users)){
    $update = mysql_query("UPDATE `stats` SET
                            `gold`=`gold`+'".$user['income']."',
                            `food`=`food`+'".$user['farming']."',
                            `turns`=`turns`+'5' WHERE `id`='".$user['id']."'") or die(mysql_error());
}



?>