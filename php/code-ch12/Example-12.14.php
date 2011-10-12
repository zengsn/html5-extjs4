<?php
$test_string="testing testing Username:Michele Davis";
$position=strpos($test_string,"Username:");

//Add on the length of the Username:
$start=$position+strlen("Username:");

echo "$test_string<br />";
echo "$position<br />";
echo substr($test_string,$start);
?>