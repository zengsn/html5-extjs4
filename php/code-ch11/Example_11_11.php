<?php
// Use the absolute path for Smarty.class.php
$base_path= dirname(__FILE__);
require($base_path.'/Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = $base_path.'/myapp/smarty/templates';
$smarty->compile_dir = $base_path.'/myapp/smarty/templates_c';
$smarty->cache_dir = $base_path.'/myapp/smarty/cache';
$smarty->config_dir = $base_path.'/myapp/smarty/config';
?>