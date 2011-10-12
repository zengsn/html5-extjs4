<html>
<head></head>
<body>
<form action="<?php echo(htmlspecialchars($_SERVER['PHP_SELF']))?>"
method="post" enctype="multipart/form-data">
    <br /><br />
    Choose a file to upload:<br />
    <input type="file" name="upload_file">
    <br />
    <input type="submit" name="submit" value="submit">
</form>

</body>
</html>