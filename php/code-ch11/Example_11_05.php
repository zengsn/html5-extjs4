<html>
<head>
    <title>Using Default Checkbox Values</title>
</head>
<body>
<?php
$food = $_GET["food"];
if (!empty($food)){
    echo "The foods selected are: <strong>";
    foreach($food as $foodstuff){
        echo '<br />'.htmlentities($foodstuff);
    }
    echo "</strong>.";
}
else {
    echo ('
    <form action="'. htmlentities($_SERVER["PHP_SELF"]).'" method="GET">
        <fieldset>
            <label>
                Italian
                <input type="checkbox" name="food[]" value="Italian" />
            </label>
            <label>
                Mexican
                <input type="checkbox" name="food[]" value="Mexican" />
            </label>
            <label>
                Chinese
                <input type="checkbox" name="food[]" value="Chinese"
checked="checked" />
            </label>
        </fieldset>
        <input type="submit" value="Go!" />
    </form> ');
    }
?>
</body>
</html>