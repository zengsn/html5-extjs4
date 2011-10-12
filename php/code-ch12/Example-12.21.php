<?php
$file_name="permissions.php";

if(is_readable($file_name)) {
    echo ("The file $file_name is readable.<br />");
}
else {
    echo ("The file $file_name is not readable.<br />");
}
if(is_writeable($file_name)) {
    echo ("The file $file_name is writeable.<br />");
}
else {
    echo ("The file $file_name is not writeable.<br />");
}
//Only works on Windows with PHP 5.0.0 or later
if(is_executable($file_name)) {
    echo ("The file $file_name is executable.<br />");
}
else {
    echo ("The file $file_name is not executable.<br />");
}
?>