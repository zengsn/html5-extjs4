<?php
class Cat {
    // How old the cat is
    var $age;

    // Constructor
    function Cat($new_age){

        // Set the age of this cat to the new age
        $this->age = $new_age;
    }
    //The birthday method increments the age variable
    function Birthday(){

        $this->age++;
    }
}
// Create a new instance of the cat object that's one year old
$fluffy = new Cat(1);
echo "Age is $fluffy->age <br />";
echo "Birthday<br/>";
// Increase fluffy's age
$fluffy->Birthday();
echo "Age is $fluffy->age <br />";
?>