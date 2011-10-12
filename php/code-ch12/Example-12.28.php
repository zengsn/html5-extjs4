<?php
$maxsize=28480; //set the max upload size in bytes
if (!$HTTP_POST_VARS['submit']) {
    //print_r($_FILES);
    $error=" ";
   //this will cause the rest of the processing to be skipped
   //and the upload form displays
}
if (!is_uploaded_file($_FILES['upload_file']['tmp_name']) AND
!isset($error)) {
    $error = "<b>You must upload a file!</b><br /><br />";
    unlink($_FILES['upload_file']['tmp_name']);
}
if ($_FILES['upload_file']['size'] > $maxsize AND !isset($error)) {
    $error = "<b>Error, file must be less than $maxsize bytes.</b><br /><br />";
    unlink($_FILES['upload_file']['tmp_name']);
}
if($_FILES['upload_file']['type'] != "image/gif" AND
$_FILES['upload_file']['type'] != "image/pjpeg" AND
$_FILES['upload_file']['type'] !="image/jpeg" AND !isset($error)) {
    $error = "<b>You may only upload .gif or .jpeg files.</b><br /><br />";
    unlink($_FILES['upload_file']['tmp_name']);
}

if (!isset($error)) {
    move_uploaded_file($_FILES['upload_file']['tmp_name'],
                       "uploads/".$_FILES['upload_file']['name']);
    print "Thank you for your upload.";
    exit;
}
else
{
    echo ("$error");
}
?>


<html>
<head></head>
<body>
<form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']))?>"
method="post" enctype="multipart/form-data">
    Choose a file to upload:<br />
    <input type="file" name="upload_file" size="80">
    <br />
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>