<html>
<head>
<title>Time Zone Converter</title>
</head>
<body>
<?php
// An array holds the standard time zone strings
$time_zones = array("Asia/Hong_Kong",
                    "Africa/Cairo",
                    "Europe/Paris",
                    "Europe/Madrid",
                    "Europe/London",
                    "Asia/Tokyo",
                    "America/New_York",
                    "America/Los_Angeles",
                    "America/Chicago");
// Check to see if the form has been submitted
if ($_GET["start_time"] != NULL){
    $start_time_input = htmlentities($_GET["start_time"]);
    $start_tz = $_GET["start_tz"];
    $end_tz = $_GET["end_tz"];
    putenv("TZ=$start_tz");
    $start_time = strtotime($start_time_input);
    echo "<p><strong>";
    echo date("h:i:sA",$start_time)."\n";
    echo "</strong>";
    putenv("TZ=$end_tz");

    echo "in $start_tz becomes ";
    echo "<strong> ";
    echo date("h:i:sA",$start_time)."\n";
    echo "</strong>";
    echo " in $end_tz.</p><hr />";

}
?>
<form action="<?php echo(htmlentities($_SERVER['PHP_SELF'])); ?>" method="GET">
    <label>
        Your Time:
        <input type="text" name="start_time" value="<?php echo $start_time_input; ?>" />
    </label> in
    <select name="start_tz">
    <?php
    foreach ($time_zones as $tz) {
        echo '<option';
        if (strcmp($tz, $start_tz) == 0){
            echo 'selected="selected"';
        }
        echo ">$tz</option>";
    }
    ?>
    </select>
    <p>Convert to:
    <select name="end_tz">
    <?php
    foreach ($time_zones as $tz) {
        echo '<option';
        if (strcmp($tz, $end_tz) == 0){
            echo ' selected="selected"';
        }
    echo ">$tz</option>";
}
?>
</select></p>
    <input type="submit" value="Convert!" />
</form>
</body>
</html>