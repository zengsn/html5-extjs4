<?php
echo("Validating: 4/31/2005<br />");
if (checkdate(4,31,2005)) {
    echo('Date accepted.');
}
else {
    echo ('Invalid date.');
}
echo("<br />");
echo("Validating: 5/31/2005<br />");
if (checkdate(5,31,2005)) {
    echo('Date accepted.');
}
else {
    echo ('Invalid date.');
}
?>