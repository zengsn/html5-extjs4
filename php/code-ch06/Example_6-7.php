<?php
$objects=array('Soda can' =>    array('Shape'    => 'Cylinder',
                                      'Color'    => 'Red',
                                      'Material' => 'Metal'),
               'Notepad' =>    array('Shape'    => 'Rectangle',
                                      'Color'    => 'White',
                                      'Material' => 'Paper'),
               'Apple' =>       array('Shape'    => 'Sphere',
                                      'Color'    => 'Red',
                                      'Material' => 'Fruit'),
               'Orange' =>      array('Shape'    => 'Sphere',
                                      'Color'    => 'Orange',
                                      'Material' => 'Fruit'),
               'Phonebook' =>  array('Shape'    => 'Rectangle',
                                      'Color'    => 'Yellow',
                                      'Material' => 'Paper'));
echo $objects['Soda can']['Shape'];
?>
