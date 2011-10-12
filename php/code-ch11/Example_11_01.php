<html>
<head>
    <title>Building a Form</title>
</head>
<body>
<form action="<?php echo(htmlentities($_SERVER['PHP_SELF'])); ?>" method="GET">
    <label>
        Search: <input type="text" name="search" />
    </label>
    <input type="submit" value="Go!" />
</form>
</body>
</html>