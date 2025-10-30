<?php

class TemplateEngine
{
	function __construct() {}

	public function createFile($fileName, Text $text)
	{

		$dest = fopen($fileName, "w+b") or die ("");
		if ($dest == "")
		{
			echo "Unable to create the destination file.\n";
			return ;
		}
		$result = '<!DOCTYPE html>' . "\n" .
		'<html lang="en">' . "\n" .
		'<head>' . "\n" .
		'	<meta charset="UTF-8">' . "\n" .
		'	<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n" .
		'	<title>Ex01</title>' . "\n" .
		'</head>' . "\n" .
		'<body>' . "\n";
		$result = $result . $text->readData();
		$result = $result . "</body>\n</html>";

		fwrite($dest, $result);
		fclose($dest);
	}
}

?>