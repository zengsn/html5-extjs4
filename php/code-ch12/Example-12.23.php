<?php
$file_name="test.txt";
touch($file_name); //since it was deleted in the last example

$new_file_name="production.txt";
$status=rename($file_name,$new_file_name);
if ($status) {
    echo ("Renamed file.");
}
?>