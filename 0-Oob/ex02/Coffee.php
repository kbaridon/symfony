<?php

	class Coffee extends HotBeverage
	{
		private $_description = "Just a basic coffee.";
		private $_comment = "A good one";

		public function __construct()
		{
			$this->_name = "Coffee";
			$this->_price = 3.99;
			$this->_resistance = 5;
		}

		public function getDescription() {
			return ($this->_description);
		}

		public function getComment() {
			return ($this->_comment);
		}
	}

?>