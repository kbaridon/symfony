<?php

class Text
{
	private	$_array;

	function __construct(array $array)
	{
		$this->_array = $array;
	}

	public function append(string $str)
	{
		array_push($this->_array, $str);
	}

	public function readData()
	{
		$result = "";
		for ($i = 0; $i < sizeof($this->_array); $i++)
			$result = $result . "    <p>" . $this->_array[$i] . "</p>\n";
		return ($result);
	}
}

?>