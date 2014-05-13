<?php

include("functions.php");

connect();



// Rankings Every 15 minutes



$get_attack = mysql_query("SELECT `id`,`attack` FROM `stats` ORDER BY `attack` DESC") or die(mysql_error());

$i = 1;

$rank = array();

while($attack = mysql_fetch_assoc($get_attack)){

    $rank[$attack['id']] = $attack['attack'];

    mysql_query("UPDATE `ranking` SET `attack`='".$i."' WHERE `id`='".$attack['id']."'") or die(mysql_error());

    $i++;

}



$get_defense = mysql_query("SELECT `id`,`defense` FROM `stats` ORDER BY `defense` DESC") or die(mysql_error());

$i = 1;

while($defense = mysql_fetch_assoc($get_defense)){

    $rank[$defense['id']] += $defense['defense'];

    mysql_query("UPDATE `ranking` SET `defense`='".$i."' WHERE `id`='".$defense['id']."'") or die(mysql_error());

    $i++;

}



asort($rank);

$rank2 = array_reverse($rank,true);

$i = 1;

foreach($rank2 as $key => $val){

    mysql_query("UPDATE `ranking` SET `overall`='".$i."' WHERE `id`='".$key."'") or die(mysql_error());

    $i++;

}

?>