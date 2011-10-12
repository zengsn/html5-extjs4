<html>
<head>
    <title>Using Default Checkbox Values</title>
</head>
<body>
<?php
$food = $_GET[food];
$self = htmlentities($_SERVER['PHP_SELF']);
if (!empty($food)) {
    echo "The foods selected are:<br />";
    foreach($food as $foodstuf)
    {
        echo "<strong>".htmlentities($foodstuf)."</strong><br />";
    }
}
else
{
    echo ("<form action=\"$self\" ");
    echo ('method="get">
    <fieldset>
        <label>Italian <input type="checkbox" name="food[]" value="Italian" />
</label>
        <label>Mexican <input type="checkbox" name="food[]" value="Mexican" />
</label>
        <label>Chinese <input type="checkbox" name="food[]" value="Chinese"
        checked="checked" /></label>
    </fieldset>
    <input type="submit" value="Go!" >');
}
?>
</body>
</html>