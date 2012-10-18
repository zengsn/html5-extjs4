<?php
// put full path to Smarty.class.php
require('D:/Develop/xampp/htdocs/phpblog/Smarty-2.6.27/libs/Smarty.class.php');
$smarty = new Smarty(  );

$smarty->template_dir = 'D:/Develop/xampp/htdocs/phpblog/smarty/templates';
$smarty->compile_dir = 'D:/Develop/xampp/htdocs/phpblog/smarty/templates_c';
$smarty->cache_dir = 'D:/Develop/xampp/htdocs/phpblog/smarty/cache';
$smarty->config_dir = 'D:/Develop/xampp/htdocs/phpblog/smarty/configs';

$blog_title="Coffee Talk Blog";
?>