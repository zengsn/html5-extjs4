<?php

if (!is_uploaded_file($_FILES['upload_file']['tmp_name'])) {
    $error = "You must upload a file!";
}
else {
    //Proceed to process the file.
}

?>