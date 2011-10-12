<?php
$maxsize=28480;
if ($_FILES['upload_file']['size'] > $maxfilesize) {
    $error = "Error, file must be less than $maxsize bytes.";
    unlink($_FILES['upload_file']['tmp_name']);
}
else {
    //Proceed to process the file.
}
?>