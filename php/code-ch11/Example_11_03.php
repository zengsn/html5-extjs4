<html>
<head>
    <title>Form Default Values</title>
</head>
<body>
    <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="GET" />
        <label>Min Price <input type="text" name="min_price" value="0" /></
label><br />
        <label>Max Price <input type="text" name="max_price" value="1000" /></label>
        <br />
        <input type="submit" value="Go!" />
    </form>
</body>
</html>