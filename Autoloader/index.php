<?php

//
//$test = new Test\ClassTest;

echo("Hello World<br>");

spl_autoload_extensions('.php');
spl_autoload_register();

$test = new Test\ClassTest();
$test->test();

//phpinfo();


?>
