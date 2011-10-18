<?php
//Ask the browser if it knows about the application/xthml+xml MIME type
//This is necesary because of IE
if(stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")) {
    header('Content-Type: application/xhtml+xml; charset=utf-8');
}
else {
    header('Content-Type: text/html; charset=utf-8');
}

//Create the document type
$doctype  = '<?xml version="1.0" encoding="UTF-8"?>';
$doctype .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" ';
$doctype .= '    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> ';

//Create the heading
$head=      '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';
$head    .= '    <head>';
$head    .= '        <title>Document Type Declaration Example</title>';
$head    .= '    </head>';

//Create the body text
$body     = '    <body>';
$body    .= '         <p>The content of the page goes here.</p>';
$body    .= '    </body>';

//Create the footer text
$footer   = '</html>';

//Display it all together
echo $doctype;
echo $head;
echo $body;
echo $footer;
?>