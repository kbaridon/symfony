<?php

class TemplateEngine
{
	function __construct() {}

	public function createFile(HotBeverage $text)
	{
		$src = fopen("template.html", "r") or die ("");
		if ($src == "")
		{
			echo "Unable to open the template file.\n";
			return ;
		}
		if (ReflectionClass($text))
		$dest = fopen($fileName, "w+b") or die ("");
		if ($dest == "")
		{
			echo "Unable to create the destination file.\n";
			fclose($src);
			return ;
		}
		while ($c = fgetc($src))
		{
			if ($c == '{')
			{
				$key = "";
				while (($c = fgetc($src)) != '}')
					$key = $key . $c;
				if (isset($parameters[$key]))
					fwrite($dest, $parameters[$key]);
			}
			else
				fwrite($dest, $c);
		}
		fclose($src);
		fclose($dest);
	}
}

?>