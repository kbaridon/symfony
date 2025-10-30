<?php

	class TemplateEngine
	{
		private $_elem;

		public function __construct(Elem $elem)
		{
			$this->_elem = $elem;
		}

		public function createFile(string $fileName)
		{
			$dest = fopen($fileName, "w+b") or die ("");
			if ($dest == "")
			{
				echo "Unable to create the destination file.\n";
				return ;
			}
			fwrite($dest, $this->_elem->getHTML());
			fclose($dest);
		}
	}

?>