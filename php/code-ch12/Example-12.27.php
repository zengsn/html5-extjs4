<?php

if($_FILES['upload_file']['type'] != "image/gif" AND
$_FILES['upload_file']['type'] != "image/pjpeg" AND
$_FILES['upload_file']['type'] !="image/jpeg") {
    $error = "You may only upload .gif or .jpeg files";
    unlink($_FILES['upload_file']['tmp_name']);
}

else {
     //the file is the correct format
}

?>