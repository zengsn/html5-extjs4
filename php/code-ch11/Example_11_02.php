<html>
<head>
    <title>Building a Form</title>
</head>
<body>
<?php
$search = htmlentities($_GET["search"]);
$self = htmlentities($_SERVER['PHP_SELF']);
if ($search === '' ){
    echo ('
    <form action="'.$self.'" method="GET">
        <label>Search: <input type="text" name="search" /></label>
        <input type="submit" value="Go!" />
    </form>');
}
else {
    echo "The search string is: <strong>$search</string>";
}
?>
</body>
</html>