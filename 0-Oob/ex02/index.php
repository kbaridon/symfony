<?php

	include('HotBeverage.php');
	include('Coffee.php');
	include('Tea.php');
	include('TemplateEngine.php');

	$b1 = new Coffee();
	$b2 = new Tea();
	$engine = new TemplateEngine();

	$engine->createFile($b1);
	$engine->createFile($b2);
?>