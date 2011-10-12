<head>
    <title>Feet to meters conversion</title>
</head>
<body>
<?php
//Check to see if the form has been submitted
$feet = htmlentities($_GET["feet"]);
if ($_GET[feet] != NULL){
    echo "<strong>$feet</strong> feet converts to <strong>";
    echo $feet * 0.3048;
    echo "</strong> meters.<br />";
}
?>
<form action="<?php echo(htmlentities($_SERVER['PHP_SELF'])); ?>" method="GET">
    <label>Feet:
        <input type="text" name="feet" value="<?php echo $feet; ?>" />
    </label>
    <input type="submit" value="Convert!" />
</form>
</body>
</html>