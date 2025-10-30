<?php

	include('Elem.php');
	include('TemplateEngine.php');
	include('MyException.php');

	// Test 1: Valid page
	$elem = new Elem('html');
	$head = new Elem('head');
	$head->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$head->pushElement(new Elem('title', 'Test'));
	$elem->pushElement($head);
	$body = new Elem('body');
	$body->pushElement(new Elem('p', 'Hello world'));
	$elem->pushElement($body);

	$engine = new TemplateEngine($elem);
	$engine->createFile('ex05.html');
	echo "Valid page: " . ($elem->validPage() ? 'true' : 'false') . "\n";

	// Test 2: Not html
	$elem2 = new Elem('div');
	echo "Not html: " . ($elem2->validPage() ? 'true' : 'false') . "\n";

	// Test 3: Html without body
	$elem3 = new Elem('html');
	$head3 = new Elem('head');
	$head3->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$head3->pushElement(new Elem('title', 'Test'));
	$elem3->pushElement($head3);
	echo "No body: " . ($elem3->validPage() ? 'true' : 'false') . "\n";

	// Test 4: Head without title
	$elem4 = new Elem('html');
	$head4 = new Elem('head');
	$head4->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$elem4->pushElement($head4);
	$body4 = new Elem('body');
	$elem4->pushElement($body4);
	echo "Head no title: " . ($elem4->validPage() ? 'true' : 'false') . "\n";

	// Test 5: Head without meta
	$elem5 = new Elem('html');
	$head5 = new Elem('head');
	$head5->pushElement(new Elem('title', 'Test'));
	$elem5->pushElement($head5);
	$body5 = new Elem('body');
	$elem5->pushElement($body5);
	echo "Head no meta: " . ($elem5->validPage() ? 'true' : 'false') . "\n";

	// Test 6: P with children
	$elem6 = new Elem('html');
	$head6 = new Elem('head');
	$head6->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$head6->pushElement(new Elem('title', 'Test'));
	$elem6->pushElement($head6);
	$body6 = new Elem('body');
	$p6 = new Elem('p', 'Text');
	$p6->pushElement(new Elem('span', 'invalid'));
	$body6->pushElement($p6);
	$elem6->pushElement($body6);
	echo "P with children: " . ($elem6->validPage() ? 'true' : 'false') . "\n";

	// Test 7: Table with non-tr
	$elem7 = new Elem('html');
	$head7 = new Elem('head');
	$head7->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$head7->pushElement(new Elem('title', 'Test'));
	$elem7->pushElement($head7);
	$body7 = new Elem('body');
	$table7 = new Elem('table');
	$table7->pushElement(new Elem('div')); // invalid
	$body7->pushElement($table7);
	$elem7->pushElement($body7);
	echo "Table with non-tr: " . ($elem7->validPage() ? 'true' : 'false') . "\n";

	// Test 8: Ul with non-li
	$elem8 = new Elem('html');
	$head8 = new Elem('head');
	$head8->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$head8->pushElement(new Elem('title', 'Test'));
	$elem8->pushElement($head8);
	$body8 = new Elem('body');
	$ul8 = new Elem('ul');
	$ul8->pushElement(new Elem('div')); // invalid
	$body8->pushElement($ul8);
	$elem8->pushElement($body8);
	echo "Ul with non-li: " . ($elem8->validPage() ? 'true' : 'false') . "\n";

	// Test 9: Tr with non-th/td
	$elem9 = new Elem('html');
	$head9 = new Elem('head');
	$head9->pushElement(new Elem('meta', '', ['charset' => 'UTF-8']));
	$head9->pushElement(new Elem('title', 'Test'));
	$elem9->pushElement($head9);
	$body9 = new Elem('body');
	$table9 = new Elem('table');
	$tr9 = new Elem('tr');
	$tr9->pushElement(new Elem('div')); // invalid
	$table9->pushElement($tr9);
	$body9->pushElement($table9);
	$elem9->pushElement($body9);
	echo "Tr with non-th/td: " . ($elem9->validPage() ? 'true' : 'false') . "\n";

?>