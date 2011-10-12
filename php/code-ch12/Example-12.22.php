<?php
$file_name="test.txt";

if(file_exists($file_name)) {
    echo ("$file_name does exist.<br />");
}
else {
    echo ("The file $file_name does not exist.<br />");
    touch($file_name);
}
if(file_exists($file_name)) {
    echo ("The file $file_name does exist.<br />");
    unlink($file_name);
}
else {
    echo ("The file $file_name does not exist.<br />");
}
if(file_exists($file_name)) {
    echo ("The file $file_name does exist.<br />");
}
else {
    echo ("The file $file_name does not exist.<br />");
}
?>