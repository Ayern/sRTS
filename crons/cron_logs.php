<?php

include("../includes/functions.php");

connect();



// Clear Logs that are over 1 day old

mysql_query("DELETE FROM `logs` WHERE `time`<'".(time()-86400)."'") or die(mysql_error());



?>