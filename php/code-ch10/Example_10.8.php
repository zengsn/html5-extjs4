<?php
if (get_magic_quotes_gpc( )) { //guard against SQL injection
$qstring = stripslashes($qstring);
}
$qstring = mysql_real_escape_string($qstring);
?>