<?php

	include('Elem.php');
	include('TemplateEngine.php');

	$elem = new Elem('html');
	$head = new Elem('head');
	$body = new Elem('body');
	$p = new Elem('p', 'Lorem ispum');

	$head->pushElement(new Elem('meta'));
	$head->pushElement(new Elem('title', 'Ex03'));

	$elem->pushElement($head);

	$body->pushElement(new Elem('h1', "Titre 1"));
	$body->pushElement(new Elem('h2', "Titre 2"));

	$div = new Elem('div');
	$div->pushElement(new Elem('h3', "Titre 3"));
	$div->pushElement(new Elem('h4', "Titre 4"));
	$div->pushElement(new Elem('h5', "Titre 5"));

	$body->pushElement($div);
	$body->pushElement(new Elem('h6', "Titre 6"));

	$p->pushElement(new Elem('span', "Ahah span"));
	$p->pushElement(new Elem('br'));
	$p->pushElement(new Elem('span', "Salut span"));
	$p->pushElement(new Elem('img'));
	$p->pushElement(new Elem('hr'));
	$p->pushElement(new Elem('p', 'Ahah p'));

	$body->pushElement($p);
	$elem->pushElement($body);

	$engine = new TemplateEngine($elem);
	$engine->createFile("ex03.html");
?>