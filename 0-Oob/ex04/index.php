<?php

	include('Elem.php');
	include('TemplateEngine.php');
	include('MyException.php');

	try {
		$elem = new Elem('html');
		$head = new Elem('head');
		$body = new Elem('body');
		$table = new Elem('table');
		$p2 = new Elem('p', 'Lorem ispum', ['class' => 'truc', 'id' => 'machin']);

		$head->pushElement(new Elem('meta'));
		$head->pushElement(new Elem('title', 'Ex03'));

		$elem->pushElement($head);

		$body->pushElement(new Elem('h1', "Titre 1"));
		$body->pushElement(new Elem('h2', "Titre 2"));

		$div = new Elem('div', '', ['style' => 'background-color: green;']);
		$div->pushElement(new Elem('h3', "Titre 3"));
		$div->pushElement(new Elem('h4', "Titre 4"));
		$div->pushElement(new Elem('h5', "Titre 5"));

		$body->pushElement($div);
		$body->pushElement(new Elem('h6', "Titre 6"));

		$tr = new Elem('tr');
		$tr2 = new Elem('tr');
		$td1 = new Elem('td');
		$td2 = new Elem('td');
		$ul = new Elem('ul');
		$ol = new Elem('ol');

		$ul->pushElement(new Elem('li', 'nothing'));
		$ul->pushElement(new Elem('li', 'nothing'));
		$ol->pushElement(new Elem('li', 'nothing'));
		$ol->pushElement(new Elem('li', 'nothing'));
		
		$td1->pushElement($ul);
		$td2->pushElement($ol);
		$tr->pushElement($td1);
		$tr->pushElement($td2);
		$tr2->pushElement(new Elem('h6', 'eheh'));

		$table->pushElement($tr);
		$table->pushElement(new Elem('tr'));
		$table->pushElement($tr2);

		$p2->pushElement($table);
		$p2->pushElement(new Elem('span', "Ahah span"));
		$p2->pushElement(new Elem('br'));
		$p2->pushElement(new Elem('span', "Salut span"));
		$p2->pushElement(new Elem('img'));
		$p2->pushElement(new Elem('hr'));
		$p2->pushElement(new Elem('p', 'Ahah p'));

		$body->pushElement($p2);
		$elem->pushElement($body);
	}
	catch (MyException $e) {
		echo "Erreur: " . $e->getMessage();
	}

	// try {
	// 	$truc = new Elem('mdr');
	// }
	// catch (MyException $e) {
	// 	echo "Erreur: " . $e->getMessage();
	// }

	$engine = new TemplateEngine($elem);
	$engine->createFile("ex04.html");
?>