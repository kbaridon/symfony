<?php

	class MyException extends Exception
	{
		public function __construct($message = "", $code = 0)
		{
			$customMessage = "Please enter a valid element. Only the following elements are supported:\n" .
			"meta, img, hr, br, html, head, body, title, h1, h2, h3, h4, h5, h6, p, span, div, " . 
			"table, tr, th, td, ul, ol, li.\n";

			if (!empty($message))
				$customMessage = $message;
			parent::__construct($customMessage, $code);
		}
	}

?>