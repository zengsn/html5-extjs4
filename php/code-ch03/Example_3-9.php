<?php
// Define the function
function birthday( ){
	// Define age as a static variable
	static $age = 0;
	// Add one to the age value
	$age = $age + 1;
	// Print the static age variable
	echo "Birthday number $age<br />";
}
// Set age to 30
$age = 30;
// Call the function twice
birthday( );
birthday( );
// Display the age
echo "Age: $age<br />";
?>