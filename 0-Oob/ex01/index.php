<?php

	include('TemplateEngine.php');
	include('Text.php');

	$text = new Text(array("Bonjour", "Comment", "Ca", "Va", "?"));
	$engine = new TemplateEngine();

	$text->append("Bien");
	$text->append("Et");
	$text->append("Toi");
	$text->append("?");

	$engine->createFile("out.html", $text);
?>