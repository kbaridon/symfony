<?php

class TemplateEngine
{
	function __construct() {}

	public function createFile(HotBeverage $text)
	{
		$reflection = new ReflectionClass($text); 
		$src = fopen("template.html", "r") or die ("");
		if ($src == "")
		{
			echo "Unable to open the template file.\n";
			return ;
		}
		$dest = fopen($reflection->getName() . ".html", "w+b") or die ("");
		if ($dest == "")
		{
			echo "Unable to create the destination file.\n";
			fclose($src);
			return ;
		}
		$methods = $reflection->getMethods();
		foreach ($methods as $method)
		{
			if (strpos($method->getName(), 'get') === 0)
			{
				$getterName = $method->getName();
				$key = strtolower(substr($getterName, 3));
				$getters[$key] = $method->invoke($text);
			}
		}
		while ($c = fgetc($src))
		{
			if ($c == '{')
			{
				$key = "";
				while (($c = fgetc($src)) != '}')
					$key = $key . $c;
				fwrite($dest, $getters[$key]);
			}
			else
				fwrite($dest, $c);
		}
		fclose($src);
		fclose($dest);
	}
}

?>