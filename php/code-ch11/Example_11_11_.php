<?php
require_once("smarty.php");
$smarty->assign('test', '123');
$smarty->display('index.tpl');
?>