<?php
echo("Validating: 5/31/2005<br />");
if (checkdate(5,31,2005)) {
    echo('Date accepted: ');
    $new_date=mktime(18,05,35,5,31,2005);
    echo date("r",$new_date);
}
else {
    echo ('Invalid date.');
}
?>