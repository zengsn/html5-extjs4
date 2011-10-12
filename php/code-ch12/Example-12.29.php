<?php
exec(escapeshellcmd("df"),$output_lines,$return_value);
echo ("Command returned a value of $return_value.\n");
echo "<pre>";
foreach ($output_lines as $output) {
    echo "$output\n";
}
echo "</pre>";
?>