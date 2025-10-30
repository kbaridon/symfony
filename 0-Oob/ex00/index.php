<?php

	include('./TemplateEngine.php');

	$engine = new TemplateEngine();
	$parameters = array(
		'nom' => "Ex00",
		'auteur' => "Jean de la Fontaine",
		'description' => "Nice book about ex00 of Symfony's piscine at 42.",
		'prix' => 19.99
	);

	$engine->createFile("out.html", "book_description.html", $parameters);
?>